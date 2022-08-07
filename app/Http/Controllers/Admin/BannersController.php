<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerImage;
use App\Models\Image;
class BannersController extends Controller
{
    public function banners(){
        $banners = BannerImage::get()->toArray();
        return view('admin.banner.banners')->with(compact('banners'));
    }
    public function deleteBanners($id){
        $bannerImage = BannerImage::where('id',$id)->first();

        $banner_image_path = 'public/front/images/banner-images/';

        if(file_exists($banner_image_path.$bannerImage->image)){
            unlink($banner_image_path.$bannerImage->image);
        }

        BannerImage::where('id',$id)->delete();

        $message = "Banner deleted successfully";
        return redirect('admin/banners')->with('success_message',$message);
    }
    public function addEditBanner(Request $request,$id=null){
        if($id==""){
            $title = "Add Banner";
            $banner = new BannerImage;
            $message = "Banner added successfully!";
        }else{
            $title = "Edit Banner";
            $banner = BannerImage::find($id);
            $message = "Banner updeted successfully!";
        }
        if($request->isMethod('post')){
            $image = $request->image;

            $name = $image->getClientOriginalName();
            $image->storeAs('public/front/images/banner-images',$name);
            $banner = new BannerImage;
            $banner->image = $name;
            $data = $request->all();
            $banner->link = $data['link'];;
            $banner->title = $data['title'];;
            $banner->alt = $data['alt'];;
            $banner->status = $data['status'];;

            $banner->save();


            return redirect('admin/banners')->with('success_message',$message);
        }
        return view('admin.banner.add_edit_banner')->with(compact('title','banner'));

    }
}
