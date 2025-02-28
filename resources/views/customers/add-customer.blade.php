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
    <li class="breadcrumb-item active">Add New Customer</li>
</ol>
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
        Add New Customer
        <a href="{{ route('customers.view') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Customers</a>
        </div>
        <div class="card-body">
        <form action="{{ route('customers.store') }}" method="post">
            @csrf
            <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                <label for="firstName">First name</label>
                <input
                    class="form-control"
                    id="firstName"
                    type="text"
                    name="firstname"
                    value="{{ old('firstname') }}"
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
                    value="{{ old('lastname') }}"
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
                    value="{{ old('email') }}"
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
                    value="{{ old('phone') }}"
                    name="phone"
                    aria-describedby="emailHelp"
                    placeholder="Enter phone"
                    required
                />
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="col-md-6">
                <label for="password">Password</label>
                <input id="password" type="password"
                class="form-control" 
                name="password"
                placeholder="Enter password"
                required 
                autocomplete="new-password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="col-md-6">
                <label for="password-confirm">Confirm Password</label>
                <input placeholder="Confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Customer</button>
        </form>
        </div>
    </div>
    </div>
</div>
</div>
<!-- /.container-fluid-->
 @endsection