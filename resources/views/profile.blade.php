@extends('layout')

@section('title', 'Profile')

@section('content')

<div class="col-lg-8">
    <h5>Profile</h5>
    <form enctype="multipart/form-data" action="{{ route('updateprofile', $user->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
            name="name" placeholder="Name" value="{{ $user->name }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="staticEmail" class="form-label">Email</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $user->email }}">
        </div>
        <button type="submit" class="btn btn-primary" style="background-color:#3490DC;">Update</button>
        <a href="{{ route('changepassword') }}" class="btn btn-primary" style="background-color:#3490DC;">Change Password</a>
    </form>
</div>

@endsection

