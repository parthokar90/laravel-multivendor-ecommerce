<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vendor\Vendor; 
use App\Models\vendor\Shop;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function vendorRegister()
    {
        return view('vendor.auth.register'); 
    }

    public function vendorRegisterProcess(Request $request)
    {
        // 1. Precise validation
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|string|email|max:255|unique:vendors,email', 
            'mobile'     => 'required|string|max:100',
            'shop_name'  => 'required|string|max:150', // Matches shop migration limit
            'password'   => 'required|string|min:8|confirmed',
            'terms'      => 'required|accepted',
        ]);

        try {
            // 2. Start Transaction
            $vendor = DB::transaction(function () use ($request) {
                
                // 3. Create Vendor Profile (Fixing required integer fields)
                $vendor = Vendor::create([
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                    'email'      => $request->email,
                    'mobile'     => $request->mobile,
                    'password'   => Hash::make($request->password),
                    'created_by' => 1, // Set valid integer instead of fallback
                    'status'     => 1, 
                ]);

                $logos = ['logo1.jpg', 'logo2.jpg', 'logo3.jpg'];
                $banners = ['banner1.jpg', 'banner2.jpg', 'banner3.jpg'];

                // 4. Create Shop Profile
                Shop::create([
                    'shop_name'    => $request->shop_name,
                    'shop_slug'    => Str::slug($request->shop_name),
                    'logo'         => $logos[array_rand($logos)],
                    'shop_banner'  => $banners[array_rand($banners)],
                    'shop_address' => 'Dhaka, Bangladesh',
                    'vendor_id'    => $vendor->id, 
                    'created_by'   => $vendor->id, 
                    'status'       => 1, 
                ]);

                return $vendor;
            });

            // 5. Authenticate via guard
            Auth::guard('vendor')->login($vendor);

            return redirect()->intended('/vendor/dashboard');

        } catch (\Exception $e) {
            // Returns exact database error or code failure during development
            return redirect()->back()
                ->withInput()
                ->with('message', 'Registration failed: ');
        }
    }
}