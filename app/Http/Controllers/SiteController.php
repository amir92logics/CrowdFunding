<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\City;
use App\Models\Page;
use App\Models\Plan;
use App\Models\Frontend;
use App\Models\Language;
use App\Models\Location;
use App\Models\Property;
use App\Models\Subscriber;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\PlanSubscribe;
use App\Models\SupportTicket;
use App\Models\SupportMessage;
use App\Models\GatewayCurrency;
use App\Models\AdminNotification;
use App\Models\FeaturedPlan;
use App\Models\FeaturedSubscription;
use App\Models\PropertyInfo;
use Illuminate\Support\Facades\Cookie;

class SiteController extends Controller {
    public function index() {
        $reference = @$_GET['reference'];
        if ($reference) {
            session()->put('reference', $reference);
        }
        $pageTitle = 'Home';
        $sections = Page::where('tempname', $this->activeTemplate)->where('slug', '/')->first();
        return view($this->activeTemplate . 'home', compact('pageTitle', 'sections'));
    }

    public function pages($slug) {
        $page = Page::where('tempname', $this->activeTemplate)->where('slug', $slug)->firstOrFail();
        $pageTitle = $page->name;
        $sections = $page->secs;
        return view($this->activeTemplate . 'pages', compact('pageTitle', 'sections'));
    }


    public function contact() {
        $pageTitle = "Contact Us";
        return view($this->activeTemplate . 'contact', compact('pageTitle'));
    }

    public function subscribe(Request $request) {

        $request->validate([
            'email' => 'required|unique:subscribers',
        ]);

        $subscribe = new Subscriber();
        $subscribe->email = $request->email;
        $subscribe->save();

        $notify[] = ['success', 'You have successfully subscribed to the Newsletter'];
        return back()->withNotify($notify);

    }



