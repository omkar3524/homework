<?php

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

use App\Mail\SendGrid;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('send', function () {
    Mail::to('omkar3524@gmail.com')->send(new SendGrid());
});
Route::get('paypal', 'PaymentController@getPaypalForm');
Route::post('payment/add-funds/paypal', 'PaymentController@payWithpaypal');
Route::get('status', 'PaymentController@getPaymentStatus')->name('status');
Route::get('cancel', 'PaymentController@cancel')->name('cancel');

Route::get('toast', 'UserController@view')->name('toast');
Route::get('test', 'UserController@index')->name('test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/2fa', 'PasswordSecurityController@show2faForm');
Route::post('/generate2faSecret', 'PasswordSecurityController@generate2faSecret')->name('generate2faSecret');
Route::post('/2fa', 'PasswordSecurityController@enable2fa')->name('enable2fa');
Route::post('/disable2fa', 'PasswordSecurityController@disable2fa')->name('disable2fa');
