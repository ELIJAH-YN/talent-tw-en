@include('rwd.layout.header')
<div class="col-lg-6 offset-lg-3">
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
            <a class="btn btn-primary btn-block m-auto" href="{{ route('thankyou')}}">
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
</div>
@include('rwd.layout.footer')
