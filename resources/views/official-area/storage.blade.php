@include('official.layout.header')

<section id="banner" class="bg-img" data-bg="banner-1.jpg">
    <div class="inner">
        {{--        <header>--}}
        {{--            <h1>This is Road Trip</h1>--}}
        {{--        </header>--}}
    </div>
    <a href="#one" class="more">Learn More</a>
</section>

<!-- One -->
<section id="one" class="wrapper post bg-img" data-bg="banner-2.jpg">
    <div class="inner">
        <article class="box">
            <header class="rules-wrapper">
                <h4>報名尚未開放</h4>
                <h5>敬請期待！</h5>
            </header>
        </article>
        <div data-type="countdown" data-id="1340208" class="tickcounter" style="width: 250px; height: 62px; margin: 0 auto"><a href="//www.tickcounter.com/countdown/1340208/" title="報名開放倒數">報名開放倒數</a><a href="//www.tickcounter.com/" title="Countdown">Countdown</a></div><script>(function(d, s, id) { var js, pjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//www.tickcounter.com/static/js/loader.js"; pjs.parentNode.insertBefore(js, pjs); }(document, "script", "tickcounter-sdk"));</script>
    </div>
</section>

@include('official.layout.footer-storage')
