@extends('layouts.master')
@section('content')
<div class="col-sm-8">
    <h1>{{$post->title}}</h1>
    <p>{{$post->created_at->toFormattedDateString()}} by <a href="/author/{{$post->user->username}}">{{$post->user->name}}</a></p>
    <p><strong>{{$post->cat->skWord}}</strong></p>
    <p>Tags:
        @if(count($post->tags))
         @foreach($post->tags as $tag)
                <a href="/posts/tags/{{$tag->name}}">
                    #{{$tag->name}}
                </a>
         @endforeach
        @endif
    </p>
    <p>{{$post->subtitle}}</p>
    <p>
        {{$post->body}}
    </p>
</div>
    @include('layouts.sidebar')
    @endsection