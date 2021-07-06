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

Route::get('/', ['uses'=>'HomeController@index','as'=>'home']);

/* Auth */
Route::get('/signup','AuthController@getSignup')->name('signup');
Route::post('/signup','AuthController@postSignup');

//Route::get('/test','AuthController@test')->name('test');

Route::get('/signin','AuthController@getSignin')->name('signin');
Route::post('/signin','AuthController@postSignin');

/* Clients */
Route::get('/user','ClientController@index')->name('client');
Route::get('/signout','AuthController@getSignout')->name('logout');
Route::get('/addinfo','ClientController@getInfo')->name('addinfo');
Route::post('/addinfo','ClientController@postInfo');

Route::get('/user/update','ClientController@getUpdateClient')->name('clientUpdate');
Route::post('/user/update','ClientController@postUpdateClient');

Route::get('/user/Usertable','ClientController@getUserTable')->name('userTable');
Route::get('/user/CatTable','ClientController@getCatUserTable')->name('catUserTable');
Route::get('user/UserPersonal/{id}','ClientController@getUserInfo')->name('userInf');

Route::get('/user/Eventtable','ClientController@getEventTable')->name('eventUserTable');
Route::get('/user/EventInf/{id}','ClientController@getEventInf')->name('eventUserInf');

/**Cats */
Route::get('/user/addcat','CatController@getAddCat')->name('addcat');
Route::post('/user/addcat','CatController@postAddCat');

Route::get('/user/cat','CatController@getInfoCat')->name('catinfo');
Route::get('/user/catView/{id}','CatController@getViewCat')->name('catView');

Route::get('/user/cat/update','CatController@getUpdateCat')->name('catupdate');
Route::post('/user/cat/update','CatController@postUpdateCat');

Route::get('/user/cat/delete','CatController@deleteCat')->name('catdelete');

/* Employees */
Route::get('/admin','EmployeeController@index')->name('admin');
Route::get('/admin/signin','EmployeeController@getSignin')->name('admin_signin');
Route::post('/admin/signin','EmployeeController@postSignin');

Route::get('/admin/signout','EmployeeController@getSignout')->name('admin_logout');

Route::get('admin/addAdminInfo','EmployeeController@getInfo')->name('addAdminInfo');
Route::post('admin/addAdminInfo','EmployeeController@postInfo');
Route::get('/admin/update','EmployeeController@getUpdateAdmin')->name('admin_update');
Route::post('/admin/update','EmployeeController@postUpdateAdmin');

Route::get('admin/employeeTable','EmployeeController@getAdminTable')->name('adminTable');
/* admin crud */


Route::get('admin/employeeTable/create_new_employee','EmployeeController@getAdminNew_Create')->name('new_employee');
Route::post('admin/employeeTable/create_new_employee','EmployeeController@postAdminNew_Create');

Route::get('admin/employeeTable/update_employee/{id}','EmployeeController@getAdminNew_Update')->name('update_employee');
Route::post('admin/employeeTable/update_employee/{id}','EmployeeController@postAdminNew_Update');

Route::get('admin/employeeTable/delete_employee/{id}','EmployeeController@deleteAdminNew_Delete')->name('delete_employee');

Route::get('admin/clientsTable','EmployeeController@getClientsTable')->name('clientTable');
Route::get('admin/clientsTable/client/{id}','EmployeeController@getClientInfo')->name('clientInf');

Route::get('admin/clientsTable/create_new_client','EmployeeController@getClientNew_Create')->name('new_client');
Route::post('admin/clientsTable/create_new_client','EmployeeController@postClientNew_Create');

Route::get('admin/clientsTable/update_client/{id}','EmployeeController@getClientNew_Update')->name('update_client');
Route::post('admin/clientsTable/update_client/{id}','EmployeeController@postClientNew_Update');

Route::get('admin/clientsTable/delete_client/{id}','EmployeeController@deleteClientNew_Delete')->name('delete_client');


Route::get('admin/catsTable','EmployeeController@getCatsTable')->name('catTable');

Route::get('admin/catsTable/create_new_cat','EmployeeController@getCatNew_Create')->name('new_cat');
Route::post('admin/catsTable/create_new_cat','EmployeeController@postCatNew_Create');

Route::get('admin/catsTable/update_cat/{cid}','EmployeeController@getCatNew_Update')->name('update_cat');
Route::post('admin/catsTable/update_cat/{cid}','EmployeeController@postCatNew_Update');
Route::get('admin/catsTable/delete_cat/{id}','EmployeeController@deleteCatNew_Delete')->name('delete_cat');

Route::get('admin/eventsTable','EmployeeController@getEventsTable')->name('eventTable');

Route::get('admin/eventsTable/create_new_event','EmployeeController@getEventNew_Create')->name('new_event');
Route::post('admin/eventsTable/create_new_event','EmployeeController@postEventNew_Create');
Route::get('admin/eventsTable/create_new_participate','EmployeeController@getParticipatetNew_Create')->name('new_participate');
Route::post('admin/eventsTable/create_new_participate','EmployeeController@postParticipatetNew_Create');

Route::get('admin/eventsTable/update_event/{id}','EmployeeController@getEventNew_Update')->name('update_event');
Route::post('admin/eventsTable/update_event/{id}','EmployeeController@postEventNew_Update');
Route::get('admin/eventsTable/delete_event/{id}','EmployeeController@deleteEventNew_Delete')->name('delete_event');

Route::get('admin/eventsTable/page_event/{id}','EmployeeController@getPageEvent')->name('page_event');