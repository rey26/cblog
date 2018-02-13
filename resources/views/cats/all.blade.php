@extends('layouts.master')
@section('content')
    <ul>
    @foreach($cats as $cat)
            @if($cat->children->count() > 0)
            <li>{{$cat->title}}</li>
                <ul>
                <div style="margin-left: 10px;">
        @foreach($cat->children as $subCat)
                     <li>{{$subCat->title}}</li>
            @endforeach
                </div>
                </ul>
            @elseif(!$cat->parent)
                <li>{{$cat->title}}</li>
            @endif
        @endforeach
    </ul>
    @endsection