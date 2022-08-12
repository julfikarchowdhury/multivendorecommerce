<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\IndexController;
use App\Models\catagory;
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
        Route::get('delete-catagory-image/{id}','CatagoryController@deleteCatagoryImage');

        //products 
        Route::get('products','ProductsController@products');
        Route::get('delete-product/{id}','ProductsController@deleteProduct');
        Route::get('delete-product-image/{id}','ProductsController@deleteProductImage');
        Route::post('update-product-status','ProductsController@updateProductStatus');
        Route::match(['get','post'],'add-edit-product/{id?}','ProductsController@addEditProduct');
        //attributes
        Route::match(['get','post'],'add-edit-attributes/{id}','ProductsController@addAttributes');
        Route::match(['get','post'],'update-attributes/{id}','ProductsController@updateAttributes');
        //filter
        Route::get('filters','FilterController@filters');
        Route::get('filter-value','FilterController@filterValue');
        Route::match(['get','post'],'add-edit-filter/{id?}','FilterController@addEditFilter');
        Route::match(['get','post'],'add-edit-filter-value/{id?}','FilterController@addEditFilterValue');

        //banners
        Route::get('banners','BannersController@banners');
        Route::get('delete-banner/{id}','BannersController@deleteBanners');
        Route::get('delete-banner-image/{id}','BannersController@deleteBannersImage');

        Route::match(['get','post'],'add-edit-banner/{id?}','BannersController@addEditBanner');



    });
}); 


//userdashboard
Route::namespace('App\Http\Controllers\Front')->group(function () {
    Route::get('/','IndexController@Index');
    
    //listing catagories route
    $catUrls = Catagory::select('url')->where('status',1)->get()->pluck('url')->toArray();

    foreach ($catUrls as $key =>$url) {
        Route::match(['get','post'],'/'.$url,'ProductsController@listing');
    }
    
});