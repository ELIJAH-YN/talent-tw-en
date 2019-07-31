@include('official-area-en.layout.header')

<section id="banner" class="bg-img" data-bg="banner-1.jpg">
    <div class="inner"></div>
    <a href="#one" class="more">Learn More</a>
</section>

<!-- One -->
<section id="one" class="wrapper post bg-img" data-bg="banner-2.jpg">
    <div class="inner">
        <article class="box">
            <div class="text-center">
                <h5>At Last Upload You're Image</h5>
                <p>Full body photo, half body photo and big photo</p>
                <hr>
                <form action="{{ route('upload-area-en') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="fileToUpload[]" id="fileToUpload" class="form-control" multiple>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-danger m-auto">Upload <i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
{{--                    <a class="btn btn-primary btn-block m-auto" href="/">--}}
{{--                        confirmed the registration is complete--}}
{{--                    </a>--}}
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
    </div>
</section>

@include('official-area-en.layout.footer')
