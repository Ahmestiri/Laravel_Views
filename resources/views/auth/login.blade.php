@extends('layouts.app')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SJE Members</title>
    <link rel="icon" href="/brand/icon.ico">
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="/css/login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
@section('content')
<div class="container">
    <div data-aos = "fade-up" data-aos-delay = "1000" data-aos-duration ="1000" data-aos-offset = "200" class="d-flex justify-content-center">
        <div class="col-10">
            <div id = "card" class="card">
                <div id = "card-body" class="card-body">
                    <h1 class="mb-3 ml-2">Login </h1>
                    <hr>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- E-mail --> 
                        <div id="email" class="mb-3 col-12 d-flex ml-4">
                            <label for="email" class="col-form-label ml-1">{{ __('Email') }}</label>
                            <div class="col-lg-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Password --> 
                        <div class="mb-3 col-12 d-flex">
                            <label for="password" class="col-form-label">{{ __('Password') }}</label>
                            <div id="password" class="col-lg-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <!-- Login Button -->
                        <div class="mb-3 col-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary col-6">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <div class="col-9 d-flex justify-content-center">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                            <div class="col-5">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
