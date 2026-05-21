<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Auth;

class CustomerService
{
    public function __construct(
        private readonly CustomerRepository $customerRepository
    ) {}

    public function register(array $data): User
    {
        $customer = $this->customerRepository->create($data);

        Auth::login($customer);

        return $customer;
    }
}
