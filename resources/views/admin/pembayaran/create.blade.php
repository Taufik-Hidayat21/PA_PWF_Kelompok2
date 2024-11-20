@extends('layouts.master')

@section('top')
@endsection

@section('content')
    <div class="container">
        <h1>Create New Payment</h1>

        <form action="{{ route('admin.pembayaran.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="penghuni_id">Resident</label>
                <select class="form-control" id="penghuni_id" name="penghuni_id" required>
                    <option value="">Select Resident</option>
                    @foreach($penghunis as $penghuni)
                        <option value="{{ $penghuni->id }}">{{ $penghuni->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="kamar_id">Room</label>
                <select class="form-control" id="kamar_id" name="kamar_id" required>
                    <option value="">Select Room</option>
                    @foreach($kamars as $kamar)
                        <option value="{{ $kamar->id }}">{{ $kamar->no_kamar }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="payment_date">Payment Date</label>
                <input type="date" class="form-control" id="payment_date" name="payment_date" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="pending">Pending</option>
                    <option value="paid">Paid</option>
                    <option value="overdue">Overdue</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection