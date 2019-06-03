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

Route::get('/', 'PagesController@index');


Auth::routes();

Route::get('/myshop', 'DashboardController@myShop');

Route::post('/myshop/debt/search', 'DashboardController@searchDebt');

Route::post('/password/reset/verify', 'ResetPasswordController@verify')->name('reset.verify');

Route::post('/password/reset/change', 'ResetPasswordController@reset')->name('reset.change');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/data', 'DashboardController@search')->name('dashboard.getdata');
Route::get('/myshop/data', 'DashboardController@searchMyShop')->name('myshop.getdata');
Route::get('/farmer/search', 'FarmersController@search')->name('farmers.getdata');

// License Section
Route::get('/license', 'DashboardController@license');

// Update License
Route::put('/license/seed', 'DashboardController@updateSeedExp');
Route::put('/license/fert', 'DashboardController@updateFertExp');
Route::put('/license/pest', 'DashboardController@updatePestExp');
Route::put('/license/shop', 'DashboardController@updateShopExp');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::put('/admin/user/{id}/approve', 'AdminController@approveUser');

Route::put('/admin/user/{id}/disapprove', 'AdminController@disapproveUser');

Route::post('/admin/user/search', 'AdminController@searchUser');

Route::get('/admin/user/search', function () {
    return redirect('admin');
});

Route::get('/farmer/create', 'FarmersController@create');

Route::get('/debit/issue', 'DebitsController@issue');

Route::post('/farmer', 'FarmersController@store');

Route::resource('/debit', 'DebitsController', [ 'except' => [
    'create'
]]);

Route::get('/debit/create/{farmerId}', 'DebitsController@create');

Route::get('/transaction/show/{id}/{amountPaid}', 'DebitsController@showTransaction');

Route::post("/debit/search", "SearchDebitsController@search");
