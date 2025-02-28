@extends('layout')
@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a href="{{ route('index') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
    <a href="{{ route('customers.view') }}">Customers</a>
    </li>
    <li class="breadcrumb-item active">Update Customer</li>
</ol>
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
        Update Customer
        <a href="{{ route('customers.view') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Customers</a>
        </div>
        <div class="card-body">
        <form action="{{ route('customers.update') }}" method="post">
            @csrf
            <input type="hidden" value="{{ $customer->id }}" name="id">
            <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                <label for="firstName">First name</label>
                <input
                    class="form-control"
                    id="firstName"
                    type="text"
                    name="firstname"
                    value="{{ $customer->first_name }}"
                    aria-describedby="nameHelp"
                    placeholder="Enter first name"
                    required
                />
                @error('firstname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="col-md-6">
                <label for="lastName">Last name</label>
                <input
                    class="form-control"
                    id="lastName"
                    type="text"
                    name="lastname"
                    value="{{ $customer->last_name }}"
                    aria-describedby="nameHelp"
                    placeholder="Enter last name"
                    required
                />
                @error('lastname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            </div>
            <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                <label for="email">Email address</label>
                <input
                    class="form-control"
                    id="email"
                    type="email"
                    value="{{ $customer->email }}"
                    name="email"
                    aria-describedby="emailHelp"
                    placeholder="Enter email"
                    required
                />
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="col-md-6">
                <label for="phone">Phone number</label>
                <input
                    class="form-control"
                    id="phone"
                    type="tel"
                    value="{{ $customer->phone }}"
                    name="phone"
                    aria-describedby="emailHelp"
                    placeholder="Enter phone"
                    required
                />
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Customer</button>
        </form>
        </div>
    </div>
    </div>
</div>
</div>
<!-- /.container-fluid-->
 @endsection