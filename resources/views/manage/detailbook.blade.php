@extends('layout')

@section('title','Book Detail')

@section('content')

<h1>{{ $book->name }}'s Book Detail</h1>

@auth
@if (Auth::user()->role == 'Member')
<div class= "p-3 border">
    <div class="row">
        <div class="col-sm-2 ms-4">
            <img src="{{ Storage::url($book->cover) }}" alt=""style="width: 13rem; height: 18rem;">
        </div>
        <div class="col-sm-9 ms-5">
            <div class="row">
                <p class="col-sm-3 col-md-3">Name</p>
                <p class="col-sm-6 ms-4 col-md-6">{{ $book->name }}</p>
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
                <form action="{{ route('addtocart', $book->id) }}" method="POST">
                    @csrf
                    <div class="col-md-12 col-sm-3 input-group">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-3" style="padding: 0px !important">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Quantity</span>
                                </div>
                                <div class="col-md-9" style="padding: 0px !important">
                                    <input type="number" class="form-control" name="quantity" min="1" value="{{ $book->quantity }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 text-right">
                            <button type="submit" class="btn btn-primary col-md-4 col-sm-2" style="background-color:#3490DC;float:right;">Add to Cart</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@if (Auth::user()->role == 'Admin')
<div class="col-lg-8">
    <h5>Update Books</h5>
    <form enctype="multipart/form-data" action="/update/book/{{ $book->id }}" method="POST" onsubmit="convertGenre()">
        @method('PUT')
        @csrf
        <div class="mb-3 d-flex justify-content-beween col-md-12">
            <div class="col-md-6">
                <label for="name" class="form-label BookLabel">Name</label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
                name="name" placeholder="Name" value="{{ $book->name }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-beween col-md-12">
            <div class="col-md-6">
                <label for="author" class="form-label BookLabel">Author</label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" 
                name="author" placeholder="Author" required value="{{ $book->author }}">
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-beween col-md-12">
            <div class="col-md-6">
                <label for="synopsis" class="form-label BookLabel">Synopsis</label>
            </div>
            <div class="col-md-6">
                <textarea class="form-control @error('synopsis') is-invalid @enderror" id="exampleFormControlTextarea1" rows="10" 
                name="synopsis">{{ $book->synopsis }}</textarea>
                @error('synopsis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-beween col-md-12">
            <div class="col-md-6">
                <label for="price" class="form-label BookLabel">Price</label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" 
                name="price" placeholder="Price" required value="{{ $book->price }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-beween col-md-12">
            <div class="col-md-6">
                <label class="form-label BookLabel">Genre(s)</label>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    @foreach($genres as $genre)
                    <div class="form-group form-check" onclick="checkGenres({{ $genre->id }})">
                    <input class="form-check-input" type="checkbox"
                            value="{{ $genre->id }}" id="check{{ $genre->id }}"                       
                            @foreach ($book->genres as $bookGenre)
                                {{ $genre->name === $bookGenre->name ? 'checked' : '' }}
                            @endforeach>
                        <label class="form-check-label">{{ $genre->name }}</label>
                    </div>
                    @endforeach
                    @error('genres')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input value="" type="text" id="genres" class="form-control" name="genres" hidden>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-beween col-md-12">
            <div class="col-md-6">
                <label for="synopsis" class="form-label BookLabel">Cover</label>
            </div>
            <div class="col-md-6">
                <img src="{{ Storage::url($book->cover) }}" alt=""style="width: 13rem; height: 18rem;">
                <input type="file" class="form-control @error('cover') is-invalid @enderror" id="cover" name="cover" placeholder="Cover">
                @error('cover')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color:#3490DC; margin-bottom: 20px;">Update</button>
    </form>
</div>
@endif
@else

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
        </div>
    </div>
</div>
@endauth

<script> 

    console.log(@json($book->genres));

    window.onload = () => {
        (@json($book->genres)).forEach(genre => {
            genre_array.push(genre['id']);
        });
    }

</script>

@endsection