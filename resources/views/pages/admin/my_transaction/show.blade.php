@extends('layouts.parent')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Transaction #{{ $myTransaction->id }} &raquo; {{ $myTransaction->user->name }}
            </h5>

            <table class="table table-striped table-bordered">
                <tr>
                    <th>Name Account</th>
                    <td>{{ $myTransaction->user->name }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $myTransaction->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $myTransaction->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $myTransaction->phone }}</td>
                </tr>
                <tr>
                    <th>Courier</th>
                    <td>{{ $myTransaction->courier }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td scope="col">
                        @if ($myTransaction->status == 'PENDING')
                        <span class="badge bg-warning">PENDING</span>
                        @elseif ($myTransaction->status == 'SUCCESS')
                        <span class="badge bg-success">SUCCESS</span>
                        @elseif ($myTransaction->status == 'FAILED')
                        <span class="badge bg-danger">FAILED</span>
                        @elseif ($myTransaction->status == 'SHIPPING')
                        <span class="badge bg-info">SHIPPING</span>
                        @elseif ($myTransaction->status == 'SHIPPED')
                        <span class="badge bg-primary">SHIPPED</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td>Rp. {{ number_format($myTransaction->total_price) }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $myTransaction->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $myTransaction->updated_at }}</td>
                </tr>
            </table>

            <a href="{{ route('dashboard.my-transaction.index') }} " class="btn btn-primary">
                <i class="bi bi-arrow-left"></i>
                Back
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <h5 class="card-title">
                Transaction Item
            </h5>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name Product</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($myTransaction->transactionItem as $row )
                        <tr>
                            <td scope="col">{{ $loop->iteration }}</td>
                            <td scope="col">{{ $row->product->name}}</td>
                            <td scope="col">{{ number_format($row->product->price) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection