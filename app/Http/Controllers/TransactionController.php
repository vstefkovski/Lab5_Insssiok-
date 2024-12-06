<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();

        // Bonus: Calculate total count and sum
        $totalCount = $transactions->count();
        $totalAmount = $transactions->sum('amount');

        return view('transactions.index', compact('transactions', 'totalCount', 'totalAmount'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'employee_surname' => 'required|string|max:255',
            'sender_name' => 'required|string|max:255',
            'sender_surname' => 'required|string|max:255',
            'recipient_name' => 'required|string|max:255',
            'recipient_surname' => 'required|string|max:255',
            'sender_account' => 'required|string|max:255',
            'recipient_account' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'employee_surname' => 'required|string|max:255',
            'sender_name' => 'required|string|max:255',
            'sender_surname' => 'required|string|max:255',
            'recipient_name' => 'required|string|max:255',
            'recipient_surname' => 'required|string|max:255',
            'sender_account' => 'required|string|max:255',
            'recipient_account' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