    public function contactSubmit(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required|string|max:255',
            'message' => 'required',
        ]);

        if (!verifyCaptcha()) {
            $notify[] = ['error', 'Invalid captcha provided'];
            return back()->withNotify($notify);
        }

        $request->session()->regenerateToken();

        $random = getNumber();

        $ticket = new SupportTicket();
        $ticket->user_id = auth()->id() ?? 0;
        $ticket->name = $request->name;
        $ticket->email = $request->email;
        $ticket->priority = 2;


        $ticket->ticket = $random;
        $ticket->subject = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status = 0;
        $ticket->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = auth()->user() ? auth()->user()->id : 0;
        $adminNotification->title = 'A new support ticket has opened ';
        $adminNotification->click_url = urlPath('admin.ticket.view', $ticket->id);
        $adminNotification->save();

        $message = new SupportMessage();
        $message->support_ticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();

        $notify[] = ['success', 'Ticket created successfully!'];

        return to_route('ticket.view', [$ticket->ticket])->withNotify($notify);
    }

    public function policyPages($slug, $id) {
        $policy = Frontend::where('id', $id)->where('data_keys', 'policy_pages.element')->firstOrFail();
        $pageTitle = $policy->data_values->title;
        return view($this->activeTemplate . 'policy', compact('policy', 'pageTitle'));
    }

    public function changeLanguage($lang = null) {
        $language = Language::where('code', $lang)->first();
        if (!$language)
            $lang = 'en';
        session()->put('lang', $lang);
        return back();
    }

    public function blog() {
        $pageTitle = 'News';
        $section = Page::where('tempname', $this->activeTemplate)->where('slug', 'news')->firstOrFail();
        $blogs = Frontend::where('data_keys', 'blog.element')->orderBy('id', 'desc')->paginate(getPaginate());
        $contacts = Frontend::where('data_keys', 'contact_us.content')->orderBy('id', 'desc')->firstOrFail();
        $latests = Frontend::where('data_keys', 'blog.element')->orderBy('id', 'desc')->limit(5)->get();

        return view($this->activeTemplate . 'blog.blog', compact('section', 'blogs', 'contacts', 'latests', 'pageTitle'));
    }


    public function blogDetails($slug, $id) {
        $blog = Frontend::where('id', $id)->where('data_keys', 'blog.element')->firstOrFail();
        $pageTitle = 'News';
        $latests = Frontend::where('data_keys', 'blog.element')->orderBy('id', 'desc')->limit(5)->get();
        $contacts = Frontend::where('data_keys', 'contact_us.content')->orderBy('id', 'desc')->firstOrFail();
        return view($this->activeTemplate . 'blog_details', compact('blog', 'latests', 'contacts', 'pageTitle'));
    }


    public function plans() {
        $pageTitle = "Pricing";
        $sections = Page::where('tempname', $this->activeTemplate)->where('slug', 'pricing')->firstOrFail();
        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->with('method')->orderby('method_code')->get();
        $plans = Plan::orderBy('id', 'desc')->paginate(getPaginate());

        $user = PlanSubscribe::where('user_id', @auth()->user()->id)->with('getUserPlanSubscribe')->orderBy('id', 'desc')->first();
        return view($this->activeTemplate . 'plan.plan', compact('user', 'plans', 'sections', 'gatewayCurrency', 'pageTitle'));
    }

    public function cookieAccept() {
        $general = gs();
        Cookie::queue('gdpr_cookie', $general->site_name, 43200);
        return back();
    }

    public function cookiePolicy() {
        $pageTitle = 'Cookie Policy';
        $cookie = Frontend::where('data_keys', 'cookie.data')->first();
        return view($this->activeTemplate . 'cookie', compact('pageTitle', 'cookie'));
    }

    public function placeholderImage($size = null) {
        $imgWidth = explode('x', $size)[0];
        $imgHeight = explode('x', $size)[1];
        $text = $imgWidth . '×' . $imgHeight;
        $fontFile = realpath('assets/font') . DIRECTORY_SEPARATOR . 'RobotoMono-Regular.ttf';
        $fontSize = round(($imgWidth - 50) / 8);
        if ($fontSize <= 9) {
            $fontSize = 9;
        }
        if ($imgHeight < 100 && $fontSize > 30) {
            $fontSize = 30;
        }

        $image = imagecreatetruecolor($imgWidth, $imgHeight);
        $colorFill = imagecolorallocate($image, 255, 255, 255);
        $bgFill = imagecolorallocate($image, 28, 35, 47);
        imagefill($image, 0, 0, $bgFill);
        $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth = abs($textBox[4] - $textBox[0]);
        $textHeight = abs($textBox[5] - $textBox[1]);
        $textX = ($imgWidth - $textWidth) / 2;
        $textY = ($imgHeight + $textHeight) / 2;
        header('Content-Type: image/jpeg');
        imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
        imagejpeg($image);
        imagedestroy($image);
    }


    public function propertyShow() {

        $pageTitle = 'Investments';

        $topProperties = Property::whereHas('featuredPlan', function ($q) {
            $q->where('expire_date' ,'>' , now());
        })->inRandomOrder()->limit(2)->get();

        $properties = Property::where('status', 1)->with('location', 'city', 'propertyInfo', 'propertyImage', 'propertyType')->orderBy('created_at','desc')->paginate(getPaginate(12));

        $contacts = Frontend::where('data_keys', 'contact_us.content')->orderBy('id', 'desc')->firstOrFail();
        $propertyTypes = PropertyType::withcount('properties')->get();
        $cities = City::where('status', 1)->with('location')->get();
        $bathrooms = PropertyInfo::groupBy('bathroom')->distinct()->pluck('bathroom');
        $rooms = PropertyInfo::groupBy('room')->distinct()->pluck('room');

        return view($this->activeTemplate . 'property', compact('topProperties','rooms', 'bathrooms', 'cities', 'propertyTypes', 'contacts', 'properties', 'pageTitle'));
    }

    public function propertyDetails($slug, $id) {
        $properties = Property::with('location', 'city', 'propertyInfo', 'propertyImage', 'propertyType')->findOrFail($id);
        $pageTitle = $properties->title;
        $contacts = Frontend::where('data_keys', 'contact_us.content')->orderBy('id', 'desc')->firstOrFail();
        $latests = Property::where('status', 1)->with('location', 'city', 'propertyInfo', 'propertyImage', 'propertyType')->orderBy('id', 'DESC')->limit(3)->get();
        $propertyTypes = PropertyType::withcount('properties')->get();
        $cities = City::where('status', 1)->with('location')->get();
        $bathrooms = PropertyInfo::groupBy('bathroom')->distinct()->pluck('bathroom');
        $rooms = PropertyInfo::groupBy('room')->distinct()->pluck('room');

        return view($this->activeTemplate . 'property_details', compact('rooms', 'bathrooms', 'cities', 'propertyTypes', 'latests', 'contacts', 'properties', 'pageTitle'));
    }


    public function propertySearch(Request $request) {

        $pageTitle = 'Investment Search';
        $bathrooms = $request->bathroom;
        $rooms = $request->room;
        $prices = $request->price;
        $search = $request->search;
        $min = $request->min;
        $max = $request->max;

        $conditions = [];
        $hasConditions = [];

        if ($request->purpose_id) {
            $conditions[] = ['purpose_id', $request->purpose_id];
        }

        if ($request->property_type) {
            $conditions[] = ['property_type', $request->property_type];
        }

        if ($request->type) {
            $conditions[] = ['type', $request->type];
        }

        if ($request->city) {
            $conditions[] = ['city_id', $request->city];
        }

        if ($request->location) {
            $conditions[] = ['location_id', $request->location];
        }

        if ($request->room) {
            $hasConditions[] = ['room', $rooms];
        }

        if ($request->bathroom) {
            $hasConditions[] = ['bathroom', $bathrooms];
        }

        if ($request->min) {
            $hasConditions[] = ['price', '<=', $min];
        }

        if ($request->max) {
            $hasConditions[] = ['price', '<=', $max];
        }


        if ($request->search) {
            $conditions[] = ['title', 'like', "%$search%"];
        }

        $properties = Property::where($conditions)->whereHas('propertyInfo', function ($q) use ($hasConditions) {
                    $q->where($hasConditions);
            })->with('location', 'city', 'propertyInfo', 'propertyImage', 'propertyType')->orderBy('id', 'DESC')->paginate(getPaginate());

        $topProperties = Property::whereHas('featuredPlan', function ($q) {
            $q->where('expire_date' ,'>' , now());
        })->inRandomOrder()->limit(2)->get();


        $contacts = Frontend::where('data_keys', 'contact_us.content')->orderBy('id', 'desc')->firstOrFail();
        $propertyTypes = PropertyType::withcount('properties')->get();
        $cities = City::where('status', 1)->with('location')->get();
        $bathrooms = PropertyInfo::groupBy('bathroom')->distinct()->pluck('bathroom');
        $rooms = PropertyInfo::groupBy('room')->distinct()->pluck('room');

        return view($this->activeTemplate . 'property', compact('topProperties','rooms', 'bathrooms', 'cities', 'propertyTypes','contacts', 'properties', 'pageTitle'));

    }

    public function cityProperty($id) {

        $city = City::findOrFail($id);
        $pageTitle = $city->name . " Property";
        $propertyTypes = PropertyType::where('status', 1)->get();
        $cities = City::where('status', 1)->with('location')->get();
        $bathrooms = PropertyInfo::groupBy('bathroom')->distinct()->pluck('bathroom');
        $rooms = PropertyInfo::groupBy('room')->distinct()->pluck('room');
        $contacts = Frontend::where('data_keys', 'contact_us.content')->orderBy('id', 'desc')->firstOrFail();
        $properties = Property::where('status', 1)->where('city_id', $city->id)->with('location', 'city', 'propertyInfo', 'propertyImage', 'propertyType')->paginate(getPaginate(12));

        $topProperties = Property::whereHas('featuredPlan', function ($q) {
            $q->where('expire_date' ,'>' , now());
        })->inRandomOrder()->limit(2)->get();

        return view($this->activeTemplate . 'property', compact('topProperties','contacts', 'rooms', 'bathrooms', 'pageTitle', 'properties', 'cities', 'propertyTypes'));

    }



}
