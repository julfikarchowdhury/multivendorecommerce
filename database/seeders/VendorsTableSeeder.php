<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;
class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id'=>1,'name'=>'jhon','address'=>'cp_12','city'=>'dhaka','state'=>'dhaka','country'=>'bd',
             'pincode'=>'11101','phone'=>'01992289833','email'=>'jhon@admin.com','status'=>0],
        ];
        Vendor::insert($vendorRecords);
    }
}
