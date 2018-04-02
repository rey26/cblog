@extends('layouts.master')

@section('content')

    <h2 class="text-center">Kategorie</h2>
<button type="button" id="newCat" class="btn btn-primary btn-lg ">Pridaj</button>
    <div class="row panel-group">
    @foreach($cats as $cat)
            <div class="panel panel-default col-lg-4 col-md-6  col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1" >
                <div class="panel-body">
            @if($cat->children->count() > 0)
                        <h3><a href="#" class="catEdit" data-name="title" data-type="text" data-pk="{{$cat->id}}" data-title="Enter name">{{$cat->title}}</a></h3>
                            <h4>Podkategorie</h4>
                            <ul>
                @foreach($cat->children as $subCat)
                                    <li><a href="#" class="catEdit" data-name="title" data-type="text" data-pk="{{$subCat->id}}" data-title="Enter name">{{$subCat->title}}</a> (pocet clankov <strong>{{$subCat->posts->count()}}</strong> )</li>
                    @endforeach
                            </ul>
            @elseif(!$cat->parent)
                        <h3><a href="#" class="catEdit" data-name="title" data-type="text" data-pk="{{$cat->id}}"  data-title="Enter name">{{$cat->title}}</a> </h3><br><h4>(pocet clankov <strong>{{$cat->posts->count()}} </strong> )</h4>
                    @endif
        </div>
    </div>
        @endforeach

        {{--https://www.youtube.com/watch?v=Du_Ri_w77NM--}}
        {{--http://vitalets.github.io/x-editable/--}}
    </div>

    @endsection