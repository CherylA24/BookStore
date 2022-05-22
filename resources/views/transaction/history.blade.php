@extends('layout')

@section('title', 'Transaction History')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>TransactionID</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td><?= date_format(date_create($transaction->date), "D, M d, Y g:i A"); ?></td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('viewhistorydetail', $transaction->id) }}" role="button">View Transaction Detail</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>No Data...</td>
                                <td></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection