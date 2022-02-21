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
@extends('layouts.app')
@section('content')
<div class="container">
    <div data-aos = "fade-up" data-aos-delay = "1000" data-aos-duration ="2000" data-aos-offset = "200" class="d-flex justify-content-center">
        <div class=" mt-5 col-6">
            <div id = "card" class="card">
                <div id = "card-body" class="card-body">
                    <h1 class="mb-3 ml-2">Log In </h1>
                    <hr>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email -->
                        <div class="mt-3 mb-3">
                            <div class="col-12">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <!-- Login Button -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary col-12">{{ __('Login') }}</button>
                        </div>
                        <!-- Forgot Password -->
                        <div class="mt-3 col-md-12 offset-md-4">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link pr-5" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            @endif
                        </div>
                         <!-- Remember Me -->
                        <div class="mb-3 offset-md-8">
                            <div class="form-check">
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
