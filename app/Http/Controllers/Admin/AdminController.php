<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\Country;

use App\Models\VendorsBussinessDetail;
use App\Models\VendorsBankDetail;


use Hash;
use Illuminate\Http\Request;
Use Auth;
use Image;
use Session;

class AdminController extends Controller
{
    public function dashboard(){
        Session::put('page','dashboard');
        return view('admin.dashboard');
    }
    // public function updatePassword(){
    //     $adminDetails=Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
    //     return view('admin.settings.update_admin_password',compact('adminDetails'));
    //}
    public function login(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $custommessage = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid email is required',
                'password.required' => 'Password is required',
            ];

            $this->validate($request,$rules,$custommessage);
            
            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with('error_massage','Invalid Email or Password');
            }
        }
        return view('admin.login');
    }
    public function updateAdminDetails(Request $request){
        Session::put('page','update_admin_details');
        if($request->isMethod('post')){

            $request->validate([
                'new_name'=>'required',
                'new_phone'=>'required|numeric',
            ]); 
            // if ($request->hasFile('new_image')){
            //     $image_tmp = $request->file('new_image');
            //     if($image_tmp->isValid()){
            //         $extension = $image_tmp->getClientOriginalExtension();

            //         $imageName = rand(111,99999).'.'.$extension;
            //         $imagePath = 'admin/images/photos/'.$imageName;
            //         Image::make($image_tmp)->save($imagePath);
            //     }
            // }           

            //update new details
            Admin::whereId(Auth::guard('admin')->user()->id)->update([
                'name' => $request->new_name,'phone'=>$request->new_phone
            ]);
            return back()->with('status', 'Details Updated Successfully');
        }
        //$adminDetails=Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_details');

    }
    public function updateAdminPassword(Request $request){
        Session::put('page','update_admin_password');
        if($request->isMethod('post')){

            $request->validate([
                'current_password'=>'required',
                'new_password'=>'required|confirmed',
            ]);
            
            //match old pass
            if(!Hash::check($request->current_password, Auth::guard('admin')->user()->password)){
                return back()->with('error', 'old password dosent match');
            }

            //update new pass
            Admin::whereId(Auth::guard('admin')->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            return back()->with('status', 'pass changed successfully');
        }
        $adminDetails=Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password',compact('adminDetails'));

    }
    public function updateVendorDetails($slug, Request $request){
        if($slug=="personal"){
            if($request->isMethod('post')){

                  
    
                Admin::where('id',Auth::guard('admin')->user()->id)->update([
                    'name' => $request->vendor_name,'phone' => $request->vendor_phone,]);
                Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->update([
                    'name' => $request->vendor_name,'address' => $request->vendor_address,'city' => $request->vendor_city,
                    'state' => $request->vendor_state,'country' => $request->vendor_country,'pincode' => $request->vendor_pincode,
                    'phone' => $request->vendor_phone,]);
                return back()->with('status', 'Vendor Details Updated Successfully');
            }
            $vendorDetails=Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        }else if($slug=="bussiness"){
            if($request->isMethod('post')){

                  
    
                
                VendorsBussinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update([
                    'shop_name' => $request->shop_name,'shop_address' => $request->shop_address,'shop_city' => $request->shop_city,
                    'shop_state' => $request->shop_state,'shop_country' => $request->shop_country,'shop_pincode' => $request->shop_pincode,
                    'shop_mobile' => $request->shop_mobile,'address_proof' => $request->address_proof,'address_proof_image' => $request->address_proof_image,
                    'bussiness_license_number' => $request->bussiness_license_number,'gst_number' => $request->gst_number,]);
                return back()->with('status', 'Vendor Details Updated Successfully');
            }
            $vendorDetails=VendorsBussinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        }else if($slug=="bank"){
            if($request->isMethod('post')){

                $request->validate([
                    'bank_name'=>'required',
                    'bank_ifsc_code'=>'required',
                    'account_number'=>'required|numeric',
                    


                ]); 
                // if ($request->hasFile('new_image')){
                //     $image_tmp = $request->file('new_image');
                //     if($image_tmp->isValid()){
                //         $extension = $image_tmp->getClientOriginalExtension();
    
                //         $imageName = rand(111,99999).'.'.$extension;
                //         $imagePath = 'admin/images/photos/'.$imageName;
                //         Image::make($image_tmp)->save($imagePath);
                //     }
                // }           
    
                
                VendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update([
                    'bank_name' => $request->bank_name,'bank_ifsc_code' => $request->bank_ifsc_code,'account_number' => $request->account_number]);
                return back()->with('status', 'Vendor Details Updated Successfully');
            }
            $vendorDetails=VendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();

        }
        $countries=Country::where('status',1)->get();
        return view('admin.settings.update_vendor_details',compact('slug','vendorDetails','countries'));

    }

    
    public function logout(){
        Auth::guard('admin')->logout();
            return redirect('admin/login');
        
    }
    public function admin($type=null){
        $admins=Admin::query();
        if(!empty($type)){
            $admins =$admins->where('type',$type);
            $title=ucfirst($type)."s";
        }else{
            $title="All SuperAdmins/Sub Admins/Vendors";
        }
        $admins=$admins->get()->toArray();
        return view('admin.admins.admins')->with(compact('admins','title'));

    }
    public function viewVendorDetails($id){
            // $vendorDetails=Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            // $vendorBussinessDetails=VendorsBussinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            
            $personals=Admin::query();
            $personals =$personals->where('vendor_id',$id);
            $personals=$personals->get()->toArray();
            //vndor bussiness detail
            $bussiness=VendorsBussinessDetail::query();
            $bussiness =$bussiness->where('vendor_id',$id);
            $bussiness=$bussiness->get()->toArray();
            //vendor bank details
            $bank=VendorsBankDetail::query();
            $bank =$bank->where('vendor_id',$id);
            $bank=$bank->get()->toArray();
            // return view('admin.admins.show_vendor_details',compact('id','vendorDetails'));

            // $vendorBankDetails=VendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            return view('admin.admins.show_vendor_details')->with(compact('id','personals','bussiness','bank'));

    }

}
