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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware'=>'auth'],function(){

Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['middleware'=>'auth'],function(){
	Route::resource('users','UserController');

});


Route::group(['middleware'=>'auth'],function(){
	Route::resource('zodiacs','ZodiacController');
});

Route::group(['middleware'=>'auth'],function(){
	Route::resource('customers','CustomerController');
});

Route::group(['middleware'=>['auth'],'prefix'=>'horoscope'],function(){
    Route::any('daily','HoroscopeController@dailyIndex');
    Route::any('dailycreate','HoroscopeController@dailyCreate')->name('dailycreate');
    Route::any('dailyedit/{id}','HoroscopeController@dailyEdit')->name('dailyedit');
    Route::any('dailystore','HoroscopeController@dailyStore')->name('dailystore');
    Route::any('dailyupdate/{id}','HoroscopeController@dailyUpdate')->name('dailyupdate');

    Route::any('weekly','HoroscopeController@weeklyIndex');
    Route::any('weeklycreate','HoroscopeController@weeklyCreate')->name('weeklycreate');
    Route::any('weeklyedit/{id}','HoroscopeController@weeklyEdit')->name('weeklyedit');
     Route::any('weeklystore','HoroscopeController@weeklyStore')->name('weeklystore');
    Route::any('weeklyupdate/{id}','HoroscopeController@weeklyUpdate')->name('weeklyupdate');

    Route::any('monthly','HoroscopeController@monthlyIndex');
    Route::any('monthlycreate','HoroscopeController@monthlyCreate')->name('monthlycreate');
    Route::any('monthlyedit/{id}','HoroscopeController@monthlyEdit')->name('monthlyedit');
     Route::any('monthlystore','HoroscopeController@monthlyStore')->name('monthlystore');
    Route::any('monthlyupdate/{id}','HoroscopeController@monthlyUpdate')->name('monthlyupdate');

    Route::get('yearly','HoroscopeController@yearlyIndex');
    Route::any('yearlycreate','HoroscopeController@yearlyCreate')->name('yearlycreate');
    Route::post('yearlyedit/{id}','HoroscopeController@yearlyEdit')->name('yearlyedit');
     Route::any('yearlystore','HoroscopeController@yearlyStore')->name('yearlystore');
    Route::any('yearlyupdate/{id}','HoroscopeController@yearlyUpdate')->name('yearlyupdate');
});


Route::group(['namespace'=>'Api','prefix'=>'api/customers'],function(){
Route::any('store','ApiCustomerController@store');
Route::post('show','ApiCustomerController@show');
Route::patch('update/{id}','ApiCustomerController@update');
Route::get('/','ApiCustomerController@index');
// Route::get('twins','ApiCustomerController@getTwins');
Route::post('twins/{id}','ApiCustomerController@getExactTwins');
// Route::any('yeartwins/{id}','ApiCustomerController@getYearTwins');
// Route::post('exacttwins/{id}','ApiCustomerController@getExactTwins');
Route::post('peoplenearby','ApiCustomerController@getLocation');
});

Route::group(['middleware'=>['auth']],function(){
    Route::resource('threads','ThreadController');
});

Route::group(['namespace'=>'Api','prefix'=>'api'],function(){
Route::post('dailyhoroscope','ApiHoroscopeController@dailyIndex'); 
Route::post('weeklyhoroscope','ApiHoroscopeController@weeklyIndex'); 
Route::post('monthlyhoroscope','ApiHoroscopeController@monthlyIndex'); 
Route::post('yearlyhoroscope','ApiHoroscopeController@yearlyIndex'); 

Route::post('horoscope','ApiHoroscopeController@getHoroscope');
});


Route::group(['namespace'=>'Api','prefix' =>'api/friends'],function(){
    Route::post('store','ApiFriendsController@store');
    Route::post('requestack','ApiFriendsController@friendshipAck');
    Route::post('allFriends/{id}','ApiFriendsController@allFriends');
    Route::post('pending/{id}','ApiFriendsController@pendingRequests');
    Route::post('blocked/{id}','ApiFriendsController@blockedList');
    Route::post('deletereq','ApiFriendsController@deleteRequest');

});

Route::group(['namespace'=>'Api','prefix'=>'api/devices'],function(){
    Route::post('store','ApiDeviceController@store');
    Route::post('upadte','ApiDeviceController@store');

});

