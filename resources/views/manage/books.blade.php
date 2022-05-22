@extends('layout')

@section('title','Manage Books')

@section('content')

<div class="col-lg-8">
    <h1>Insert Books</h1>
    <form enctype="multipart/form-data" action="{{ route('insertbook') }}" method="POST" onsubmit="convertGenre()">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" placeholder="Author" required>
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="synopsis" class="form-label">Synopsis</label>
            <textarea class="form-control @error('synopsis') is-invalid @enderror" id="exampleFormControlTextarea1" rows="10" name="synopsis"></textarea>
            @error('synopsis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="synopsis" class="form-label">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Price" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Genre(s)</label>
            <div class="form-check">
                @foreach($genres as $genre)
                <div class="form-group form-check" onclick="checkGenres({{ $genre->id }})">
                <input class="form-check-input" type="checkbox"
                        value="{{ $genre->id }}" id="check{{ $genre->id }}">
                    <label class="form-check-label">{{ $genre->name }}</label>
                </div>
                @endforeach
                @error('genres')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <input value="" type="text" id="genres" class="form-control" name="genres" hidden>
        </div>
        <div class="mb-3">
            <label for="synopsis" class="form-label">Cover</label>
            <input type="file" class="form-control @error('cover') is-invalid @enderror" id="cover" name="cover" placeholder="Cover" required>
            @error('cover')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" style="background-color:#3490DC; margin-bottom: 20px;">Insert</button>
    </form>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Author</th>
                                <th>Synopsis</th>
                                <th>Genre</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($books as $book)
                            <tr>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->synopsis}}</td>
                                <td>
                                @foreach( $book->genres as $genre)
                                    {{ $genre->name }}
                                @endforeach
                                </td>
                                <td>IDR {{ $book->price }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="/detail/book/{{ $book->id }}" role="button">View Detail</a>
                                <td><form action="/delete/book/{{ $book->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
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