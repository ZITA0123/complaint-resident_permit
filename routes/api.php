<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthAdminController;

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



Route::middleware('auth:api')->get('/admin', function (Request $requestadmin) {
    return $requestadmin->admin();
});


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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/Adminlogin', [AuthAdminController::class, 'Adminlogin']);
    Route::post('/Adminregister', [AuthAdminController::class, 'Adminregister']);
    Route::post('/Adminlogout', [AuthAdminController::class, 'Adminlogout']);
    Route::post('/refreshAdmin', [AuthAdminController::class, 'Adminrefresh']);
    Route::get('/Admin-profile', [AuthAdminController::class, 'AdminProfile']);

});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('users', [UserController::class,'save']);
Route::get('users',[UserController::class,'index']);
Route::put('user',[UserController::class,'update']);
Route::delete('users/{id}', [UserController::class,'delete']);
