<div class="blog-pagination">
    <a href="/posts/{{$post->id}}">
        <h2>
            {{$post->title}}
        </h2>
    </a>
    <p>{{$post->created_at->toFormattedDateString()}}</p>
    <h5>{{$post->subtitle}}</h5>
</div>