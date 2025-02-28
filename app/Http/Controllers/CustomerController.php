<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::withCount('transactions')->get();
        return view('customers.index',compact('customers'));
    }

    public function addCustomer()
    {
        
        return view('customers.add-customer');
    }

    public function storeCustomer(Request $request)
    {
        $validator = $request->validate([
            'firstname' => 'required|string|min:3|max:15',
            'lastname' => 'required|string|max:15',
            'email' => 'required|email|unique:customers',
            'phone' => ['required', 'regex:/^\d{10}$/'],
            'password' => ['required','string','min:8','max:20','confirmed']
        ],[
            'phone.regex' => 'Phone number should contain exactly 10 digit1s',
            'password.min' => 'Password must be at least 8 characters long',
            'password.confirmed' => 'Passwords do not match'
        ]);

        $customer = Customer::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request['password'])
        ]);
        $customer->customer_id = 'C100' . $customer->id;
        $customer->save();

        return redirect()->route('customers.view')->with('message','Customer created successfully!!!');
    }

    public function editCustomer($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit-customer',compact('customer'));
    }

    public function deleteCustomer($id)
    {
        Customer::find($id)->delete();
        return redirect()->route('customers.view')->with('message','Customer deleted successfuly!!!');
    }

    public function updateCustomer(Request $request)
    {
        $validator = $request->validate([
           'firstname' => 'required|string|min:3|max:15',
            'lastname' => 'required|string|max:15',
            'email' => 'required|email',
            'phone' => ['required', 'regex:/^\d{10}$/'],
        ],[
            'phone.regex' => 'Phone number should contain exactly 10 digit1s'
        ]);
        $customer = Customer::find($request->id);
        $customer->update([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect()->route('customers.view')->with('message','Customer updated successfuly!!!');
    }
}
