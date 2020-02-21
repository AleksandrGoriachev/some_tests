<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API routes for the admin panel
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api/admin/v1.0" middleware group. Enjoy building your API!
|
*/

Route::prefix('/organizations')->namespace('Organization')->group(function () {
    Route::post('/', 'StoreController')->name('store-organization');
});