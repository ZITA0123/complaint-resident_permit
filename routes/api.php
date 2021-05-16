<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\RdvController;
use App\Http\Controllers\UserController;

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
//Route::put('user/{id}',[UserController::class,'update']);
Route::put('user',[UserController::class,'update']);
Route::get('users/{id}',[UserController::class,'getUser']);
Route::get('users-rdv/{id}',[UserController::class,'getRdv']);
Route::delete('users/{id}', [UserController::class,'delete']);


Route::middleware('auth:api')->get('/rdv', function (Request $request) {
    return $request->user();
});
Route::post('rdvs', [RdvController::class,'save']);
Route::get('rdvs',[RdvController::class,'index']);
Route::get('rdvs/dates',[RdvController::class,'getAllDates']);//all dates
Route::get('rdvs/times/{date}',[RdvController::class,'getAllTimes']);//all times
Route::put('rdv',[RdvController::class,'update']);
Route::get('rdvs/{id}',[RdvController::class,'getRdv']);
Route::get('rdvs/user/{id}',[RdvController::class,'getByUserId']);//rdv_user
Route::delete('rdvs/{id}', [RdvController::class,'delete']);
