<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index($id)
    {
        $customer = Customer::find($id);
        $transactions = Transaction::where('customer_id',$id)->get();
        $totalCredits = Transaction::where('customer_id', $id)
            ->where('transaction_type', 'credited')
            ->sum('amount');
        $totalDebits = Transaction::where('customer_id', $id)
            ->where('transaction_type', 'debited')
            ->sum('amount');
        if(isset($totalDebits) && isset($totalCredits)) {
            $available_balance = $totalCredits - $totalDebits;
        } else {
            $available_balance = 0;
        }
        
        return view('transactions.view-transactions',compact('customer','transactions','available_balance'));
    }

    public function storeTransaction(Request $request) 
    {
        $request->validate([
            'type' => 'required',
            'amount' => 'required|min:1'
        ]);

        $customer = Auth::user();

        if ($request->type === 'debited') {
            $todays_transactions = Transaction::where('customer_id', $customer->id)
                ->where('transaction_type', 'debited')
                ->whereDate('date', now()->toDateString())
                ->count();

            if ($todays_transactions >= 5) {
                return response()->json([
                    'message' => 'Transaction limit exceeded. You can only perform 5 debit transactions per day.'
                ]);
            }
        }

        $transaction = Transaction::create([
            'customer_id' => $customer->id,
            'transaction_type' => $request->type,
            'amount' => $request->amount,
            'date' => now(),
            'ip_address' => $request->ip()
        ]);

        return response()->json([
            'message' => 'Transaction successful',
            'transaction' => $transaction
        ]);
    }
}
