<?php

use Illuminate\Support\Facades\Route;

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

//CALLBACK URL GROUP
Route::prefix('callback')->group(function () {
    Route::post('payment', [App\Http\Controllers\CallbackController::class, 'payment']);
});

//PAYMENT GROUP
Route::prefix('payment')->group(function () {
    Route::post('invoice', [App\Http\Controllers\PaymentController::class, 'invoice']);
});

//CUSTOMER API
Route::prefix('customer')->group(function () {
    //AUTH
    Route::prefix('auth')->group(function () {
        Route::post('authenticate', [App\Http\Controllers\Customer\AuthController::class, 'authenticate']);
        Route::post('update', [App\Http\Controllers\Customer\AuthController::class, 'update']);
        Route::post('revoke', [App\Http\Controllers\Customer\AuthController::class, 'revoke']);
        Route::post('exist', [App\Http\Controllers\Customer\AuthController::class, 'exist']);

        Route::post('/register', [App\Http\Controllers\Customer\AuthController::class, 'register']);
        Route::post('/social', [App\Http\Controllers\Customer\AuthController::class, 'social']);
    });

    //MOBILE PAGE
    Route::prefix('page')->group(function () {
        Route::get('intro', [App\Http\Controllers\Customer\MobilePageController::class, 'intro']);
        Route::get('home', [App\Http\Controllers\Customer\MobilePageController::class, 'home']);
        Route::get('search', [App\Http\Controllers\Customer\MobilePageController::class, 'search']);
        Route::get('product/{id}', [App\Http\Controllers\Customer\MobilePageController::class, 'product']);
    });

    Route::prefix('domain')->group(function () {
        Route::prefix('product')->group(function () {
            Route::post('/', [App\Http\Controllers\Customer\ProductController::class, 'product']);
            Route::post('total', [App\Http\Controllers\Customer\ProductController::class, 'productTotal']);
            Route::post('favourite', [App\Http\Controllers\Customer\ProductController::class, 'productFavourite']);
        });

        Route::prefix('search')->group(function () {
            Route::post('/', [App\Http\Controllers\Customer\SearchController::class, 'search']);
        });

        Route::prefix('cart')->group(function () {
            Route::post('/', [App\Http\Controllers\Customer\CartController::class, 'cart']);
            Route::post('update', [App\Http\Controllers\Customer\CartController::class, 'cartUpdate']);
        });

        Route::prefix('payment')->group(function () {
            Route::get('channel', [App\Http\Controllers\Customer\PaymentChannelController::class, 'paymentChannel']);
        });

        Route::prefix('bundle')->group(function () {
            Route::post('/', [App\Http\Controllers\Customer\BundleController::class, 'index']);
        });

        Route::prefix('order')->group(function () {
            Route::post('create', [App\Http\Controllers\Customer\OrderController::class, 'create']);
        });

        //================================================================================================================//
        Route::prefix('places')->group(function () {
            Route::post('/', [App\Http\Controllers\Customer\PlaceSuggestionController::class, 'index']);
            Route::post('store', [App\Http\Controllers\Customer\PlaceSuggestionController::class, 'store']);
        });
    });
});
