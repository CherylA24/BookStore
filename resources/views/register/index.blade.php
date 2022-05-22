@extends('layout')

@section('title','Register')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-registration RegisterForm">
            <h1 class="h3 mb-3 mt-3 fw-bold text-center">Register</h1>
            <form enctype="multipart/form-data" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-floating FormInput">
                    <input type="email" name="email" class="form-control rounded-top @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required>
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating FormInput">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required>
                    <label for="name">Full Name</label>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating FormInput">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating FormInput">
                    <input type="password" name="password_confirmation" class="form-control rounded bottom @error('password') is-invalid @enderror" id="password_confirmation" placeholder="Password" required>
                    <label for="password_confirmation">Confirmation Password</label>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-4 RegisterBtn" type="submit">Register</button>
            </form>
        </main>
    </div>
</div>


@endsection