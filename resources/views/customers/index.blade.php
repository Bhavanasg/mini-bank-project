@extends('layout')
@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a href="{{ route('index') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Customers</li>
</ol>
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
        Listing Customers
        <a href="{{ route('customers.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Customer</a>
        </div>
        <div class="card-body">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Customer Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Amount</th>
                    <th>Created On</th>
                    <th>Action</th>
                </tr>
            </thead>            
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{ '#'.$customer->customer_id }}</td>
                    <td>{{ $customer->first_name . ' ' . $customer->last_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>-</td>
                    <td>{{ $customer->created_at->format('d-M, Y') }}</td>
                    <td><a href="{{ route('customers.edit',$customer->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('customers.delete',$customer->id)}}" class="btn btn-sm btn-danger">Delete</a>
                        <a href="{{ route('transactions.view',$customer->id)}}" class="btn btn-sm btn-success">Transactions {{ '(' . $customer->transactions_count . ')' }}</a></td>
                </tr>
                @endforeach                
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
</div>
<!-- /.container-fluid-->
 @endsection
