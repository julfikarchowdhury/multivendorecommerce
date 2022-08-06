<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBussinessDetails;

class VendorBussinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id'=>1,'vendor_id'=>1,'shop_name'=>'daraz','shop_address'=>'hgfgy21','shop_city'=>'dhaka','shop_state'=>'dhaka','shop_country'=>'bd','shop_pincode'=>'11101','shop_mobile'=>'01992289833','shop_website'=>'site.com','shop_email'=>'jhon@admin.com','address_proof'=>'passport','address_proof_image'=>'test.jpg','bussiness_license_number'=>'w321','gst_number'=>'23412'],
        ];
        VendorsBussinessDetails::insert($vendorRecords);
    }
}
