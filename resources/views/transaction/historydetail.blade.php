@extends('layout')

@section('title', 'Transaction History Detail')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <?php $grandtotal = 0; ?>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Book Name</th>
                                <th>Book Author</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($details)
                                @foreach($details as $detail)
                                <?php 
                                    $subTotal = $detail->book->price * $detail->quantity;
                                    $grandtotal += (int)$subTotal; 
                                ?>
                                <tr>
                                    <td>{{ $detail->book->name }}</td>
                                    <td>{{ $detail->book->author }}</td>
                                    <td>IDR {{ $detail->book->price }}</td>
                                    @if($detail->quantity>1)
                                    <td>
                                        {{ $detail->quantity }} books
                                    </td>
                                    @else
                                    <td>
                                        {{ $detail->quantity }} book
                                    </td>
                                    @endif
                                    <td>IDR <?= $subTotal; ?></td>
                                    <td>
                                        <a class="btn btn-secondary" href="{{ route('viewdetailbook', $detail->book->id) }}" role="button">View Book Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <h5 class="mb-3">Grand Total: IDR <?= $grandtotal; ?></h5>   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection