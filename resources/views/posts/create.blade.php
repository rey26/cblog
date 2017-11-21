@extends('layouts.master')
@section('content')
    <h1>Vytvor nový blog</h1>
    <form method="POST" action="/posts">
        {{csrf_field()}}
        <div class="form-group">
            Nadpis
            <input value="{{old('title')}}" class="form-control" id="title" name="title" placeholder="Title" required tabindex="0">
        </div>
            Category
        <select onselect="{{old('cat_id')}}" name="cat_id" id="category" class="form-control">
            <option value="">Select a category</option>
            <option value="1" >Intro</option>
            <option value="2">PR</option>
            <option value="3">Programovanie</option>
        </select>
        <div class="form-group">
            Subtitle
            <input value="{{old('subtitle')}}" class="form-control" id="subtitle" name="subtitle" placeholder="Subtitle" required>
        </div>
        <div class="form-group">
            Tags<br>
            @foreach($tags as $tag)
            <input type="checkbox" id="tags" name="tags[]" value="{{$tag->id}}">{{$tag->name}}<br>
                @endforeach
        </div>
        <div class="form-group">
            Body
            <textarea value="{{old('body')}}" class="form-control" id="body" name="body" placeholder="Type the main text here" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Publish</button>
    </form>
    @if(count($errors))
        @include('layouts.errors')
    @endif
    @endsection
