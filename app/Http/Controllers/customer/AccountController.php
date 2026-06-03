<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\VendorValidate;
use App\Http\Requests\customer\CustomerValidate;
use App\Services\CustomerService;
use App\Services\VendorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Throwable;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{
  public function __construct(
    private readonly CustomerService $customerService,
    private readonly VendorService $vendorService,
  ) {}

  /**
   * Show the customer registration form.
   */
  public function customerRegister(): View
  {
    return view('auth.register');
  }

  /**
   * Handle customer registration form submission.
   */
  public function customerRegisterProcess(CustomerValidate $request): RedirectResponse
  {
    try {
      $this->customerService->register($request->validated());

      return redirect()->intended('/customer/dashboard');
    } catch (Throwable $e) {
      Log::error('Customer registration failed', [
        'email' => $request->email,
        'error' => $e->getMessage(),
      ]);

      return redirect()->back()
        ->withInput($request->except('password'))
        ->with('error', 'Registration failed. Please try again.');
    }
  }

  /**
   * Show the vendor registration form.
   */
  public function vendorRegister(): View
  {
    return view('vendor.auth.register');
  }

  /**
   * Handle vendor registration form submission.
   */
  public function vendorRegisterProcess(VendorValidate $request): RedirectResponse
  {
    try {
      $this->vendorService->register($request->validated());

      return redirect()->route('vendor.registration')
        ->with('success', 'Registration completed successfully. Please wait for admin approval.');
    } catch (Throwable $e) {
      Log::error('Vendor registration failed', [
        'email' => $request->email,
        'error' => $e->getMessage(),
      ]);

      return redirect()->back()
        ->withInput($request->except('password'))
        ->with('error', 'Registration failed. Please try again.');
    }
  }
}
