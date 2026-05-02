<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\vendor\Vendor;

class VendorSeeder extends Seeder
{
    public function run(): void
    {
        $firstNames = ['John', 'David', 'Alex', 'Michael', 'Sarah', 'Emma', 'Robert', 'James', 'William', 'Sophia'];
        $lastNames  = ['Smith', 'Johnson', 'Brown', 'Taylor', 'Anderson', 'Thomas', 'Jackson', 'White', 'Harris', 'Martin'];

        for ($i = 1; $i <= 50; $i++) {

            $first = $firstNames[array_rand($firstNames)];
            $last  = $lastNames[array_rand($lastNames)];

            $email = strtolower($first . $last . $i . '@vendor.com');

            Vendor::create([
                'first_name' => $first,
                'last_name'  => $last,
                'email'      => $email,
                'password'   => Hash::make('12345678'),
                'mobile'     => '01' . rand(300000000, 999999999),
                'image' => 'https://i.pravatar.cc/150?img=' . rand(1, 70),
                'address'    => 'Dhaka, Bangladesh',
                'country_id' => 1,
                'role'       => 2,
                'city'       => 'Dhaka',
                'zip_code'   => '1200',
                'gender'     => rand(0, 1),
                'created_by' => 1,
                'status'     => 1,
            ]);
        }
    }
}
