<a href="/posts/{{$post->slug}}">
<div class="blog-pagination">

        <h2>
            {{$post->title}}
        </h2>

    <p>{{$post->created_at->toFormattedDateString()}} by {{$post->user->name}}</p>
    <h5>{{$post->subtitle}}</h5>
</div>
</a>