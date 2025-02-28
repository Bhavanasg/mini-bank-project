<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $total_customers = Customer::count();
        $total_revenue = Transaction::where('transaction_type', 'credited')->sum('amount');

        return view('index',compact('total_customers','total_revenue'));
    }
}
