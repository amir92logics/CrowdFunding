<?php

use App\Lib\Router;
use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

// User Support Ticket
Route::controller('TicketController')->prefix('ticket')->group(function () {
    Route::get('/', 'supportTicket')->name('ticket');
    Route::get('/new', 'openSupportTicket')->name('ticket.open');
    Route::post('/create', 'storeSupportTicket')->name('ticket.store');
    Route::get('/view/{ticket}', 'viewTicket')->name('ticket.view');
    Route::post('/reply/{ticket}', 'replyTicket')->name('ticket.reply');
    Route::post('/close/{ticket}', 'closeTicket')->name('ticket.close');
    Route::get('/download/{ticket}', 'ticketDownload')->name('ticket.download');
});

Route::get('app/deposit/confirm/{hash}', 'Gateway\PaymentController@appDepositConfirm')->name('deposit.app.confirm');

Route::controller('SiteController')->group(function () {
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactSubmit')->name('contact.submit');
    Route::get('/change/{lang?}', 'changeLanguage')->name('lang');

    Route::get('cookie-policy', 'cookiePolicy')->name('cookie.policy');

    Route::get('/cookie/accept', 'cookieAccept')->name('cookie.accept');

    // blog
    Route::get('news', 'blog')->name('blog');
    Route::get('news/{slug}/{id}', 'blogDetails')->name('blog.details');

    Route::get('policy/{slug}/{id}', 'policyPages')->name('policy.pages');

    Route::get('placeholder-image/{size}', 'placeholderImage')->name('placeholder.image');


    // property
    Route::get('properties', 'propertyShow')->name('properties');
    Route::get('property/details/{slug}/{id}', 'propertyDetails')->name('property.details');
    Route::post('property/search', 'propertySearch')->name('property.search');
    Route::get('property/location/{id}', 'cityProperty')->name('property.city');


    // plan
    Route::get('pricing', 'plans')->name('plans');

    // subscriber
    Route::post('/subscribe', 'subscribe')->name('subscribe');


    Route::get('/{slug}', 'pages')->name('pages');
    Route::get('/', 'index')->name('home');
});
