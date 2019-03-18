@include('rwden.layout.header')
<div class="col-lg-6 offset-lg-3">
    <div class="text-center">
        <h5>Finally, please upload the photo of the contestant.</h5>
        <p>Full body photo, half body photo and big photo.</p>
        <hr>
        <form action="{{ route('uploaden') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" name="fileToUpload[]" id="fileToUpload" class="form-control" multiple>
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-danger m-auto">upload<i class="zmdi zmdi-arrow-right"></i></button>
            </div>
            <a class="btn btn-primary btn-block m-auto" href="{{ route('thankyouen')}}">
                Finish
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
@include('rwden.layout.footer')
