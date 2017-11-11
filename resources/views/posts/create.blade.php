@extends('layouts.master')
@section('content')
    <h1>Create a new blog</h1>
    <form method="POST" action="/posts">
        {{csrf_field()}}
        <div class="form-group">
            Title
            <input value="{{old('title')}}" class="form-control" id="title" name="title" placeholder="Title" required>
        </div>
            Category
        <select name="category" id="category" class="form-control">
            <option value="">Select a category</option>
            <option value="programming" >Programming</option>
            <option value="pr">PR</option>
            <option value="intro">Intro</option>
        </select>
        <div class="form-group">
            Subtitle
            <input value="{{old('subtitle')}}" class="form-control" id="subtitle" name="subtitle" placeholder="Subtitle" required>
        </div>
        <div class="form-group">
            Tags<br>
            <input type="checkbox" id="tags" name="tag[0]" value="Laravel">Laravel <br>
            <input type="checkbox" id="tags" name="tag[1]" value="JavaScript">JavaScript <br>
            <input type="checkbox" id="tags" name="tag[2]" value="Frontend">FrontEnd
        </div>
        <div class="form-group">
            Body
            <textarea value="{{old('body')}}" class="form-control" id="body" name="body" placeholder="Type the main text here" required></textarea>
        </div>

        <p>{{auth()->id()}}</p>

        <button type="submit" class="btn btn-primary">Publish</button>
    </form>
    @if(count($errors))
        @include('layouts.errors')
    @endif
    @endsection
