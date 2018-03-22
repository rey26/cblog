@extends('layouts.master')
@section('content')
    <div class="col-md-8 col-md-offset-2">
    <table class="admin-table" style="width: 50%;">
        <th>Kategoria</th><th>Podkategoria</th>
    @foreach($cats as $cat)
            @if($cat->children->count() > 0)
                <tr><td>{{$cat->title}}</td><td></td></tr>

        @foreach($cat->children as $subCat)
                    <tr><td></td><td>{{$subCat->title}}</td></tr>
            @endforeach

            @elseif(!$cat->parent)
                <tr><td>{{$cat->title}}</td><td></td></tr>
            @endif
        @endforeach
    </table>
        {{--https://www.youtube.com/watch?v=Du_Ri_w77NM--}}
    </div>
    @endsection