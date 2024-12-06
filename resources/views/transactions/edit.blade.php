@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Transaction</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Employee Name</label>
            <input type="text" name="employee_name" class="form-control" value="{{ old('employee_name', $transaction->employee_name) }}">
        </div>

        <div class="form-group">
            <label>Employee Surname</label>
            <input type="text" name="employee_surname" class="form-control" value="{{ old('employee_surname', $transaction->employee_surname) }}">
        </div>

        <div class="form-group">
            <label>Sender Name</label>
            <input type="text" name="sender_name" class="form-control" value="{{ old('sender_name', $transaction->sender_name) }}">
        </div>

        <div class="form-group">
            <label>Sender Surname</label>
            <input type="text" name="sender_surname" class="form-control" value="{{ old('sender_surname', $transaction->sender_surname) }}">
        </div>

        <div class="form-group">
            <label>Recipient Name</label>
            <input type="text" name="recipient_name" class="form-control" value="{{ old('recipient_name', $transaction->recipient_name) }}">
        </div>

        <div class="form-group">
            <label>Recipient Surname</label>
            <input type="text" name="recipient_surname" class="form-control" value="{{ old('recipient_surname', $transaction->recipient_surname) }}">
        </div>

        <div class="form-group">
            <label>Sender Account</label>
            <input type="text" name="sender_account" class="form-control" value="{{ old('sender_account', $transaction->sender_account) }}">
        </div>

        <div class="form-group">
            <label>Recipient Account</label>
            <input type="text" name="recipient_account" class="form-control" value="{{ old('recipient_account', $transaction->recipient_account) }}">
        </div>

        <div class="form-group">
            <label>Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount', $transaction->amount) }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
