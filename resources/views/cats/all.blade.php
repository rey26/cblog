@extends('layouts.master')

@section('content')
    <h2 class="text-center" xmlns="http://www.w3.org/1999/html">Categories</h2>
    <button type="button" id="newCat" class="btn btn-primary btn-lg text-center">Add</button>
    <div class="row" id="catView">
    @foreach($cats as $cat)

            @if($cat->children->count() > 0 )
                <div class="col-lg-4 col-sm-6">
                <div id="panel{{$cat->id}}" class="panel" >
                    <div class="panel-body">
                        <h3><a href="#" class="catEdit" data-name="title" data-type="text" data-pk="{{$cat->id}}" data-title="Enter name">{{$cat->title}}</a></h3>
                        <h4>Subcategories</h4>
                            <ul>
                @foreach($cat->children as $subCat)
                                    <li><a href="#" class="catEdit" data-name="title" data-type="text" data-pk="{{$subCat->id}}" data-title="Enter name">{{$subCat->title}}</a> (number of blogs <strong>{{$subCat->posts->count()}}</strong> )</li>
                    @endforeach
                            </ul>
                    </div>
                </div>
                </div>
            @elseif(!$cat->parent)
                <div class="col-lg-4">
                <div id="panel{{$cat->id}}" class="panel" >
                     <div class="panel-body">
                        <h3><a href="#" class="catEdit" data-name="title" data-type="text" data-pk="{{$cat->id}}"  data-title="Enter name">{{$cat->title}}</a> </h3><br>
                         <h4>(number of blogs <strong>{{$cat->posts->count()}} </strong> )</h4>
                         @if($cat->posts->count()==0)
                             <span data-pk="{{$cat->id}}" class="btn btn-danger btn-lg deleteCat"><i class="fas fa-times"></i></span>
                        @endif
                     </div>
                </div>
                </div>
            @else
            @endif

        @endforeach

    </div>

    <div class="modal fade in" id="newCatModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="catEditorModalLabel">Add a new category</h4>
                </div>
                <div class="modal-body">
                    <form id="modalForm" name="modalFormData" class="form-horizontal" novalidate="">

                        <div class="form-group">
                            <label for="inputLink" class="col-sm-2 control-label">Category</label>
                            <div id="catEdit">
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="catName" placeholder="Category name" value="" autofocus required>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary" id="saveCatBtn">
                                        <i class="fas fa-check"></i>
                                    </button><br>
                                </div>
                            </div>
                            <span id="freshCat"></span>
                            <div class="col-sm-10">
                                <input type="checkbox" class="sform-control" id="catChildBox">Subcategories<br>
                                <span id="freshChildren"></span>
                                <div id="catChild" class="hidden">
                                    <input id="newChildBody" value="" type="text" autofocus/>
                                        <button type="button" id="saveChildBtn" class="btn-info btn">
                                            <i class="fas fa-check"></i>
                                        </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button id="closeModal" type="button" class="btn btn-primary" data-dismiss="modal" >Save
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection