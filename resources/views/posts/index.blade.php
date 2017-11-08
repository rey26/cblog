@extends('layouts.master')

@section('content')
<div class="col-sm-8">
    @foreach($posts as $post)
       @include('posts.post')
        @endforeach
</div>
@include('layouts.sidebar')
    @endsection
