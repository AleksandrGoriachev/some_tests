<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API routes for the cabinet of the organization
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api/cabinet/v1.0" middleware group. Enjoy building your API!
|
*/

Route::options('/{any}')->where('any', '.*');

Route::prefix('/bookings')->namespace('Booking')->group(function () {
    Route::get('/', 'BookingsController')->name('bookings');
    Route::post('/', 'StoreController')->name('store-booking');
    Route::post('/technical', 'StoreTechnicalController')->name('store-technical-booking');
    Route::get('/{id}', 'ShowController')->name('show-booking');
    Route::delete('/{id}', 'DeleteController')->name('delete-booking');
    Route::put('/{id}', 'UpdateController')->name('update-booking');
});

Route::get('/calendar',  'CalendarController')->name('calendar');
Route::get('/customers', 'CustomersController')->name('customers');
Route::get('/documents', 'DocumentsController')->name('documents');

Route::prefix('/refunds')->namespace('Refund')->group(function () {
    Route::get('/', 'RefundsController')->name('refunds');
    Route::post('/confirm/{id}', 'RefundController@confirm')->name('confirm-refund');
    Route::post('/cancel/{id}', 'RefundController@cancel')->name('cancel-refund');
});


Route::prefix('/rooms')->namespace('Rooms')->group(function () {
    Route::get('/{id}/extras', 'ExtrasController')->name('extras');
    Route::prefix('/discounts')->namespace('Discounts')->group(function () {
        Route::get('/', 'DiscountsController')->name('discounts');
        Route::post('/', 'StoreDiscountController')->name('store-discount');
        Route::put('/{id}', 'UpdateDiscountController')->name('update-discount');
        Route::delete('/{id}', 'DeleteDiscountController')->name('delete-discount');
    });
});

Route::prefix('/rooms')->namespace('Rooms')->group(function () {
    Route::prefix('/promocodes')->namespace('Promocodes')->group(function () {
        Route::get('/', 'PromocodesController')->name('promocodes');
        Route::post('/', 'StorePromocodeController')->name('store-promocode');
        Route::get('/{id}', 'ShowPromocodeController')->name('show-promocode');
        Route::delete('/{id}', 'DeletePromocodeController')->name('delete-promocode');
        Route::put('/{id}', 'UpdatePromocodeController')->name('update-promocode');
    });
});

Route::prefix('/dashboard')->namespace('Dashboard')->name('dashboard.')->group(function () {
    Route::get('/bookings-share',  'BookingsShareController')->name('bookings-share');
    Route::get('/finances',  'FinancesController')->name('finances');
    Route::get('/profit',  'ProfitController')->name('profit');
    Route::prefix('/organization-notes')->namespace('OrganizationNote')->group(function () {
        Route::get('/', 'NotesController')->name('notes');
        Route::post('/', 'StoreNoteController')->name('store-notes');
        Route::get('/{id}', 'ShowNoteController')->name('show-notes');
        Route::delete('/{id}', 'DeleteNoteController')->name('delete-notes');
        Route::put('/{id}', 'UpdateNoteController')->name('update-notes');
    });
});

Route::prefix('/finances')->namespace('Finances')->group(function () {
    Route::get('/',  'FinancesController')->name('finances');
    Route::post('/withdrawal',  'WithdrawalController')->name('withdrawal');
});

Route::prefix('/settings')->namespace('Settings')->group(function () {
    Route::prefix('/extras')->namespace('Extras')->group(function () {
        Route::post('/upload-image', 'ImageExtraController')->name('image.upload');
        Route::get('/', 'ExtrasController')->name('extras');
        Route::post('/', 'StoreExtraController')->name('store-extra');
        Route::delete('/{id}', 'DeleteExtraController')->name('delete-extra');
        Route::put('/{id}', 'UpdateExtraController')->name('update-extra');
    });
    Route::prefix('/organizations')->namespace('Organization')->group(function () {
        Route::get('/', 'ShowOrganizationController')->name('show-organization');
        Route::put('/{id}', 'UpdateOrganizationController')->name('update-organization');
    });
    Route::prefix('/location')->namespace('Studio')->group(function () {
        Route::get('/services-facilities', 'ServicesFacilitiesController')->name('services-facilities');
        Route::post('/upload-image', 'ImageStudioController@upload')->name('image.upload');
        Route::get('/', 'StudiosController')->name('studios');
        Route::post('/', 'StoreStudioController')->name('store-studio');
        Route::get('/{id}', 'ShowStudioController')->name('show-studio');
        Route::put('/{id}', 'UpdateStudioController')->name('update-studio');
    });
    Route::get('/jswidget/{id}','JsWidgetController')->name('jswidget');
    Route::prefix('/room')->namespace('Room')->name('room.')->group(function () {
        Route::post('/upload-image', 'StoreImageController')->name('upload-image');
        Route::get('/additions', 'AdditionsController')->name('additions');
        Route::get('/{id}', 'ShowController')->name('show');
        Route::put('/{id}', 'UpdateController')->name('update');
        Route::post('/', 'StoreController')->name('store');
    });
});
