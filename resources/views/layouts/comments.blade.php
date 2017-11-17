<hr>

//TODO: assign user_id to a comment. Comments are temporarly disabled

<div class="comments">
    <ul class="list-group">
        @foreach($post->comments as $comment)
            <li class="list-group-item">
                {{$comment->body}}<br> by {{$comment->user}} {{$comment->created_at->diffForHumans()}}
            </li>
        @endforeach
    </ul>
</div>
<div class="card">
    @if(Auth::check())
    <div class="card-block">
        <form action="/posts/{{$post->id}}/comments" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <textarea name="body" class="form-control" placeholder="Kliknutim zacnete pisat" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Odoslat komentar</button>
            </div>
        </form>
        @if(count($errors))
            @include('layouts.errors')
        @endif
    </div>
    @endif
    @if(!Auth::check())
        <div class="card-block">
            <p>Pre pridanie komentara sa, prosim, <a href="/login">prihlaste </a></p>
        </div>
        @endif
</div>