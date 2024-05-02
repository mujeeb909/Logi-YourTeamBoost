<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailChimpController;
use App\Http\Middleware\UserAccessMiddleware;


Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/sendInfo', [ContactController::class, 'sendContactInfo'])->name('send-info');

Route::get('/donate', function () {
    return view('donate');
})->name('donate');



Route::get('/donate/{id}', [HomeController::class, 'refDonate'])->name('ref-donate');



// ------------------- Authentication Routes for both Coaches and Players-------------------------------------//
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::get('coach-register', 'c_register')->name('coach-register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::post('coach-register', 'c_registerSave')->name('c_register.save');
    
    Route::get('players/registration/{id}', 'p_register')->name('player-register');
    Route::post('/players-register', 'p_registersave')->name('p_register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
    
    Route::get('email/verify/{token}', 'verifyEmail')->name('email.verify');

});


// ------------------- Dashboard Routes for both Coaches and Players------------------------------------- //
Route::get('/admin/players', [HomeController::class, 'coach_players'])->name('admin/players')->middleware(UserAccessMiddleware::class);
Route::get('/admin/teams', [HomeController::class, 'AdminTeams'])->name('admin/teams')->middleware(UserAccessMiddleware::class);
Route::get('/admin/teams', [HomeController::class, 'AdminTeams'])->name('admin/teams')->middleware(UserAccessMiddleware::class);
Route::get('/admin/donation', [HomeController::class, 'coachDonation'])->name('admin/donation')->middleware(UserAccessMiddleware::class);
Route::get('admin/donation_link', [HomeController::class, 'PlayerDonationLink'])->name('admin/donation_link')->middleware(UserAccessMiddleware::class);
Route::get('/admin/alldonation', [HomeController::class, 'coachAllDonation'])->name('admin/alldonations')->middleware(UserAccessMiddleware::class);

Route::get('edit-admin/players/{id}', [HomeController::class, 'edit_player'])->name('edit-admin/players')->middleware(UserAccessMiddleware::class);
Route::get('admin/add/link/{id}', [HomeController::class, 'AddLink'])->name('add/link')->middleware(UserAccessMiddleware::class);
Route::get('edit-profile/{id}', [HomeController::class, 'editUserProfile'])->name('edit-profile')->middleware(UserAccessMiddleware::class);
Route::put('update-profile/{id}', [HomeController::class, 'updateUserProfile'])->name('update-profile-data')->middleware(UserAccessMiddleware::class);
Route::put('update-player/{id}', [HomeController::class, 'updatePlayerData'])->name('update-player-data')->middleware(UserAccessMiddleware::class);
Route::get('/export/{coach}', [ExportController::class, 'export'])->name('export');
Route::post('admin/save/link/{id}', [HomeController::class, 'SaveLink'])->name('save/link')->middleware(UserAccessMiddleware::class);
Route::put('update/admin/players/{id}', [HomeController::class, 'update_player'])->name('admin/player/update')->middleware(UserAccessMiddleware::class);
Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home')->middleware(UserAccessMiddleware::class);
Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile')->middleware(UserAccessMiddleware::class);

Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');



// ------------------- Stripe Routes for Donations-------------------------------------//
Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');
Route::get('/cancel', 'App\Http\Controllers\StripeController@cancel')->name('cancel');


    Route::fallback(function () {
    
        return view('404');
    });

    Route::get('/ping-mailchimp', [MailchimpController::class, 'pingMailchimp']);
    Route::get('/create-list', [MailchimpController::class, 'createList']);
    
    Route::get('/get-list-member', [MailchimpController::class, 'getListMember']);
    Route::get('/update-list-member-status', [MailchimpController::class, 'updateListMemberStatus']);

    Route::get('/add-emails-and-send-campaign', [MailchimpController::class, 'addEmailsAndSendCampaign']);
    Route::post('/add-or-update-member', [MailchimpController::class, 'addOrUpdateMember']);

    Route::get('/campaigns-list', [MailchimpController::class, 'getCampaignsList']);
    Route::get('/create-campaign', [MailchimpController::class, 'createCampaign']);


    Route::get('/send-emails-to-audience', [MailchimpController::class, 'sendEmailsToAudience']);
    Route::get('/send-campaign', [MailchimpController::class, 'sendCampaign']);


    // ------------------- MailChimp Routes -------------------------------------

    Route::get('/add-list-member', [MailchimpController::class, 'addListMember']);
    Route::get('/create-regular-campaign', [MailchimpController::class, 'createRegularCampaign']);
    

