<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Codeception codecoverage
 */
Route::get('/c3/{any}')->where('any', '.*')->name('c3');

/**
 * маршруты по которым доступна новая публичная часть
 */
Route::prefix('new')->group(function () {
    Auth::routes(['verify'=>true]);
});

Route::name('public.')->group(function () {

    Route::namespace('Web\YandexKassa')->group(function () {
        Route::get('/pay/{id}', 'PayYandexKassaController')->name('pay');
        Route::get('/payment/booking/{id}/completion', 'PaymentBookingCompletionController')->name('payment-completion');
    });

    Route::prefix('new')->group(function () {
        Route::view('/', 'public.index')->name('index');
        Route::view('/about', 'public.about')->name('about');
        Route::get('/locations', 'CatalogController')->name('locations');
        Route::view('/checkout', 'public.checkout')->name('checkout');
        Route::get('/contacts', 'ContactsController')->name('contacts');
        Route::get('/eula', 'EulaController')->name('eula');
        Route::get('/faq', 'FaqController')->name('faq');
        Route::get('/favorites', 'FavoritesController')->name('favorites')->middleware('auth.pub');
        Route::view('/location-hall', 'public.location-hall')->name('location-hall');
        Route::view('/messages', 'public.messages')->name('messages');
        Route::view('/new-password', 'public.new-password')->name('new-password');
        Route::get('/news/{id}', 'NewsDetailController')->name('news-detail');
        Route::get('/orders', 'OrdersController')->name('orders')->middleware('auth.pub');
        Route::namespace('ProfileSettings')->prefix('profile-settings')->middleware('auth.pub')->group(function () {
            Route::get('/', 'ShowController')->name('show-profile-settings');
            Route::put('/', 'UpdateController')->name('update-profile-settings');
            Route::delete('/avatar', 'DeleteAvatarController')->name('delete-avatar');
        });
        Route::get('/registration', 'RegisterController')->name('registration');
        Route::post('/registration','Auth\RegisterController')->name('new-registration');
        Route::view('/restore-password', 'public.restore-password')->name('restore-password');
        Route::view('/restore-password-sent', 'public.restore-password-sent')->name('restore-password-sent');
        Route::get('/reviews', 'TestimonyController')->name('reviews')->middleware('auth.pub');
        Route::get('/verification/verify', 'Auth\VerificationController')->name('verify')->middleware('verified');


        Route::get('/studios/{id}', 'StudioController')->name('location');
        Route::get('/studios/hall/{id}', 'StudioHallController')->name('hall');
        Route::get('/checkout/{id}', 'CheckoutController')->name('checkout');
    });
});
