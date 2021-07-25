<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\Models\vendor\Vendor;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Vendor;
        $user->first_name   =    'Vendor';
        $user->last_name    =    'User';
        $user->email        =    'vendor@email.com';
        $user->password     =     Hash::make('12345678');
        $user->mobile       =     12345678;
        $user->image        =     '1.jpg';
        $user->address      =     'dhaka';
        $user->country_id   =     1;
        $user->role         =     2;
        $user->city         =     'Dhaka';
        $user->zip_code     =     1205;
        $user->gender       =     1;
        $user->created_by   =     1;
        $user->status       =     1;
        $user->save();
    }
}
