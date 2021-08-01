<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\VendorValidate;
use App\Http\Requests\customer\CustomerValidate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\vendor\Vendor;
use App\Models\vendor\Shop;
use App\Models\User;
use Auth;


class AccountController extends Controller
{

    //customer registration
    public function customerRegister(){
      return view('auth.register');
    }

    //customer registration process
    public function customerRegisterProcess(CustomerValidate $request){

            //customer information 
            $customer = new User;

            $customer->first_name=$request->first_name;

            $customer->last_name=$request->last_name;

            $customer->email=$request->email;
      
            $customer->password= Hash::make($request->password);

            $customer->mobile=$request->mobile;

            $customer->role=3;

            $customer->created_by=0;

            $customer->status=1;
        
            $customer->save();
            
            Auth::login($customer);

            return redirect()->intended('/customer/dashboard');
    }

    //vendor registration
    public function vendorRegister(){
      return view('vendor.auth.register');
    }

    //vendor registration process
    public function vendorRegisterProcess(VendorValidate $request){
      
            // vendor profile information
            $store = new Vendor;  

            $store->first_name=$request->first_name;

            $store->last_name=$request->last_name;

            $store->email=$request->email;
      
            $store->password= Hash::make($request->password);

            $store->mobile=$request->mobile;

            $store->role=2;

            $store->created_by=0;

            $store->status=0;
        
            $store->save();

            //vendor shop information 
            $shop = new Shop;

            $shop->shop_name=$request->shop_name;

            $shop->shop_slug=Str::slug($request->shop_name);

            $shop->vendor_id=$store->id;

            $shop->created_by=0;

            $shop->status=0;

            $shop->save();

            return redirect()->route('vendor.registration')
            ->with('success','Registration has completed successfully.Please wait for admin approval');
    }

}
