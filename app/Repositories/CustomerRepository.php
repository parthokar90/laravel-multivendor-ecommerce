<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerRepository
{
    public function create(array $data): User
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'password'   => Hash::make($data['password']),
            'mobile'     => $data['mobile'],
            'role'       => User::ROLE_CUSTOMER,
            'created_by' => 0,
            'status'     => User::STATUS_ACTIVE,
        ]);
    }
}
