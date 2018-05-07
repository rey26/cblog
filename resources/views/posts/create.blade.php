@extends('layouts.master')
@section('content')
    <h1>Create new blog</h1>
    <form method="POST" action="/posts">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title</label>
            <input value="{{old('title')}}" class="form-control" id="title" name="title" placeholder="Title" required tabindex="0">
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input value="" class="form-control" id="slug" name="slug" placeholder="slug" required tabindex="0">
        </div>
            Category
        <select onselect="{{old('cat_id')}}" name="cat_id" id="category" class="form-control">
            <option value="">Select category</option>

            @foreach($cats as $cat)
                @if($cat->children->count() > 0)
                    <option disabled>{{$cat->title}}</option>

                            @foreach($cat->children as $subCat)
                                <option value="{{$subCat->id}}">&nbsp;&nbsp;&nbsp;{{$subCat->title}}</option>
                            @endforeach


                @elseif(!$cat->parent)
                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                @endif
            @endforeach
        </select>

        <div class="form-group">
            Subtitle/SEO metadata
            <input value="{{old('subtitle')}}" class="form-control" id="subtitle" name="subtitle" placeholder="Podnadpis" required>
        </div>
        <div class="form-group">
            #Tags<br>
            @foreach($tags as $tag)
            <input type="checkbox" id="tags" name="tags[]" value="{{$tag->id}}">{{$tag->name}}<br>
            @endforeach
            {{--// place for AJAX added tags below--}}
            <div id="freshTags"></div>
            <button type="button" id="addTag" class="btn-info btn">
               + New tag
            </button>
            <div id="addTagDialog" class="hidden">
                #<input id="newTagBody" value="" type="text" autofocus/>
                <button type="button" id="saveTagBtn" class="btn-info btn">
                    <i class="fas fa-check"></i>
                </button>
            </div>
        </div>
        <div class="form-group">
            Blog->main text
            <textarea value="{{old('body')}}" class="form-control" id="body" name="body" placeholder="Click here for typing" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Publish</button>
    </form>
    <script src="/js/create.js"></script>
    @if(count($errors))
        @include('layouts.errors')
    @endif
    @endsection
