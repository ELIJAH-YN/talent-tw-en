@include('rwd.layout.header')

<h5>參&nbsp;賽&nbsp;表&nbsp;格</h5>
<hr>
@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
@endif

@if(session('response'))
    <div class="col-md-8 alert alert-success">
        {{session('success')}}
    </div>
@endif
                    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-wrapper">
                            <h3>請上傳參賽者照片</h3>
                        </div>
                        <div class="form-wrapper">
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                        <button>上傳 <i class="zmdi zmdi-arrow-right"></i></button>
                        <button><a href="{{ route('thankyou')}}" style="color:#fff; text-decoration:none">報名完成 <i class="zmdi zmdi-arrow-right"></i></a></button>
                    </form>        
                </div>
                <div>
                        @foreach ($medias as $media)
                        <img src="{{ $media->getUrl() }}" >
                        @endforeach 
                </div>
        </div>
    </div>
</body>
</html>
