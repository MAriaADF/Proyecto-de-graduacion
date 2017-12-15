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
    return view('webpage/home');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/input', 'ProvisionController@indexInput');
Route::get('/output', 'ProvisionController@indexOutput');
Route::post('/storeInput', 'ProvisionController@storeInput');
Route::post('/storeOutput', 'ProvisionController@storeOutput');
Route::get('/regist_provi', 'ProvisionController@indexProvi');
Route::post('/regist_provision', 'ProvisionController@registerProvi');
Route::resource('reservation', 'ReservationController');
Route::post('priceRoom', 'PriceRoomController@update');
Route::resource('provision', 'ProvisionController');
Route::resource('roomReservation', 'RoomReservationController');
Route::resource('rooms', 'RoomController');
Route::resource('client', 'PersonController');
Route::resource('HistProvi', 'HistProviController');
Route::post('/pago', 'ReservationController@pago');

// PersonUser
Route::resource('configuration', 'PersonUserController');
Route::get('/editPerson/{id}/{id_user}/', 'PersonUserController@edit');
Route::post('/updatePerson/{id}/{id_user}/', 'PersonUserController@update');
Route::get('/showUser', 'PersonUserController@showUser');
Route::get('/changePassword', 'UserController@changePassword');
Route::post('/updatePassword', 'UserController@updatePassword');
Route::get('destroyUser/{id}', 'PersonUserController@destroy');
Route::get('/historyUser/{id}', 'PersonUserController@history');
Route::post('/history', 'PersonUserController@showHistory');


//Person
Route::get('/showClient', 'PersonController@showClient');
Route::get('/indexClient', 'PersonController@index');
Route::get('/editClient/{id}', 'PersonController@edit');
Route::get('destroy/{id}', 'PersonController@destroy');
Route::post('/edit/{id}', 'PersonController@update');
Route::get('create/{id}','PersonController@showPerson');
Route::get('/historialClient/{id}','PersonController@historialClient');


Route::get('proyecto/{date_check_in}/{date_check_out}/{pax}','ReservationController@indexRoom');
Route::get('room/{pax}','PriceRoomController@indexRoo');


//income/expenses
Route::get('/indexIncome', 'IncomeExpensesController@indexIncome');
Route::get('/indexReport', 'IncomeExpensesController@indexReport');
Route::post('/storeReport', 'IncomeExpensesController@storeReport');
Route::post('/storeIncome', 'IncomeExpensesController@storeIncome');
Route::get('/searchInExp', 'IncomeExpensesController@searchInExp');
Route::post('/searchInExpe', 'IncomeExpensesController@searchInExpTip');
Route::get('/editInExpe/{id}', 'IncomeExpensesController@edit');
Route::get('destroyInExpe/{id}', 'IncomeExpensesController@destroy');
Route::post('updateInExpe/{id}', 'IncomeExpensesController@update');
Route::get('payment/{id}', 'IncomeExpensesController@payment');


//Reports
Route::get('/reportReservation', 'ReportsController@ReportReservation');
Route::get('/ReportClient', 'ReportsController@ReportClient');
Route::get('/ReportRoom', 'ReportsController@ReportRoom');
Route::get('/ReporIncomeExp', 'ReportsController@ReporIncomeExp');
Route::get('/ReporMaintenance', 'ReportsController@ReporMaintenance');
Route::get('/ReporCleaning', 'ReportsController@ReporCleaning');
Route::get('/ReporProvision', 'ReportsController@ReporProvision');
Route::post('/reportReservation', 'ReportsController@report_reser_tip');
Route::post('/reportClient', 'ReportsController@report_client_tip');
Route::post('/reportRoom', 'ReportsController@reportRoomTip');
Route::post('/reportClean', 'ReportsController@reporCleaningTip');
Route::post('/reportMantenance', 'ReportsController@reporMaintenanceTip');
Route::post('/reportProvision', 'ReportsController@reporProvisionTip');
Route::post('/reportIncomeExp', 'ReportsController@reporIncomeExpTip');




//webpage
Route::get('/index_page', 'WebpageController@index');
Route::get('/create', 'WebpageController@create');
Route::get('/conctactenos', 'WebpageController@conctactenos');
Route::get('/nuestrohotel', 'WebpageController@nuestrohotel');
Route::get('/galeria', 'WebpageController@galeria');


//
Route::get('/roomClean', 'RoomController@indexRoom');
Route::get('/roommaintenance', 'RoomController@indexRoomMante');
Route::post('/insertmaintenance', 'RoomController@storeMante');
Route::get('/HistoryRoom','RoomController@histRoom');
Route::post('/endMaintenance', 'RoomController@manteEnd');





Route::get('/index', 'PriceRoomController@index');
Route::get('/search', 'ReservationController@indexSearch');
Route::get('edit/{id_person}/{id_reservation}/', 'ReservationController@edit');
Route::get('see/{id_person}/{id_reservation}/', 'ReservationController@see');
Route::get('payment/{num}', 'ReservationController@payment');
Route::get('date_check_in/{id_reservation}', 'ReservationController@date_check_in');
Route::get('date_check_out/{id_reservation}', 'ReservationController@date_check_out');


Route::post('consult/', 'ReservationController@consult');

Route::get('history/{id_person}/{id_reservation}/', 'ReservationController@history');
Route::get('/borrar/{id}/{id_person}/{id_reservation}/', 'RoomReservationController@destroy');
Route::get('/editRoom/{id}/{id_reservation}/', 'RoomReservationController@edit');
Route::post('/storeRoom/{id_person}/{id_reservation}', 'RoomReservationController@update');

Route::get('editOnline/{id_person}/{id_reservation}/', 'WebpageController@edit');
Route::post('/editOnline1/{id_person}/{id_reservation}', 'WebpageController@update');
Route::post('/storeResvation', 'WebpageController@store');
Route::post('/cancel/{id_person}/{id_reservation}', 'WebpageController@updateCancelar');


