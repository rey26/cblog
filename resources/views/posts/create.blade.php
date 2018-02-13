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
        <select onselect="{{old('cat_id')}}" name="cat_id" id="category" class="form-control cat-select">
            <option value="">Vyber kategoriu</option>

            @foreach($cats as $cat)
                @if($cat->children->count() > 0)
                    {{$cat->title}}
                    <ol>
                        <div style="margin-left: 10px;">
                            @foreach($cat->children as $subCat)
                                <li><option value="{{$subCat->id}}">{{$subCat->title}}</option></li>
                            @endforeach
                        </div>
                    </ol>
                @elseif(!$cat->parent)
                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                @endif
            @endforeach
        </select>
        <div class="form-group">
            Podnadpis/SEO metadata
            <input value="{{old('subtitle')}}" class="form-control" id="subtitle" name="subtitle" placeholder="Podnadpis" required>
        </div>
        <div class="form-group">
            {{--TODO: interactively add new tag text-input https://www.youtube.com/watch?time_continue=21&v=yaxUV3Ib4vM--}}
            #Tagy<br>
            @foreach($tags as $tag)
            <input type="checkbox" id="tags" name="tags[]" value="{{$tag->id}}"><label for="tags[]">{{$tag->name}}</label><br>
            @endforeach
            {{--<div id="addTag" class="btn-info btn" style="border-radius: 20px">--}}
               {{--+ Novy tag--}}
            {{--</div>--}}
            {{--<div id="newTag" class="hidden">--}}
                {{--#<input name="anTag" type="text">--}}
            {{--</div>--}}
        </div>
        <div class="form-group">
            Blog->hlavný text
            <textarea value="{{old('body')}}" class="form-control" id="body" name="body" placeholder="Môžeš začať písať..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Publikuj</button>
    </form>
    <script>
        $(document).ready(function () {

            $("#addTag").on("click", function(){
                $("#newTag").toggleClass("hidden");
            })
        });
    </script>
    @if(count($errors))
        @include('layouts.errors')
    @endif
    @endsection
