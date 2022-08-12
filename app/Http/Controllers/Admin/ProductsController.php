<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Section;
use App\Models\Brand;
use App\Models\Catagory;
use App\Models\Image;

use App\Models\ProductsAttribute;

use Auth;
class ProductsController extends Controller
{
    public function products(){
        $products = Product::with(['section'=>function($query){
            $query->select('id','name');
        },'catagory'=>function($query){
            $query->select('id','catagory_name');
        }] )->get()->toarray();
        return view('admin.products.products')->with(compact('products'));
    }
    public function addEditProduct(Request $request,$id=null){
        if($id==""){
            $title = "Add Product";
            $product = new Product;
            $message = "Product added successfully!";
        }else{
            $title = "Edit Product";
            $product = Product::find($id);
            $message = "Product updeted successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            $catagoryDetails = Catagory::find($data['catagory_id']);
            $product->section_id = $catagoryDetails['section_id'];
            $product->catagory_id = $data['catagory_id'];
            $product->brand_id = $data['brand_id'];

            $adminType = Auth::guard('admin')->user()->type;
            $vendor_id = Auth::guard('admin')->user()->vendor_id;
            $admin_id = Auth::guard('admin')->user()->id;

            $product->admin_type = $adminType;
            $product->admin_id = $admin_id;
            if($adminType=="vendor"){
                $product->vendor_id = $vendor_id;
            }else{
                $product->vendor_id = 0;
            }
            if ($request->hasFile('product_image')){
                $image = $request->product_image;
                $name = $image->getClientOriginalName();
                // dd($name);

                $image->storeAs('public/admin/images/product-images',$name);
                // $banner = new BannerImage;
                $product->product_image = $name;
            }
            $product->product_name = $data['product_name'];
            $product->product_color = $data['product_color'];
            $product->product_code = $data['product_code'];

            $product->product_price = $data['product_price'];
            $product->product_discount = $data['product_discount'];
            $product->product_weight = $data['product_weight'];
            $product->description = $data['description'];
            $product->meta_title = $data['meta_title'];
            $product->meta_description = $data['meta_description'];
            $product->meta_keywords = $data['meta_keywords'];
            if(!empty($data['is_featured'])){
                $product->is_featured = $data['is_featured'];
            }else{
                $product->is_featured = "No";
            }
            if(!empty($data['is_bestseller'])){
                $product->is_bestseller = $data['is_bestseller'];
            }else{
                $product->is_bestseller = "No";
            }
            $product->status = $data['status'];
            $product->save();

            return redirect('admin/products')->with('success_message',$message);
        }
        

    
        $catagories = Section::with('catagories')->get()->toArray();
        $brands = Brand::where('status',1)->get()->toArray();

        return view('admin.products.add_edit_product')->with(compact('title','catagories','brands','product'));

    }
    
    
    public function deleteProduct($id){
            Product::where('id',$id)->delete();
            $message = "Product has been deleted successfully!";
            return redirect()->back()->with('success_message',$message);
    
    }
    public function deleteProductImage($id){
        Product::where('id',$id)->update(['product_image' => null]);
        
        $message = "Catagory Image deleted successfully";

        return redirect()->back()->with('success_message',$message);

    }
    public function addAttributes(Request $request,$id){
        $product=Product::select('id','product_name','product_code','product_color','product_price','product_image')->with('attributes')->find($id);

        if($request->isMethod('post')){
            $data = $request->all();

            foreach ($data['sku'] as $key => $value) {
                if(!empty($value)){

                    $skuCount = ProductsAttribute::where('sku',$value)->count();
                    if ($skuCount>0){
                        return redirect()->back()->with('error_message','ERROR! Size already exist! Please put another size');
                    }
                    $attribute = new ProductsAttribute;
                    $attribute->product_id = $id;
                    $attribute->sku = $value;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->status = 1;
                    $attribute->save();
                }
            }
            
            return redirect()->back()->with('success_message','Product Attributes has been added successfully!');
        }

        return view('admin.attributes.add_edit_attributes')->with(compact('product'));
    }
    public function updateAttributes(Request $request,$id){
        // $productsattribute = ProductsAttribute::where('id',$id)->get()->toArray();
        $productsatt=ProductsAttribute::select('id','size','sku','price','stock','status')->find($id);

        //dd($productsattribute);
        if($request->isMethod('post')){

            ProductsAttribute::whereId($id)->update([
                'price' => $request->price,'stock' => $request->stock,'status' => $request->status,]);
            return back()->with('success_message', 'Attributes Changed Successfully');
        }
        return view('admin.attributes.update_attribute')->with(compact('productsatt'));
   }
}
