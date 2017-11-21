@extends('layouts.master')
@section('content')
    <h1>Vytvor nový blog</h1>
    <form method="POST" action="/posts">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Nadpis</label>
            <input value="{{old('title')}}" class="form-control" id="title" name="title" placeholder="Nadpis" required tabindex="0">
        </div>
            Kategoria
        <select onselect="{{old('cat_id')}}" name="cat_id" id="category" class="form-control">
            <option value="">Vyber kategoriu</option>
            @foreach($cats as $cat)
            <option value="{{$cat->id}}" >{{$cat->skWord}}</option>
                @endforeach
        </select>
        <div class="form-group">
            Podnadpis/SEO metadata
            <input value="{{old('subtitle')}}" class="form-control" id="subtitle" name="subtitle" placeholder="Podnadpis" required>
        </div>
        <div class="form-group">
            #Tagy<br>
            @foreach($tags as $tag)
            <input type="checkbox" id="tags" name="tags[]" value="{{$tag->id}}"><label for="tags[]">{{$tag->name}}</label><br>
                @endforeach
        </div>
        <div class="form-group">
            Blog->hlavný text
            <textarea value="{{old('body')}}" class="form-control" id="body" name="body" placeholder="Môžeš začať písať..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Publikuj</button>
    </form>
    @if(count($errors))
        @include('layouts.errors')
    @endif
    @endsection
