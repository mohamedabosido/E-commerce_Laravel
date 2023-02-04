@extends('admin.layouts.auth')
@section('content')
    <h4>New here?</h4>
    <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
    <form class="pt-3" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name"
                placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" placeholder="Email"
                 name="email" value="{{ old('email') }}" required
                autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" placeholder="Password"
                 name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg" id="password_confirmation"
                placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="mb-4">
            <div class="form-check">
                <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input"> I agree to all Terms &
                    Conditions
                </label>
            </div>
        </div>
        <div class="mt-3">
            <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN
                UP</button>
        </div>
        <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ route('login') }}"
                class="text-primary">Login</a>
        </div>
    </form>
@endsection
