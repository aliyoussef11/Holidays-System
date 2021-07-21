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

//Routes for academic user
Route::get('/academic', 'AcademicController@index');
Route::post('/store-academic', 'AcademicController@store');
Route::get('/edit-a-holiday-academic', 'AcademicController@display_edit_page');
Route::get('/edit-academic-holiday/{name}/{role}/{title}/{date}', 'AcademicController@show_edit_page_form');
Route::post('/edit-academic-holiday/{name}/{role}/{title}/edit/academic-holiday/{date}', 'AcademicController@Edit_Holiday');
Route::get('/delete-a-holiday-academic', 'AcademicController@display_delete_page');
Route::get('/delete-academic-holiday/{name}/{role}/{title}/{date}', 'AcademicController@Delete_Holiday');
Route::get('/Hide-Academic/{name}/{role}/{title}/{date}/{response}', 'AcademicController@Hide_Notification');
Route::get('/academic-statistics', 'AcademicController@Display_Statistics');

//Routes for non-academic user
Route::get('/non-academic', 'NonAcademicController@index');
Route::post('/store-non-academic', 'NonAcademicController@store');
Route::get('/delete-a-holiday-non-academic', 'NonAcademicController@display_delete_page');
Route::get('/delete-non-academic-holiday/{name}/{role}/{title}/{date}', 'NonAcademicController@Delete_Holiday');
Route::get('/edit-a-holiday-non-academic', 'NonAcademicController@display_edit_page');
Route::get('/edit-non-academic-holiday/{name}/{role}/{title}/{date}', 'NonAcademicController@show_edit_page_form');
Route::post('/edit-non-academic-holiday/{name}/{role}/{title}/edit/non-academic-holiday/{date}', 'NonAcademicController@Edit_Holiday');
Route::get('/Hide/{name}/{role}/{title}/{date}/{response}', 'NonAcademicController@Hide_Notification');
Route::get('/non-academic-statistics', 'NonAcademicController@Display_Statistics');

//Routes for admin
Route::get('/admin', 'AdminController@index');
Route::get('/show-requests', 'AdminController@display_requests');
Route::get('/accept-request/{name}/{role}/{title}/{date}', 'AdminController@accept_request');
Route::get('/decline-request/{name}/{role}/{title}/{date}', 'AdminController@decline_request');
Route::get('/delete/{email}', 'AdminController@deleteuser');
Route::get('/edit/{email}', 'AdminController@EditUserModal');
Route::get('admin/Manage-Academic-Holidays', function () {
    return view('admin.manage-academic-holidays');
});
Route::post('edit/edit/{email}', 'AdminController@edituser');
Route::post('/admin/manage-academic-holidays', 'AdminController@Manage_Academic_Holidays');
Route::get('/admin/update-academic-holidays', 'AdminController@Update_Academic_Holidays');
Route::post('/admin/update-managed-conditions', 'AdminController@Update_Managed_Holidays_Conditions');

Route::get('admin/Manage-Non-Academic-Holidays', function () {
    return view('admin.manage-non-academic-holidays');
});
Route::post('admin/manage-non-academic-holidays', 'AdminController@Manage_Non_Academic_Holidays');
Route::get('/admin/update-non-academic-holidays', 'AdminController@Update_Non_Academic_Holidays');
Route::post('/admin/update-managed-non-academic-conditions', 'AdminController@Update_Managed_Holidays_Conditions_Non_Academic');
Route::get('/accept-edit-request/{name}/{role}/{title}/{previousDate}/{newDate}', 'AdminController@accept_edit_request');
Route::get('/decline-edit-request/{name}/{role}/{title}/{previousDate}/{newDate}', 'AdminController@decline_edit_request');
Route::get('/Contact-Us', 'AdminController@Contact_Us');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
