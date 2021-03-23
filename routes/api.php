<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Models\UserRole;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware' => 'auth:api'], function() {
    Route::apiResource('articles', ArticleController::class)->middleware('check_user_role:' . env('APP_ROLE_USER'));

    Route::group(['middleware' => 'check_user_role:' . env('APP_ROLE_ADMIN')], function() {
        Route::apiResources([
            'users' => UserController::class,
            'user/roles' => UserRoleController::class,
        ]);
    });
});

Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'] );
Route::post('login', [LoginController::class, 'login'] );
Route::get('logout', [LoginController::class, 'logout'] );
