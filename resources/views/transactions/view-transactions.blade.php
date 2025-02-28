@extends('layout')
@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a href="{{route('index')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
    <a href="{{ route('customers.view') }}">Customers</a>
    </li>
    <li class="breadcrumb-item active">Transactions</li>
</ol>
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
        <div>
            <h5>Listing Transactions of <b>{{$customer->first_name . ' ' . $customer->last_name}}</b></h5>
            <p>Balance : $ {{ $available_balance}}</p>
        </div>
        <div>
            <a href="{{ route('customers.view') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Customers</a>
        </div>
        </div>
        <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>ip</th>                         
                </tr>
            </thead>            
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->transaction_type}}</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->date)->format('d-M, Y') }}</td>
                    <td>$ {{ $transaction->amount}}</td>
                    <td>{{ $transaction->ip_address}}</td>
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