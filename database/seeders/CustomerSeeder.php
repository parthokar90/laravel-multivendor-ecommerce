<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\customer\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $firstNames = ['John','David','Alex','Michael','Sarah','Emma','Robert','James','William','Sophia'];
        $lastNames  = ['Smith','Johnson','Brown','Taylor','Anderson','Thomas','Jackson','White','Harris','Martin'];

        for ($i = 1; $i <= 50; $i++) {

            $first = $firstNames[array_rand($firstNames)];
            $last  = $lastNames[array_rand($lastNames)];

            $email = strtolower($first.$last.$i.'@customer.com');

            Customer::create([
                'first_name' => $first,
                'last_name'  => $last,
                'email'      => $email,
                'password'   => Hash::make('12345678'),
                'mobile'     => '01'.rand(300000000, 999999999),
                'address'    => 'Dhaka, Bangladesh',
                'image'      => null,
                'status'     => rand(0,1),
            ]);
        }
    }
}