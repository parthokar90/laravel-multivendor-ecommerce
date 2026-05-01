@extends('admin.layout.master')

@section('title') Customers @endsection

@section('content')

<div class="container-fluid">

    <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">
        Add Customer
    </a>

    <table class="table table-bordered">

        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach($customers as $key => $customer)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->mobile }}</td>
            <td>
                @if($customer->status == 1)
                <span class="badge badge-success">Active</span>
                @else
                <span class="badge badge-danger">Inactive</span>
                @endif
            </td>
            <td>
                <a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-sm btn-info">Edit</a>

                <form action="{{ route('customers.destroy',$customer->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</div>

@endsection