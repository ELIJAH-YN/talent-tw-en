@include('rwdcn.layout.header')
<div class="col-lg-6 offset-lg-3">
    <div class="text-center form-control-mnp-up">
        <h5>最后请上传参赛者照片</h5>
        <p>全身照、半身照与大头照一张</p>
        <hr>
        <form action="{{ route('uploadcn') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" name="fileToUpload[]" id="fileToUpload" class="form-control" multiple>
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-danger m-auto">上传 <i class="zmdi zmdi-arrow-right"></i></button>
            </div>
            <a class="btn btn-primary btn-block m-auto" href="{{ route('thankyoucn')}}">
                我已确认报名完成
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
@include('rwdcn.layout.footer')
