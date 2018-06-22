@extends('layouts.master')

@section('content')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to cBlog, the intuitive blogging system. Navigate to <a href="/">main screen</a>
                </div>
            </div>
        </div>
@endsection
