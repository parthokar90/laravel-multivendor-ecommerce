<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('admin.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6',
            'mobile' => 'required',
        ]);

        $customer = new Customer();

        $customer->first_name = $request->first_name;
        $customer->last_name  = $request->last_name;
        $customer->email      = $request->email;
        $customer->password   = Hash::make($request->password);
        $customer->mobile     = $request->mobile;
        $customer->address    = $request->address;
        $customer->status     = $request->status;

        // image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/customer'), $name);
            $customer->image = $name;
        }

        $customer->save();

        return redirect()->route('customers.index');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->first_name = $request->first_name;
        $customer->last_name  = $request->last_name;
        $customer->email      = $request->email;
        $customer->mobile     = $request->mobile;
        $customer->address    = $request->address;
        $customer->status     = $request->status;

        if ($request->password) {
            $customer->password = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            if ($customer->image && file_exists(public_path('uploads/customer/' . $customer->image))) {
                unlink(public_path('uploads/customer/' . $customer->image));
            }

            $file = $request->file('image');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/customer'), $name);
            $customer->image = $name;
        }

        $customer->save();

        return redirect()->route('customers.index');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        if ($customer->image && file_exists(public_path('uploads/customer/' . $customer->image))) {
            unlink(public_path('uploads/customer/' . $customer->image));
        }

        $customer->delete();

        return redirect()->route('customers.index');
    }
}
