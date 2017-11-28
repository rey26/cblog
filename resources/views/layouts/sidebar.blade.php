<div class="col-sm-3 offset-sm-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>O cBlog-u</h4>
        <p>Tento projekt je návrh jednoduchého blogovacieho systému. Používateľské prostredie je jednoduché na použitie.</p>
    </div>
    <div class="sidebar-module">
        <h4>Podľa dátumu</h4>
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
        <h4>Tagy</h4>
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