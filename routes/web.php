<?php

Route::get('/', function () {
    return view('qr_code');
})->name('qr_code');
Route::get('/check_done', function () {
    return view('done_checkin');
})->name('check_done');
Route::get('/login', function () {
    return view('/Admins/index');
})->name('login');
// Route::get('/checktime', function () {
//     return view('checktime');
// })->name('checktime');
Route::get('/edit_emp', function () {
    return view('edit_emp')->name('Edit');
});
Route::get('/create_emp','EmployeeController@line')->name('create_emp');


Route::get('/create_line', function () {
    return view('create_line');
})->name('create_line');
Route::get('/edit_line', function () {
    return view('edit_line');
})->name('edit_line');
// Route::get('/createcar', function () {
//     return view('create_car');
// })->name('createcar');
Route::get('/edit_car', function () {
    return view('edit_car'); 
})->name('edit_car');
 
Route::get('/work_check', function () {
    return view('work_check'); 
})->name('work_check');
  
Route::post('/check_w','WorkioController@check_w')->name('check_w');

Route::get('/createcar','CarController@show')->name('createcar');
Route::get('/show_car/{id}','CarController@show2')->name('show_car');
Route::get('/checktime','QueueController@index')->name('checktime');

Route::get('/carreport/{id}','CarController@delete');
Route::get('/car_report','CarController@index')->name('carreport');
Route::post('/create_car','CarController@create')->name('create_car'); 
Route::get('/car_edit/{id}','CarController@edit');
Route::post('/update_car','CarController@update')->name('update_car');  

// Route::get('/work_check','WorkioController@display_check')->name('work_c');

Route::get('/employee3/{id}','EmployeeController@index2')->name('employee2');

Route::post('/employee_create','EmployeeController@store')->name('employee_create');
Route::get('/workio/{id}/delete','WorkioController@destroy')->name('delete');
Route::post('/insert_work','WorkioController@insert_w');
Route::get('/workio/{id}','WorkioController@index')->name('workio');
Route::post('/update_status','WorkioController@status_c');
Route::get('/employee','EmployeeController@index')->name('employee');
Route::get('/employee/{id}/delete','EmployeeController@delete');
Route::get('/employee/{id}','EmployeeController@edit');
Route::get('/employee2/{id}','EmployeeController@show');
Route::post('/create_linecar','LineCarController@create')->name('create_linecar');
Route::get('/linecar','LineCarController@index')->name('linecar');
Route::get('/linecar/{id}','LineCarController@delete');
Route::get('/linecar_edit/{id}','LineCarController@edit');
Route::post('/update_line','LineCarController@update')->name('update_line');

Route::post('/update','EmployeeController@update')->name('update'); 
Route::get('qr_code', function () {
    
  return view('qr_code');
})->name('qr_code');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

