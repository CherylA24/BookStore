@extends('layout')

@section('title','Manage Genre')

@section('content')

<div class="col-lg-8">
    <h1>Insert Genre</h1>
    <form enctype="multipart/form-data" action="{{ route('managegenre') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" style="background-color:#3490DC; margin-bottom: 20px;">Insert</button>
    </form>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($genres as $genre)
                            <tr>
                                <td>{{ $genre->name }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('viewdetailgenre', $genre->id) }}" role="button">View Detail</a>
                                </td>
                                <td><form action="{{ route('deletegenre', $genre->id) }}" method="POST">
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