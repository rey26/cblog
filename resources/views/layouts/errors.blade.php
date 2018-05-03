<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li><strong style="color:red">{{$error}}</strong></li>
            @endforeach
    </ul>
</div>