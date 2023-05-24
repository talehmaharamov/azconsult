<?php

use App\Http\Controllers\Backend\LanguageController as LChangeLan;
use App\Http\Controllers\Frontend\AboutController as FAbout;
use App\Http\Controllers\Frontend\HomeController as FHome;
use App\Http\Controllers\Frontend\CategoryController as FCategory;
use App\Models\Slider;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/', 'as' => 'frontend.', 'middleware' => 'frontLanguage'], function () {

    Route::get('contact-us', function () {
        $sliders = Slider::where('page', 'contact')->where('status', 1)->get();
        $sliderTitle = settings('sliderTitleContact_' . app()->getLocale());
        $sliderDescription = settings('sliderDescriptionContact_' . app()->getLocale());
        return view('frontend.contact-us.index',get_defined_vars());
    })->name('contact-us-page');
    Route::get('/change-language/{dil}', [LChangeLan::class, 'frontLanguage'])->name('frontLanguage');
    Route::get('create-order', [FHome::class, 'createOrder'])->name('createOrder');
    Route::post('/contact-us/send-message', [FHome::class, 'sendMessage'])->name('sendMessage');
    Route::post('/order/new', [FHome::class, 'newOrder'])->name('newOrder');
    Route::get('/', [FHome::class, 'index'])->name('index');
    Route::get('/about', [FAbout::class, 'index'])->name('about');
    Route::get('/categories/{slug}', [FCategory::class, 'index'])->name('selectedCategory');
    Route::post('/search', [FHome::class, 'search'])->name('search');
    Route::post('/newsletter-add-new', [FHome::class, 'newsletter'])->name('newsletter');
    Route::get('/newsletter/{id}/{token}', [FHome::class, 'verifyMail'])->name('verifyMail');
    Route::get('18', [FHome::class, 'agreeTerm'])->name('18');
    Route::get('mail/test', function () {
        return view('backend.mail.send');
    });
    Route::get('services',[App\Http\Controllers\Frontend\ServiceController::class,'index'])->name('service');
    Route::get('services/{id}',[App\Http\Controllers\Frontend\ServiceController::class,'show'])->name('serviceSingle');
    Route::get('blog',[App\Http\Controllers\Frontend\BlogController::class,'index'])->name('blog');
    Route::get('blog/{id}',[App\Http\Controllers\Frontend\BlogController::class,'show'])->name('blogSingle');

});
