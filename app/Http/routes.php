<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('hello/{name}', function($name){
	echo "hellow There.....! ".$name;
});

Route::get('customer/{id}', 'CustomerController@customer');

Route::get('customer_name', function(){
	$customer = App\Customer::where('name', '=', 'johny')->first();
	echo $customer->id;
});

Route::get('orders', function(){
	$orders = App\Order::all();
	foreach($orders as $order){
		$customer = App\Customer::find($order->customer_id);
		echo $order->name . " Ordered by ".$customer->name . "<br/>";
	}
});

//create an item
Route::post('test', function(){
	echo "POST";
});

//read an item
Route::get('test', function(){
	echo "GET";
});

//update an item
Route::put('test', function(){
	echo "PUT";
});

//delete an item
Route::delete('test', function(){
	echo "Delete";
});

Route::get('mypage', function(){
	return view('mypage');
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
