<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetails;

class VendorBankDetailsTableSEEder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id'=>1,'vendor_id'=>1,'account_holder_name'=>'jhon','bank_name'=>'ICICI',
            'bank_ifsc_code'=>'11211','account_number'=>'604852485201854'],
        ];
        VendorsBankDetails::insert($vendorRecords);
    }
}
