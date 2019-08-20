@include('official-th.layout.header')

<section id="banner" class="bg-img" data-bg="banner-1.jpg">
    <div class="inner"></div>
    <a href="#one" class="more">Learn More</a>
</section>

<!-- One -->
<section id="one" class="wrapper post bg-img" data-bg="banner-2.jpg">
    <div class="inner">
        <article class="box">
            <div class="text-center">
                <h5>สุดท้ายโปรดอัปโหลดรูปถ่ายของผู้แข่งขัน</h5>
                <p>ภาพร่างกายเต็มรูปถ่ายครึ่งตัวและภาพใหญ่</p>
                <hr>
                <form action="{{ route('upload-th') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="fileToUpload[]" id="fileToUpload" class="form-control" multiple>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-danger m-auto">อัปโหลด <i class="zmdi zmdi-arrow-right"></i></button>
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

@include('official-th.layout.footer')
