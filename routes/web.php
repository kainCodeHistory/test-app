<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\MealRecord\DateMealRecordController;
use App\Http\Controllers\MealRecord\MealRecordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('login', [LoginController::class,'show'])->name('login');
Route::post('login', [LoginController::class,'login'])->name('login');
Route::get('logout', 'Login\LoginController@logout')->name('logout');
Route::get('login/reset', 'Login\LoginController@passwordReset')->name('password.reset');
Route::post('login/reset', 'Login\LoginController@passwordMail')->name('password.mail');
Route::get('login/password/{key}', 'Login\LoginController@pwdResetByURL')->name('login.pwdUpdateByURL')->where('key', '[A-Fa-f0-9]{64}');
Route::post('login/password/{key}', 'Login\LoginController@pwdUpdateByURL')->name('login.pwdUpdateByURL')->where('key', '[A-Fa-f0-9]{64}');

/**  register */
Route::get('register', 'Login\RegisterController@show')->name('register');
Route::post('register', 'Login\RegisterController@register')->name('register');
/**  register enable */
Route::get('register/enable/{key}', 'Login\RegisterController@enable')->name('register.enable')->where('key', '[A-Fa-f0-9]{64}');
Route::post('register/enable/{key}', 'Login\RegisterController@password')->name('register.enable')->where('key', '[A-Fa-f0-9]{64}');
Route::get('register/enable/success', 'Login\RegisterController@success')->name('register.success');

Route::group(['middleware' => 'auth'], function () {
    /** user center*/
    Route::get('user', 'User\UserController@show')->name('user');
    Route::get('user/rank', 'User\UserController@rank')->name('user.rank');
    Route::get('user/edit', 'User\UserController@edit')->name('user.edit');
    Route::post('user/update', 'User\UserController@update')->name('user.update');
    Route::get('user/password', 'User\UserController@pwdEdit')->name('user.password');
    Route::post('user/password', 'User\UserController@pwdUpdate')->name('user.password');
   
    /** userProfile */
    Route::get('userProfile', 'User\UserProfileController@read')->name('userProfile.read');
    Route::post('userProfile/store', 'User\UserProfileController@store')->name('userProfile.store');
    Route::get('userProfile/edit', 'User\UserProfileController@edit')->name('userProfile.edit');
    Route::get('userProfile/keep', 'User\UserProfileController@keep')->name('userProfile.keep');
    
// Route::get('userProfile/create', 'User\UserProfileController@create')->name('userProfile.create');
// Route::post('userProfile/update', 'User\UserProfileController@update')->name('userProfile.update');
});
Route::get('mealRecord/read', [MealRecordController::class , 'read'])->name('mealRecord.read');
Route::get('sevenMealRecord/readChart', [MealRecordController::class , 'readChart'])->name('sevenMealRecord.readChart');
Route::get('sevenMealRecord/readList', [MealRecordController::class , 'readList'])->name('sevenMealRecord.readList');
Route::get('mealRecord/createDate', [MealRecordController::class , 'createDate'])->name('mealRecord.createDate');
Route::get('dateMealRecord/readList', [DateMealRecordController::class,'readList'])->name('dateMealRecord.readList');
Route::get('dateMealRecord/readChart', [DateMealRecordController::class,'readChart'])->name('dateMealRecord.readChart');
