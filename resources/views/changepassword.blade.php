@extends('layout')

@section('title', 'Change Password')

@section('content')

<div class="col-lg-8">
    <h5>Change Password</h5>
    <form enctype="multipart/form-data" action="{{ route('updatepassword', $user->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Old Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" 
            name="password" placeholder="Old Password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">New Password</label>
            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" 
            name="new_password" placeholder="New Password">
            @error('new_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">New Confirmation Password</label>
            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="password_confirmation" 
            name="password_confirmation" placeholder="New Confirmation Password">
            @error('new_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" style="background-color:#3490DC;">Update</button>
    </form>
</div>

@endsection