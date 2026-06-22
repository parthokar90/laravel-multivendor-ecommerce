<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\CustomerService;
use App\Http\Requests\Admin\CustomerStoreRequest;
use App\Http\Requests\Admin\CustomerUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
{
    protected CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->middleware('auth:admin');
        $this->customerService = $customerService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->customerService->getDataTable();
        }

        $insights = $this->customerService->getCustomerInsights();

        return view('admin.customer.index', compact('insights'));
    }

    public function create(): View
    {
        return view('admin.customer.create');
    }

    public function store(CustomerStoreRequest $request): RedirectResponse
    {
        $this->customerService->storeCustomer(
            $request->validated(), 
            $request->file('image')
        );

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer created and image synced to Supabase.');
    }

    public function edit(int $id): View
    {
        $customer = $this->customerService->getCustomer($id);
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(CustomerUpdateRequest $request, int $id): RedirectResponse
    {
        $this->customerService->updateCustomer(
            $id, 
            $request->validated(), 
            $request->file('image')
        );

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->customerService->deleteCustomer($id);
        
        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer and associated cloud image deleted.');
    }
}