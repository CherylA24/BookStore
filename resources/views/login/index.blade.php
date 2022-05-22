@extends('layout')

@section('title','Login')

@section('content')

<div class="row justify-content-center LoginFormContainer">
    <div class="col-lg-4">
        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <main class="form-registration LoginForm">
            <h1 class="h3 mb-3 mt-3 fw-bold text-center">Log In</h1>
            <form  action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-floating FormInput">
                    <input type="email" name="email" class="form-control rounded-top @error('email') is-invalid @enderror" 
                    id="email" placeholder="name@example.com" 
                    value="{{ Cookie::get('mycookie') != null ? Cookie::get('mycookie') : '' }}" required>
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating FormInput">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label for="checkbox">
                        <input type="checkbox" name="remember" id="remember"> Remember me
                    </label>
                </div>

                <button class="w-100 btn btn-lg btn-primary mt-4 LoginBtn" type="submit">Login</button>
            </form>
        </main>
    </div>
</div>


@endsection