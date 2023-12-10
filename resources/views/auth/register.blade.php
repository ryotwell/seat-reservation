@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            <form method="POST"
                action="{{ route('register') }}">

                @csrf

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="text-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name"
                        type="text"
                        class="form-control"
                        name="name"
                        tabindex="1"
                        value="{{ old('name') }}"
                    />
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email"
                        type="text"
                        class="form-control"
                        name="email"
                        tabindex="1"
                        value="{{ old('email') }}"
                    />
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password"
                            class="control-label">Password</label>
                    </div>
                    <input id="password"
                        type="password"
                        class="form-control"
                        name="password"
                    />
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password"
                            class="control-label">Cofirm Password</label>
                    </div>
                    <input id="password"
                        type="password"
                        class="form-control"
                        name="password_confirmation"
                    />
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"
                            name="remember"
                            class="custom-control-input"
                            tabindex="3"
                            id="remember-me">
                        <label class="custom-control-label"
                            for="remember-me">Remember Me</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-lg btn-block"
                        tabindex="4">
                        Login
                    </button>
                </div>
            </form>

        </div>
    </div>
    <div class="text-muted mt-5 text-center">
        Already have account? <a href="{{ route('login') }}">Login</a>
    </div>
@endsection