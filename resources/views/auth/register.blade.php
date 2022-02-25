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
    <link href="/css/register.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>

@extends('layouts.app')
@section('content')

<div class="container">
    <div data-aos = "fade-up" data-aos-delay = "1000" data-aos-duration ="1000" data-aos-offset = "200" class="d-flex justify-content-center">
        <div class="col-10">
            <div id = "card" class="card">
                <div id = "card-body" class="card-body">
                    <h1 class="mb-3 ml-2">Register </h1>
                    <hr>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Name --> 
                        <div class="mt-2 mb-3 col-12 d-flex">
                            <!-- First Name --> 
                            <label for="firstname" class="col-form-label">{{ __('First Name') }}</label>
                            <div class="col-md-4 mr-5">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>                                       
                                    </span>
                                @enderror
                            </div>
                            <!-- Last Name --> 
                            <label for="lastname" class="col-form-label">{{ __('Last Name') }}</label>
                            <div class="col-md-4">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- E-mail --> 
                        <div id="email" class="mb-3 col-12 d-flex">
                            <label for="email" class="col-form-label">{{ __('Email') }}</label>
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
                        <!-- Confirm Password -->           
                        <div class="mb-3 col-12 d-flex">
                            <label for="password-confirm" class="col-form-label">Confirm <br> Password</label>
                            <div id="confirm" class="col-lg-10">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <!-- Class & Pole --> 
                        <hr>
                        <div id="class" class="col-12 mb-3 d-flex">
                            <!-- Class --> 
                            <label for="class" class="col-form-label">{{ __('Class') }}</label>
                            <div class="col-lg-4 col-3 mr-5">
                                <div class="col-12">
                                    <input type="radio" name="class" value="INDP1">
                                    <label for="INDP1">INDP1</label>
                                </div>
                                <div class="col-12">
                                    <input type="radio" name="class" value="INDP2">
                                    <label for="INDP2">INDP2</label>  
                                </div>
                                @error('class')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>                                       
                                    </span>
                                @enderror
                            </div>
                            <!-- Pole--> 
                            <label id="pole-text" for="pole" class="col-form-label">{{ __('Pole') }}</label>
                            <div id="pole" class="col-6">
                                <div class="row" id="row">
                                    <div class="col-7 col-md-5 col-lg-4">
                                        <input type="radio" name="pole" value="Projet">
                                        <label for="Projet">Projet</label>
                                    </div>
                                    <div class="col-5 col-md-5 col-lg-5">
                                        <input type="radio" name="pole" value="RH">
                                        <label for="RH">RH</label>
                                    </div>
                                    <div class="col-7 col-md-5 col-lg-4">
                                        <input type="radio" name="pole" value="DevCo">
                                        <label for="DevCo">DevCo</label>  
                                    </div>
                                    <div class="col-5 col-md-6 col-lg-5">
                                        <input type="radio" name="pole" value="Marketing">
                                        <label for="Marketing">Marketing</label><br>                              
                                    </div>    
                                </div>
                                @error('pole')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Bureau Checkbox -->
                        <div id="class" class="col-12 d-flex justify-content-center">
                            <input class="form-check-input mr-5" type="checkbox" name="bureau" id="bureau" {{ old('Bureau') ? 'checked' : '' }}>
                            <label class="form-check-label ml-2" for="bureau">{{ __('Bureau') }}</label>
                        </div>
                        <!-- Create New Profile Button -->
                        <hr>
                        <div class="mb-3 col-md-10 offset-md-1 d-flex text-align-center">
                            <button type="submit" class="btn btn-primary col-md-12">
                                {{ __('Create New Profile') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
