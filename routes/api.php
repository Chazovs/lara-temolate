<?php

use Illuminate\Http\Request;
use App\Http\Controllers\GoodController;
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

/*Route::apiResource('/good', 'GoodController');*/
Route::apiResource('/company', 'CompanyController');
Route::apiResource('/ticket', 'TicketController');
Route::apiResource('/place', 'PlaceController');


Route::get('/ticket-add', 'TicketController@store');


/*Route::get('/make-user', 'Auth\RegisterController@create');
Route::get('/login-user', 'Auth\LoginController@login');*/
/*Route::get('/login-user', 'Auth\LoginController.php@login');*/
/*Route::get('/good/index', 'GoodController@index');*/
// Маршруты регистрации...
Route::get('auth/login', 'Auth\LoginController@login');
Route::get('auth/register', 'Auth\RegisterController@register');

/*Route::get('auth/transport', 'Auth\RegisterController@transport');*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

