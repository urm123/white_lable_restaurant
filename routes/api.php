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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->json([
        'message' => 'success',
        'data' => [
            'user' => $request->user(),
        ]
    ]);
});

//Route::get('test', function (Request $request) {
//    \Illuminate\Support\Facades\Log::info($request);
//});


Route::namespace('Api\User')->name('api.')->group(function () {
    Route::get('/search', 'SearchController@search')->name('user.search');
    Route::resource('cuisine', 'CuisineController');
    Route::resource('restaurant', 'RestaurantController');
    Route::resource('user', 'UserController')->only(['store']);
    Route::resource('review', 'ReviewController')->only(['index']);
});


Route::namespace('Api\User')->name('api.')->middleware('auth:api')->group(function () {
    Route::resource('address', 'AddressController');
    Route::resource('reservation', 'ReservationController');
    Route::resource('delivery', 'DeliveryController');
    Route::resource('takeaway', 'TakeawayController');
    Route::post('/restaurant/favourite', 'RestaurantController@favourite')->name('restaurant.favourite');
    Route::get('/user/user', 'UserController@getUser');
    Route::get('/user/favourites', 'RestaurantController@favourites');
    Route::get('/user/order', 'UserController@orders');
    Route::resource('user', 'UserController')->only(['update', 'show']);
    Route::resource('review', 'ReviewController')->only(['store']);
    Route::post('promotion/validate', 'PromotionController@validatePromocode')->name('promotion.validate');
});

//web routes
//web routes
//web routes

Route::namespace('Api\Web')->prefix('web')->name('web.')->group(function () {
    Route::get('/popular-items', 'PageController@popularItems')->name('web.popular-items');
    Route::get('/menu-categories', 'MenuController@all')->name('web.menu-categories');
    Route::get('/menu-items', 'MenuItemController@byMenu')->name('web.menu-items');
    Route::get('/menu-item', 'MenuItemController@get')->name('web.menu-item');
});
