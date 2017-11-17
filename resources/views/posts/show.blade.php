@extends('layouts.master')
@section('content')
<div class="col-sm-8">
    <h1>{{$post->title}}</h1>
    <p>{{$post->created_at->toFormattedDateString()}} by {{$post->user->name}}</p>
    <p>{{$post->subtitle}}</p>
    <p>
        {{$post->body}}
    </p>
</div>
    @include('layouts.sidebar')
    @endsection