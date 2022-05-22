@extends('layout')

@section('title','Detail Genre')

@section('content')

<div class="col-lg-8">
    <h5>{{ $genre->name }}'s Genre Detail </h5>
    <form enctype="multipart/form-data" action="{{ route('updategenre', $genre->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
            name="name" placeholder="Name" value="{{ $genre->name }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary"style="background-color:#3490DC; margin-bottom: 20px;">Update</button>
    </form>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-header">
                    <h5>Book List</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($books as $book)
                            <tr>
                                <td>{{ $book->name }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('viewdetailbook', $book->id) }}" role="button">View Detail</a>
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