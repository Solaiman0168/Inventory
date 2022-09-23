<?php

use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    // Route::post('login', 'AuthController@login');
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('signup', 'App\Http\Controllers\AuthController@signup');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');

});

Route::apiResource('/employee', 'App\Http\Controllers\Api\EmployeeController');
Route::apiResource('/supplier', 'App\Http\Controllers\Api\SupplierController');
Route::apiResource('/category', 'App\Http\Controllers\Api\CategoryController');
Route::apiResource('/product', 'App\Http\Controllers\Api\ProductController');
Route::apiResource('/expense', 'App\Http\Controllers\Api\ExpenseController');
Route::apiResource('/customer', 'App\Http\Controllers\Api\CustomerController');

Route::post('/salary/paid/{id}', 'App\Http\Controllers\Api\SalaryController@paid');
Route::get('/salary', 'App\Http\Controllers\Api\SalaryController@AllSalary');
Route::get('/view/salary/{id}', 'App\Http\Controllers\Api\SalaryController@ViewSalary');
Route::get('/edit/salary/{id}', 'App\Http\Controllers\Api\SalaryController@EditSalary');
Route::post('/salary/update/{id}', 'App\Http\Controllers\Api\SalaryController@SalaryUpdate');

Route::post('/stock/update/{id}', 'App\Http\Controllers\Api\ProductController@StockUpdate');

Route::Get('/getting/product/{id}', 'App\Http\Controllers\Api\PosController@GetProduct');

// Add to cart Route
Route::Get('/addToCart/{id}', 'App\Http\Controllers\Api\CartController@AddToCart');
Route::Get('/cart/product', 'App\Http\Controllers\Api\CartController@CartProduct');

Route::Get('/remove/cart/{id}', 'App\Http\Controllers\Api\CartController@removeCart');

Route::Get('/increment/{id}', 'App\Http\Controllers\Api\CartController@increment');
Route::Get('/decrement/{id}', 'App\Http\Controllers\Api\CartController@decrement');


// Vat Route
Route::Get('/vats', 'App\Http\Controllers\Api\CartController@Vats');

Route::Post('/orderdone', 'App\Http\Controllers\Api\PosController@OrderDone');


