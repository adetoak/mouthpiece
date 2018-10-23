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

/*Route::get('/', function () {
    return view('index');
});*/
Route::post('subscribers', array('as' => 'subscribers', 'uses' => 'SubscriberController@postSubmit'));
//Route::post('subscribers', 'SubscriberController@postSubmit')->name('subscribers');

Auth::routes();

// Home controller
Route::get('/', 'HomeController@index')->name('home');
Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');

//Search controller
Route::get('services/results', 'SearchController@servicesearch')->name('servicesearch');
Route::get('products/results', 'SearchController@productsearch')->name('productsearch');


// Services controller
Route::get('services/service-profile/{serviceid}', 'ServicesController@serviceprofile')->name('serviceprofile');
Route::get('products/product-details/{productid}', 'ServicesController@productdetails')->name('productdetails');

//Transaction Controller
Route::post('/pay', 'TransactionsController@redirectToGateway')->name('pay');

//Cart Controller
Route::post('products/shoppingcart', 'CartController@shoppingcart')->name('shoppingcart');
Route::get('cart', 'CartController@cart')->name('cart');

Route::group(array('middleware' => 'auth'), function(){
	//Cart controller
	Route::get('cart/remove/{id}', 'CartController@removefromcart')->name('removefromcart');
	
	// Profile controller
	Route::get('dashboard', 'ProfileController@dashboard')->name('dashboard');
	Route::get('upgrade-account', 'ProfileController@upgradeAccount')->name('upgrade-account');
	Route::get('edit-profile', 'ProfileController@editprofile')->name('editprofile');
	Route::post('edit-profile', 'ProfileController@profileedit')->name('profileedit');
	Route::post('profile-image', 'ProfileController@profileimg')->name('profileimg');
	Route::post('changepassword', 'ProfileController@changepassword')->name('changepassword');
	Route::get('verify-profile', 'ProfileController@verifyprofile')->name('verifyprofile');
	Route::post('verify-profile', 'ProfileController@verifydoc')->name('verifydoc');
	Route::post('updatesocial', 'ProfileController@updatesocial')->name('updatesocial');

	//ServicesController
	Route::get('upload-video/{id}', 'ServicesController@uploadVideo')->name('upload-video');
	Route::post('upload-video/{id}', 'ServicesController@postVideo')->name('upload-video');

		//Services Route		
		Route::get('services/myservices', 'ProfileController@myservices')->name('myservices');
		Route::get('services/post-service', 'ProfileController@postservice')->name('postservice');
		Route::post('services/post-service', 'ProfileController@servicepost')->name('postservice');

		//Products routes		
		Route::get('products/myproducts', 'ProfileController@myproducts')->name('myproducts');
		Route::get('products/post-product', 'ProfileController@postproduct')->name('postproduct');
		Route::post('products/post-product', 'ProfileController@productpost')->name('postproduct');

	// Job controller
	Route::get('job-offers', 'JobController@joboffers')->name('joboffers');
	Route::get('post-job', 'JobController@postjob')->name('postjob');
	Route::post('post-job', 'JobController@jobpost')->name('postjob');	

	// Message contoller
	Route::get('messages/{ref}/{id}', 'MessageController@messages')->name('messages');
	Route::get('messages/{msgid?}', 'MessageController@index')->name('messages');
	Route::post('messages', 'MessageController@messagepost')->name('messages');

	// Transactions Controller
	Route::get('myorders', 'TransactionsController@myorders')->name('myorders');
	Route::get('order/delete/{orderid}/{product_id}', 'TransactionsController@deleteOrder')->name('delete-order');
	Route::get('billing', 'TransactionsController@billing')->name('billing');
	Route::post('postbilling', 'TransactionsController@postbilling')->name('postbilling');
	Route::get('checkout/{billingid}', 'TransactionsController@checkout')->name('checkout');
	Route::post('submitcart', 'TransactionsController@productInvoice')->name('submitcart');
	/*Route::get('checkout', 'TransactionsController@checkout')->name('checkout');*/	
	Route::any('invoice/{reference?}/{invoiceid?}', 'TransactionsController@invoice')->name('invoice');
	Route::post('feedback', 'TransactionsController@feedback')->name('feedback');
	Route::post('productcheckout', 'TransactionsController@productInvoice')->name('productcheckout');
	Route::get('response', 'TransactionsController@response')->name('response');
	Route::get('order/{serviceid}', 'TransactionsController@serviceInvoice')->name('order');
	Route::get('product-orders', 'TransactionsController@productOrders')->name('product-orders');
	Route::get('service-orders', 'TransactionsController@serviceOrders')->name('service-orders');
	
	Route::get('/payment/callback', 'TransactionsController@handleGatewayCallback');

});
