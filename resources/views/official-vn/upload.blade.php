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
                <h5>Cuối cùng, xin vui lòng tải lên hình ảnh của thí sinh.</h5>
                <p>Ảnh toàn thân, ảnh nửa thân và ảnh lớn</p>
                <hr>
                <form action="{{ route('upload-vn') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="fileToUpload[]" id="fileToUpload" class="form-control" multiple>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-danger m-auto">Tải lên<i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
{{--                    <a class="btn btn-primary btn-block m-auto" href="/">--}}
{{--                        我已確認報名完成--}}
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

@include('official.layout.footer')
