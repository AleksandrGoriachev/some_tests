<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth/login', 'Api\Auth\LoginController')->name('login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1/sms')->namespace('Api\V1\Sms')->group(function () {
    Route::post('/send-code-registration', 'SendCodeRegistrationController')->middleware('sms.limit', 'sms.timeout')->name('sendCodeRegistration');
    Route::post('/send-code-booking', 'SendCodeBookingController')->middleware('sms.limit', 'sms.timeout')->name('sendCodeBooking');
    Route::post('/check-code', 'CheckCodeController')->name('checkCode');
    Route::post('/code-expiration-date', 'CodeExpirationDateController')->name('codeExpirationDate');
    Route::post('/check-timeout', 'CheckTimeoutController')->name('checkTimeout');
});

Route::prefix('/v1/yakassa/payment')->namespace('Api\V1\YandexKassa')->group(function () {
    Route::post('/notification/receieve',  'PaymentNotificationReceiveController')->name('payment-notification');
});
