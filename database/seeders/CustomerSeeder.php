<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\customer\Customer;
use App\Models\User;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        // ================= DEMO CUSTOMER =================
        User::create([
            'first_name' => 'Demo',
            'last_name'  => 'Customer',
            'email'      => 'customer@email.com',
            'password'   => Hash::make('12345678'),
            'mobile'     => '01000000000',
            'status'     => 1,
        ]);

        // ================= FAKE CUSTOMERS =================
        $firstNames = ['John','David','Alex','Michael','Sarah','Emma','Robert','James','William','Sophia'];
        $lastNames  = ['Smith','Johnson','Brown','Taylor','Anderson','Thomas','Jackson','White','Harris','Martin'];

        for ($i = 1; $i <= 3; $i++) {

            $first = $firstNames[array_rand($firstNames)];
            $last  = $lastNames[array_rand($lastNames)];

            Customer::create([
                'first_name' => $first,
                'last_name'  => $last,
                'email'      => strtolower($first.$last.$i.'@customer.com'),
                'password'   => Hash::make('12345678'),
                'mobile'     => '01' . rand(300000000, 999999999),
                'address'    => 'Dhaka, Bangladesh',
                'image'      => null,
                'status'     => rand(0,1),
            ]);
        }
    }
}