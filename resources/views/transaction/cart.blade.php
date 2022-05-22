@extends('layout')

@section('title', 'View Cart')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-header">
                    <h5>Cart</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Book Name</th>
                                <th>Book Author</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $grandtotal = 0?>
                            @if($carts)
                                @foreach($carts as $cart)
                                    <?php $grandtotal += (int)$cart->subTotal;?>
                                    <tr>
                                        <td>{{ $cart->name }}</td>
                                        <td>{{ $cart->author }}</td>
                                        <td>IDR {{ $cart->price }}</td>
                                        @if($cart->quantity>1)
                                        <td>
                                            {{ $cart->quantity }} books
                                        </td>
                                        @else
                                        <td>
                                            {{ $cart->quantity }} book
                                        </td>
                                        @endif
                                        <td>IDR {{ $cart->subTotal }}</td>
                                        <td>
                                            <a class="btn btn-secondary" href="{{ route('viewdetailbook', $cart->id) }}" role="button">View Book Detail</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('vieweditcart', $cart->id) }}" role="button">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('removecart', $cart->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" class="btn btn-danger" value="Remove">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td>No Data...</td>
                                    <td></td>
                                </tr>
                                @endif        
                        </tbody>
                    </table>
                    <h5>Grand Total: IDR <?= $grandtotal; ?> </h5>   
                </div>
                <div class="card-footer">
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit" style="background-color:#3490DC;">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection