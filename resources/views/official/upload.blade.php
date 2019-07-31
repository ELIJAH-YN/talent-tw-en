@include('official.layout.header')

<section id="banner" class="bg-img" data-bg="banner-1.jpg">
    <div class="inner"></div>
    <a href="#one" class="more">Learn More</a>
</section>

<!-- One -->
<section id="one" class="wrapper post bg-img" data-bg="banner-2.jpg">
    <div class="inner">
        <article class="box">
            <div class="text-center">
                <h5>最後請上傳參賽者照片</h5>
                <p>全身照、半身照與大頭照一張</p>
                <hr>
                <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="fileToUpload[]" id="fileToUpload" class="form-control" multiple>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-danger m-auto">上傳 <i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                    <a class="btn btn-primary btn-block m-auto" href="/">
                        我已確認報名完成
                    </a>
                </form>
                <div>
                    @if( !empty($medias) )
                        @foreach ($medias as $media)
                            <img src="{{ $media->getUrl() }}">
                        @endforeach
                    @endif
                </div>
            </div>
        </article>
        <div data-type="countdown" data-id="1340208" class="tickcounter" style="width: 250px; height: 62px; margin: 0 auto"><a href="//www.tickcounter.com/countdown/1340208/" title="報名開放倒數">報名開放倒數</a><a href="//www.tickcounter.com/" title="Countdown">Countdown</a></div><script>(function(d, s, id) { var js, pjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//www.tickcounter.com/static/js/loader.js"; pjs.parentNode.insertBefore(js, pjs); }(document, "script", "tickcounter-sdk"));</script>
    </div>
</section>

@include('official.layout.footer')
