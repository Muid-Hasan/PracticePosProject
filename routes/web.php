<?php

use Helper\JWTTOKEN;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Middleware\TokenVerificationMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/UserRegistration',[userController::class,'userRegistration']);
Route::post('/UserLogin',[userController::class,'userLogin']);
Route::post('/SendOtp',[userController::class,'sendOtpCode']);
Route::post('/verifyToken',[userController::class,'verifyToken']);
Route::post('/ResetPassword',[userController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);


Route::get('/userLogin',[userController::class,'LoginPage']);
Route::get('/userRegistration',[userController::class,'UserRegistrationPage']);
Route::get('/sendOtp',[userController::class,'SendOtpPage']);
Route::get('/verifyOtp',[userController::class,'VerifyOtpPage']);
Route::get('/resetPassword',[userController::class,'ResetPasswordPage']);
Route::get('/dashBoard',[userController::class,'DashBoardPage']);
