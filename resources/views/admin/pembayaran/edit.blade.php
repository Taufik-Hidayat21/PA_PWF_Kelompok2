@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Payment</h1>

        <form action="{{ route('admin.pembayaran.update', $payment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="penghuni_id">Resident</label>
                <select class="form-control" id="penghuni_id" name="penghuni_id" required>
                    <option value="">Select Resident</option>
                    @foreach($pembayarans as $payment)
                        <option value="{{ $pembayaran->id }}" {{ $payment->penghuni_id == $resident->id ? 'selected' : '' }}>{{ $resident->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="kamar_id">Room</label>
                <select class="form-control" id="kamar_id" name="kamar_id" required>
                    <option value="">Select Room</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}" {{ $payment->kamar_id == $room->id ? 'selected' : '' }}>{{ $room->no_kamar }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" step="0.01" value="{{ $payment->amount }}" required>
            </div>

            <div class="form-group">
                <label for="payment_date">Payment Date</label>
                <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ $payment->payment_date->format('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="overdue" {{ $payment->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection