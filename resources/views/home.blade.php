@extends('layouts.master')

@section('content')
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to cBlog system. A clever way to blog.
                </div>
            </div>
        </div>
@endsection
