@extends('layout')

@section('title','View Detail User')

@section('content')

<div class="col-lg-8">
    <h5>{{ $user->name }}'s User Detail </h5>
    <form enctype="multipart/form-data" action="{{ route('updateuser', $user->id) }}" method="POST">
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
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" 
            name="email" placeholder="Email" required value="{{ $user->email }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" 
            name="role" placeholder="Role" value="{{ $user->role }}">
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" style="background-color:#3490DC; margin-bottom: 20px;">Update</button>
    </form>
</div>

@endsection