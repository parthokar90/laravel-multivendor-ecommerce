<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\VendorValidate;
use App\Http\Requests\admin\VendorUpdateValidation;
use App\Models\vendor\Vendor;
use App\Services\Admin\VendorService;
use App\Traits\CommonTrait;

class VendorController extends Controller
{
  use CommonTrait;

  protected VendorService $vendorService;

  public function __construct(VendorService $vendorService)
  {
    $this->middleware('auth:admin');
    $this->vendorService = $vendorService;
  }

  public function index(Request $request)
  {
    if ($request->ajax()) {
      return $this->vendorService->getDataTable();
    }

    $insights = $this->vendorService->getVendorInsights();
    return view('admin.vendor.index', compact('insights'));
  }

  public function create()
  {
    $country = $this->activeCountry();
    return view('admin.vendor.create', compact('country'));
  }

  public function store(VendorValidate $request)
  {
    $this->vendorService->storeVendor(
      $request->validated(),
      $request->file('image'),
      $request->file('logo')
    );

    return redirect()->route('vendors.index')
      ->with('success', 'Vendor created successfully.');
  }

  public function edit(Vendor $vendor)
  {
    $country = $this->activeCountry();
    return view('admin.vendor.edit', compact('vendor', 'country'));
  }

  public function update(VendorUpdateValidation $request, Vendor $vendor)
  {
    $this->vendorService->updateVendor(
      $vendor,
      $request->validated(),
      $request->file('image'),
      $request->file('logo')
    );

    return redirect()->route('vendors.index')
      ->with('success', 'Vendor updated successfully.');
  }
}
