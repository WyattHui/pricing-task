<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PriceItemController;
use App\Http\Controllers\PriceItemRuleController;

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
    return $request->user();
});

Route::group([], function ($route) {
    $route->group(['prefix' => 'price-item'], function ($route) {
        $route->get('get/{id}', [PriceItemController::class, 'get']);
        $route->get('quote/{id}', [PriceItemController::class, 'quote']);
    });
    $route->group(['prefix' => 'price-item-rule'], function ($route) {
        $route->post('', [PriceItemRuleController::class, 'create']);
        $route->put('{priceItemRule}', [PriceItemRuleController::class, 'update']);
        $route->get('list', [PriceItemRuleController::class, 'list']);
        $route->get('get/{priceItemRule}', [PriceItemRuleController::class, 'get']);
    });
});
