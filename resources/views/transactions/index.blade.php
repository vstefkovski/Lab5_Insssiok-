@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bank Transactions</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Add New Transaction</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Employee Surname</th>
                <th>Sender</th>
                <th>Recipient</th>
                <th>Sender Account</th>
                <th>Recipient Account</th>
                <th>Amount</th>
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->employee_name }}</td>
                    <td>{{ $transaction->employee_surname }}</td>
                    <td>{{ $transaction->sender_name }} {{ $transaction->sender_surname }}</td>
                    <td>{{ $transaction->recipient_name }} {{ $transaction->recipient_surname }}</td>
                    <td>{{ $transaction->sender_account }}</td>
                    <td>{{ $transaction->recipient_account }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-sm btn-warning">Update</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">No transactions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="row mt-3">
        <div class="col-md-6">
            <strong>Total Transactions:</strong> {{ $totalCount }}
        </div>
        <div class="col-md-6">
            <strong>Total Amount:</strong> {{ $totalAmount }}
        </div>
    </div>

</div>
@endsection
