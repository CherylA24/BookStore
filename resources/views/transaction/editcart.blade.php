@extends('layout')

@section('title', 'Edit Cart')

@section('content')

<div class= "p-3 border">
    <div class="row">
        <div class="col-sm-2 ms-4">
            <img src="{{ Storage::url($book->cover) }}" alt=""style="width: 13rem; height: 18rem;">
        </div>
        <div class="col-sm-9 ms-5">
            <div class="row">
                <p class="col-sm-3">Name</p>
                <p class="col-sm-6 ms-4">{{ $book->name }}</p>
            </div>
            <div class="row">
                <p class="col-sm-3">Author</p>
                <p class="col-sm-6 ms-4">{{ $book->author}}</p>
            </div>
            <div class="row">
                <p class="col-sm-3">Synopsis</p>
                <p class="col-sm-6 ms-4">{{ $book->synopsis}}</p>
            </div>
            <div class="row">
                <p class="col-sm-3">Genre(s)</p>
                <p class="col-sm-6 ms-4">
                    @foreach( $book->genres as $genre)
                        {{ $genre->name }}
                    @endforeach
                </p>
            </div>
            <div class="row">
                <p class="col-sm-3">Price</p>
                <p class="col-sm-6 ms-4">IDR {{ $book->price}}</p>
            </div>
            <div class="row">
                <form action="{{ route('editcart', $book->id) }}" method="POST">
                    @csrf
                    <div class="col-sm-3 input-group">
                        <span class="input-group-text" id="inputGroup-sizing-default">Quantity</span>
                        <input type="number" class="form-control" name="quantity" value="{{ $book->quantity }}">
                        <button type="submit" class="btn btn-primary col-sm-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection