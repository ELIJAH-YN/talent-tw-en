@include('official.layout.header')

<section id="banner" class="bg-img" data-bg="banner-tw-1.jpg">
    <div class="inner">
        <div class="form-group">
            <footer>
                <a href="{{  route('index') }}" class="button">台灣區</a>
                <a href="{{  route('index-en') }}" class="button">大灣區</a>
            </footer>
        </div>
    </div>
    <a href="#one" class="more">Learn More</a>
</section>


@include('official.layout.footer-storage')
