
<footer>
    <div class="container prefooter">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <a id="logo-footer" href="/"><b >LOGO</b></a>
                <ul class="address" style="list-style: none">
                    <li>12345 North Main Street</li>
                    <li> New York, NY 555555</li>
                    <li>Phone: +1.8000 555.6789</li>
                    <li>Email: info@row-page.ru</li>
                </ul>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <b>RECENT POSTS</b>
                <ul class="post hide">
                    @foreach($posts as $post)
                    <li id="hide-text">
                        <a href="#"> <b> > {{ $post['name'] }}</b></a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <b class="m-2rem">TAGS</b>
                <div class="tags">
                    @foreach($tags as $tag)
                        <span  style="padding: 10px; border: solid 1px grey"><a href="#"> <b>{{ $tag['name'] }}</b></a></span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="copyright text-center">@Copyright 2020 | IT Projekt</div>
</footer>
