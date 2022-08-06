<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\IndexController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//admindashboard route without admin group
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::match(['get','post'],'/login','AdminController@login');
    Route::group(['middleware'=>['admin']],function(){
        Route::get('dashboard','AdminController@dashboard');
        // Route::get('update-password','AdminController@updatePassword');
        // Route::post('update-admin-password','AdminController@updateAdminPassword');
        Route::match(['get','post'],'update-admin-password','AdminController@updateAdminPassword');
        Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');
        Route::match(['get','post'],'update-vendor-details/{slug}','AdminController@updateVendorDetails');
        Route::get('admins/{title?}','AdminController@admin');
        Route::get('view-vendor-details/{id}','AdminController@viewVendorDetails');

        Route::get('logout','AdminController@logout');

        //sections
        Route::get('sections','SectionController@sections');
        Route::get('delete-section/{id}','SectionController@deleteSection');
        Route::match(['get','post'],'add-edit-section/{id?}','SectionController@addEditSection');
        //brands
        Route::get('brands','BrandController@brands');
        Route::get('delete-brand/{id}','BrandController@deleteBrand');
        Route::match(['get','post'],'add-edit-brand/{id?}','BrandController@addEditBrand');
        //catagories
        Route::get('catagories','CatagoryController@catagories');
        //Route::post('update-catagory-status','CatagoryController@CatagoryStatus');
        Route::match(['get','post'],'add-edit-catagory/{id?}','CatagoryController@addEditCatagory');
        Route::get('append-catagories-level','CatagoryController@appendCatagoryLevel');
        Route::get('delete-catagory/{id}','CatagoryController@deleteCatagory');
        //products
        Route::get('products','ProductsController@products');
        Route::get('delete-product/{id}','ProductsController@deleteProduct');
        Route::post('update-product-status','ProductsController@updateProductStatus');
        Route::match(['get','post'],'add-edit-product/{id?}','ProductsController@addEditProduct');
        //attributes
        Route::match(['get','post'],'add-edit-attributes/{id}','ProductsController@addAttributes');
        Route::match(['get','post'],'update-attributes/{id}','ProductsController@updateAttributes');

    });
}); 


//userdashboard
Route::namespace('App\Http\Controllers\Front')->group(function () {
    Route::get('/','IndexController@Index');
});