<div class="col-sm-3 offset-sm-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About cBlog</h4>
        <p>This is very user-friendly blog system, the best in the world</p>
    </div>
    <div class="sidebar-module">
        <h4>Latest</h4>
        <ol class="list-unstyled">
            @foreach($stats as $stat)
            <li>
                <a href="/?month={{$stat['month']}}&year={{$stat['year']}}">
                    {{$stat['year'] . ' ' . $stat['month']}}
                </a>
            </li>
            @endforeach
        </ol>
    </div>


    <div class="sidebar-module">
        <h4>Tags</h4>
        <ol class="list-unstyled">
            @foreach($tags as $tag)
                <li>
                    <a href="/posts/tags/{{$tag}}">
                        {{$tag}}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>
</div><!-- /.blog-sidebar -->