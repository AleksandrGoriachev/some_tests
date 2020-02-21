<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API routes for the front panel
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api/front/v1.0" middleware group. Enjoy building your API!
|
*/

Route::prefix('/locations')->namespace('Studio')->group(function () {
    Route::get('/',  'StudiosController')->name('studios');
    Route::prefix('/reviews')->namespace('Reviews')->group(function (){
        Route::get('/',  'ReviewsController')->name('studios-reviews');
        Route::post('/',  'StoreReviewController')->name('store-review')->middleware(['auth.pub:api']);
        Route::put('/',  'UpdateReviewController')->name('update-review')->middleware('auth.pub:api');
        Route::post('/vote',  'VoteReviewController')->name('vote-review')->middleware('auth.pub:api');
    });

    Route::prefix('/favorites')->namespace('Favorites')->middleware('auth.pub:api')->group(function () {
        Route::post('/', 'StoreController')->name('store-to-favorites');
        Route::delete('/', 'DeleteController')->name('delete-from-favorites');
    });
});

Route::prefix('/rooms')->namespace('Rooms')->group(function () {
    Route::get('/vacant-hours',  'RoomsVacantHoursController')->name('vacant-hours');
    Route::get('/recommended', 'RecommendedController')->name('recommended');
    Route::get('/booked-hours',  'BookedHoursController')->name('booked-hours');
    Route::get('/booking-price/{id}',  'BookingPriceController')->name('booked-hours');

});
