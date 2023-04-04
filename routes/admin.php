<?php

use App\Http\Controllers\Admin\BarcodeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'admin/login');

// Language
Route::get('lang/{lang}', 'LanguageController@update')->name('lang.update');

// Auth
Route::match(['get', 'head'], 'login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::match(['get', 'head'], 'register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::match(['get', 'head'], 'password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::match(['get', 'head'], 'password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::match(['get', 'head'], 'password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

Route::match(['get', 'head'], 'email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::match(['get', 'head'], 'email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

// Basic
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/reset-date', 'HomeController@reset_date')->name('reset_date');

    Route::get('/my-profile/{user}/edit', 'MyProfileController@edit')->name('my-profile.edit')->middleware('verified:admin.verification.notice');
    Route::match(['put', 'patch', 'post'], '/my-profile/{user}', 'MyProfileController@update')->name('my-profile.update');
    Route::delete('/my-profile/{user}/avatar', 'MyProfileController@destroyAvatar')->name('my-profile.avatar.delete');

    Route::resource('/change-password', 'ChangePasswordController')->only(['edit', 'update'])->parameters(['change-password' => 'user']);

    Route::resource('/cms', 'CmsController')->only(['edit', 'update'])->parameters(['cms' => 'masterCms']);

    Route::resource('/settings', 'SettingController')->only(['edit', 'update']);
});

// Security
Route::middleware(['auth'])->prefix('security')->name('security.')->group(function () {
    Route::resource('/permissions', 'Security\PermissionController')->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

    Route::resource('/roles', 'Security\RoleController')->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
});

// Users
Route::middleware(['auth'])->prefix('users')->name('users.')->group(function () {
    Route::match(['put', 'patch', 'post'], '/admins/{user}', 'Admin\AdminController@update')->name('admins.update');
    Route::match(['put', 'patch'], '/admins/{user}/restore', 'Admin\AdminController@restore')->name('admins.restore');
    Route::delete('/admins/{user}/avatar', 'Admin\AdminController@destroyAvatar')->name('admins.avatar.delete');
    Route::resource('/admins', 'Admin\AdminController')->only(['index', 'create', 'store', 'edit', 'destroy'])->parameters(['admins' => 'user']);
});

// Masters
Route::middleware(['auth'])->prefix('masters')->name('masters.')->group(function () {

    Route::resource('governorates', Master\GovernorateController::class);
    Route::resource('areas', Master\AreasController::class);
    Route::resource('block', Master\BlockController::class);
    Route::resource('status', Master\StatusController::class);
});

// Call centers

Route::middleware(['auth'])->prefix('callcenter')->name('callcenter.')->group(function () {
    Route::get('dataTable', 'CallcenterController@dataTable')->name('dataTable');
    Route::resource('callcenter', CallcenterController::class);
});

// Drivers
Route::middleware(['auth'])->prefix('driver')->name('driver.')->group(function () {
    Route::get('dataTable', 'DriverController@dataTable')->name('dataTable');
    Route::resource('driver', DriverController::class);
});


// cards Management
Route::middleware(['auth'])->prefix('cards')->name('cards.')->group(function () {
    Route::get('dataTable', 'Cards\CardController@dataTable')->name('dataTable');
    Route::get('get-card-details', 'Cards\CardController@getCardDetails')->name('getCardDetails');
    Route::get('get-block', 'Cards\CardController@getBlock')->name('getBlock');
    Route::post('updateCardDetails', 'Cards\CardController@updateCardDetails')->name('updateCardDetails');
    Route::post('search', 'Cards\CardController@search')->name('search');
    Route::post('updateCardStatus', 'Cards\CardController@updateCardStatus')->name('updateCardStatus');

    Route::resource('/newly-arrived', 'Cards\NewlyArrivedController')->only(['index', 'create', 'store', 'destroy']);
    Route::resource('/unassigned', 'Cards\UnassignedController')->only(['index']);
    Route::resource('/assign-to-agent', 'Cards\AssignToAgentController')->only(['index']);
    Route::post('assignDriver', 'Cards\OutForDeliveryController@assignDriver')->name('assignDriver');
    Route::resource('/out-for-delivery', 'Cards\OutForDeliveryController')->only(['index']);
    Route::post('markAsDelivered', 'Cards\AssignToDriverController@markAsDelivered')->name('markAsDelivered');

    Route::post('print-manifest', 'Cards\AssignToDriverController@printManifest')->name('printManifest');
    Route::resource('/assign-to-driver', 'Cards\AssignToDriverController')->only(['index']);
    Route::resource('/return-to-bank', 'Cards\ReturnToBankController')->only(['index']);
    Route::resource('/delivered', 'Cards\DeliveredController')->only(['index']);
    Route::resource('/undelivered', 'Cards\UndeliveredController')->only(['index']);
    Route::get('print/{id}', 'Cards\CallCenterAgentController@print')->name('print');
    Route::post('print-stickers', 'Cards\CallCenterAgentController@printStickers')->name('printStickers');
    Route::resource('/call-center', 'Cards\CallCenterAgentController')->only(['index']);
    Route::get('/call-center/logs/{id}', 'Cards\CallCenterAgentController@logs')->name('call-logs');
    Route::post('/call-center/logs/store', 'Cards\CallCenterAgentController@storelogs')->name('call-logs.store');
    Route::resource('/all', 'Cards\AllController')->only(['index']);
    Route::get('/history', 'Cards\AllController@history')->name('history');
    Route::get('/all/dataTable', 'Cards\AllController@dataTable')->name('all.dataTable');
    Route::post('/all/count/report', 'Cards\AllController@cardsCountReport')->name('all.count.report');
});


// cards Management
Route::middleware(['auth'])->prefix('barcode')->name('barcode.')->group(function () {
    Route::resource('/scan', 'BarcodeController')->only(['index']);
    Route::post('/change-status', [BarcodeController::class,'change_status'])->name('change_status');

});

