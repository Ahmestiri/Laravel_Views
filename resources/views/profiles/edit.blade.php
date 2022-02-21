<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SJE Members</title>
    <link rel="icon" href="/brand/icon.ico">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="/css/register.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>

@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PATCH')
        <div class="d-flex justify-content-center">
            <div class=" mt-3 col-10">
                <div id = "card" class="card">
                    <div id = "card-body" class="card-body">
                        <h1 class="mb-3 ml-2">Edit Your Profile </h1>
                        <hr>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Name --> 
                            <div class="mt-2 mb-3 col-12 d-flex">
                                <!-- First Name --> 
                                <label for="firstname" class="col-form-label">{{ __('First Name') }}</label>
                                <div class="col-md-4 mr-5">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') ?? $user->firstname }}" required autocomplete="firstname" autofocus>
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>                                       
                                        </span>
                                    @enderror
                                </div>
                                <!-- Last Name --> 
                                <label for="lastname" class="col-form-label">{{ __('Last Name') }}</label>
                                <div class="col-md-4">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') ?? $user->lastname }}" required autocomplete="lastname" autofocus>
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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Class & Pole --> 
                            <hr>
                            <div id="class" class="col-12 mb-3 d-flex">
                                <!-- Class --> 
                                <label for="class" class="col-form-label">{{ __('Class') }}</label>
                                <div class="col-lg-4 mr-5">
                                    <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ old('class') ?? $user->class }}" required autocomplete="class" autofocus>
                                    @error('class')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>                                       
                                        </span>
                                    @enderror
                                </div>
                                <!-- Pole--> 
                                <label id="pole-text" for="pole" class="col-form-label">{{ __('Pole') }}</label>
                                <div id="pole" class="col-lg-4">
                                    <input type="text" class="form-control @error('pole') is-invalid @enderror" name="pole" value="{{ old('pole') ?? $user->pole }}" required autocomplete="pole" autofocus>
                                    @error('pole')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Image & URL --> 
                            <div id="class" class="col-12 mb-3 d-flex">
                                <!-- Image --> 
                                <label for="image" class="col-form-label">{{ __('Image') }}</label>
                                <div class="col-lg-4 mr-5">
                                    <input id="class" name="image" type="file" class="form-control-file" >
                                    @error('image')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                                <!-- URL--> 
                                <label id="pole-text" for="url" class="col-form-label">{{ __('URL') }}</label>
                                <div id="pole" class="col-lg-4">
                                    <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url}}" required autocomplete="url" autofocus>
                                    @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Create New Profile & Go Back Button -->
                            <hr>
                            <div class="mb-3 col-10 offset-1">
                                <button type="submit" class="btn btn-primary col-12">
                                    {{ __('Save') }}
                                </button>
                                <div class="col-2"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
