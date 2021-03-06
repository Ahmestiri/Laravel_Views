<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SJE Members</title>
    <link rel="icon" href="/brand/icon.ico">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="/css/index.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-12 mt-5 pt-5 pb-5" id="container">
        <!-- Profile Image--> 
        <div class="col-7" id="image-box">
            <img id = "image" src="{{$user->profile->profileImage()}}">
        </div> 
        <div class="col-5" id = 'description'>
        <h3 class="mb-3 text-center">{{$user->firstname}} {{$user->lastname}}</h3>
        <!-- Edit Button--> 
        @if (Auth::check() && Auth::user()->id == $user->id)
            <hr>
            <a href="/profile/{{$user->id}}/edit"><button type="button" class="btn btn-primary col-10 offset-1">Edit</button></a>
        @endif
        <!-- Main Content--> 
        <hr>
        <div><b>Name</b> : {{$user->firstname}} {{$user->lastname}}</div>
        <div><b>Class</b> : {{$user->class}}</div>
        <div><b>Pole</b> : {{$user->pole}}</div>
        <div><b>E-mail</b> : {{$user->email}}</div>
        <hr>
        <div><b>Link</b> :<a class="btn btn-outline-light btn-floating ml-3" href="{{$user->profile->url}}" role="button"><i class="fab fa-facebook-f"></i></a></div>
        @if ($user->bureau == 'on')
        <hr>
        <div><b>Bureau : </b><span> Pole {{$user->pole}}</span></div> 
        @endif
        <hr>
        <!-- Delete Button --> 
        @if (Auth::check() && Auth::user()->id == $user->id)
            <a href="/profile/{{$user->id}}/delete"><button type="button" class="btn btn-danger col-10 offset-1">Delete Profile</button></a>
            <hr>
        @endif
    </div>
</div>
@endsection
