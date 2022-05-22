@extends('layout')

@section('title', 'Home')

@section('content')

<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-11">
            <form action="{{ route('home') }}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control SearchBar" placeholder="Search" name="search">
                    <button class="btn btn-primary HomeBtn" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            <a href="{{ route('home') }}" class="btn btn-primary HomeBtn">Clear Filter</a>
        </div>
    </div>
</div>


<div class="container">
    <div class="d-flex justify-content-between">
        @foreach($books as $book)
        <div class="col-sm-2 CardContainer">
            <div class="card HomeCard" style="width:13rem; height:29rem">
                <div class="text-center">
                    <img src="{{ Storage::url($book->cover) }}" class="card-img-top img-fluid" style="width: 12rem; height:15rem">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $book->name }}</h5>
                    <p class="card-text">By : {{ $book->author }}</p>
                    <p class="card-text">IDR : {{ $book->price}}</p>
                    <a href="{{ route('viewdetailbook', $book->id) }}" class="btn btn-primary HomeBtn">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="pagination justify-content-center">
        {{ $books->links() }}
    </div>
</div>

@endsection