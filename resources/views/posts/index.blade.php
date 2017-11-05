@extends('layouts.master')
@section('content')
    <div class="container">
        @foreach($posts as $post)
            <h1>{{$post->title}}</h1>
            <h3>{{$post->category}}</h3>
            @endforeach
    </div>
    @endsection