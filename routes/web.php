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

/*::get('/', function () {
    return view('welcome');
});*/



Route::post("/login" , 'Auth\LoginController@verifyLogin');
Route::get("/logout" , 'Auth\LoginController@logout');

Route::get("/login" , function(){
    return view("users.login");
})->name('login');

Route::get('/', "C_Dashboard@index");




Route::get('/dashboards', "C_Dashboard@index")->name("home");
Route::get('/change_password', "C_Dashboard@index");

Route::get("/home" , "C_Dashboard@index");


Route::prefix('user')->group(function () {
    Route::get('manage', "C_User@view");
    Route::get('info/{id}', "C_User@info");
    Route::get('search', "C_User@search");
    Route::get('change_password/{id?}', "C_User@change_view");
    Route::post('change_password', "C_User@change_password");
    Route::post('add', "C_User@add");
    Route::get('upload', "C_User@upload");
    Route::post('upload', "C_User@upload_img");
    Route::get('edit/{id}', "C_User@edit");
    Route::post('edit/{id}', "C_User@edituser");
    Route::get('delete/{id}', "C_User@delete");
    Route::post('delete', "C_User@delete_confirmation");
    Route::get('login', "C_User@login");
    Route::post('login', "C_User@verifyLogin");
    Route::get('logout', "C_User@logout");
    Route::get('/', "C_User@view");


});

Route::prefix('project')->group(function () {


    Route::get('manage','C_Project@manage');
    Route::get('delete/{id}','C_Project@delete');
    Route::post('delete','C_Project@deletepro');
    Route::get('edit/{id}','C_Project@edit');
    Route::post('edit/{id}','C_Project@editpro');
    Route::post('add','C_Project@Add');
    Route::get('search','C_Project@search');
    Route::get('info/{id}','C_Project@info');
    Route::get('/',"C_Project@manage");


});

Route::prefix('task')->group(function () {

    Route::get('manage/{project_id}','C_Tasks@manage');
    Route::get('delete/{id}','C_Tasks@delete');
    Route::post('delete','C_Tasks@deletetask');
    Route::get('edit/{id}','C_Tasks@edit');
    Route::post('edit/{id}','C_Tasks@editTask');
    Route::post('add','C_Tasks@Add');
    Route::get('search','C_Tasks@search');
    Route::get('info/{id}','C_Tasks@info');
    Route::get('/', "C_Tasks@manage");

});

Route::prefix('ticket')->group(function () {

    Route::get('manage','C_Tickets@manage');
    Route::get('delete/{id}','C_Tickets@delete');
    Route::post('delete','C_Tickets@deleteticket');
    Route::get('edit/{id}','C_Tickets@edit');
    Route::post('edit/{id}','C_Tickets@editti');
    Route::post('add','C_Tickets@Add');
    Route::get('search','C_Tickets@search');
    Route::get('info/{id}','C_Tickets@info');
    Route::get('/', "C_Tickets@manage");

});

Route::prefix('discussion')->group(function () {

    Route::get('manage','C_Discussion@manage');
    Route::post('add','C_Discussion@Add');
    Route::get('search','C_Discussion@search');
    Route::get('delete/{id}','C_Discussion@delete');
    Route::post('delete','C_Discussion@deletedis');
    Route::get('edit/{id}','C_Discussion@edit');
    Route::post('edit/{id}','C_Discussion@editdi');
    Route::get('info/{id}','C_Discussion@info');
    Route::get('/', "C_Discussion@manage");

});

Route::prefix('comments')->group(function () {

    Route::get('manage','C_Comments@manage');
    Route::post('add','C_Comments@Add');
    Route::get('search','C_Comments@search');
    Route::get('delete/{id}','C_Comments@delete');
    Route::post('delete','C_Comments@delete_comment');
    Route::get('edit/{id}','C_Comments@edit');
    Route::post('edit/{id}','C_Comments@edit_comm');
    Route::get('reply/{c_id}','C_Comments@reply');
    Route::post('reply/add','C_Comments@reply_comm');
    Route::get('reply/delete/{cr_id}','C_Comments@reply_delete');
    Route::post('reply/delete','C_Comments@reply_delete_confirmation');
    Route::get('/', "C_Comments@manage");

});

Route::prefix('attachment')->group(function () {

    Route::get('manage','C_Attachment@manage');
    Route::post('add','C_Attachment@Add');
    Route::get('download/{id}','C_Attachment@download');
    Route::get('delete/{id}','C_Attachment@delete');
    Route::post('delete','C_Attachment@delete_attach');
    Route::get('/', "C_Attachment@manage");

});


Route::post('/report', "C_Report@search");
Route::get('/report', "C_Report@manage");


Route::prefix('configuration')->group(function () {

    Route::get('manage','C_Configoration@manage');
    Route::get('/', 'C_Configoration@manage');
    Route::post('/', 'C_Configoration@save_edit');

});

Route::prefix('userAccess')->group(function () {

    Route::get('manage','C_UserAccess@manage');
    Route::get('edit/{group_id}','C_UserAccess@edit_view');
    Route::post('edit','C_UserAccess@edit');
    Route::get('/', "C_UserAccess@manage");

});

Route::prefix('user_alert')->group(function () {

    Route::get('all','C_UserAlert@all');
    Route::get('info/{id}','C_UserAlert@info');
    Route::get('manage','C_UserAlert@manage');
    Route::post('add','C_UserAlert@Add');
    Route::get('delete/{id}','C_UserAlert@delete');
    Route::post('delete','C_UserAlert@deletetool');
    Route::get('edit/{id}','C_UserAlert@edit_tool');
    Route::post('edit/{id}','C_UserAlert@edit');
    Route::get('/',"C_UserAlert@manage");

});

Route::prefix('attendance')->group(function () {

    Route::get('manage','C_Attendance@manage');
    Route::get('search','C_Attendance@search');
    Route::post('Add','C_Attendance@Add');
    Route::delete('delete','C_Attendance@delete');
    Route::get('edit','C_Attendance@edit');
    Route::put('edita','C_Attendance@edita');
    Route::get('attend_in','C_Attendance@attend_in');
    Route::get('attend_out','C_Attendance@attend_out');
    Route::get('/','C_Attendance@manage' );

});

Route::prefix('codes')->group(function () {

    Route::get('manage','C_codes_management@manage');
    Route::post('add','C_codes_management@Add');
    Route::get('search','C_codes_management@search');
    Route::delete('delete','C_codes_management@delete');
    Route::get('edit','C_codes_management@edit');
    Route::put('editcode',"C_codes_management@editcode");
    Route::get('/',"C_codes_management@manage");
});
/*

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
