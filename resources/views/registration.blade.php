@include('netred.header')
<script type="text/javescript" src="{{ url('https://code.jquery.com/jquery-1.12.4.js') }}"></script>
<script type="text/javascript" src="{{ url('https://code.jquery.com/ui/1.12.1/jquery-ui.js') }}  "></script>

<div class="container">
        <div class="wrapper" style="background-image:url({{url('images/picture_3.jpg')}})
        ">
                <div class="inner">
                    <div class="image-holder">
                    </div>
                    <form method="POST" action="{{ url('/register') }}">
                        @csrf
                        <h3>參&nbsp;賽&nbsp;報&nbsp;名</h3>
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
                        <!--<div class="form-wrapper">
                            <input type="text" name="accont" placeholder="帳號" class="form-control">
                            <i class="zmdi zmdi-accont">
                        </div>
                        <div class="form-wrapper">
                            <input type="password" name="password" placeholder="密碼" class="form-control">
                            <i class="zmdi zmdi-password">
                        </div>-->
                        <div class="form-wrapper">
                            <input type="text" name="name" placeholder="姓名" class="form-control">
                            <i class="zmdi zmdi-name"></i>
                        </div>
                        <div class="form-wrapper">
                            <input type="text" name="birthday" placeholder="出生年月日" class="form-control" id="datepicker">
                            <i class="zmdi zmdi-date">
                        </div>
                        <div class="form-wrapper">
                            <select name="gender" id="" class="form-control">
                                <option value="" disabled selected>性別</option>
                                <option value="male">男性</option>
                                <option value="femal">女性</option>
                            </select>
                            <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        </div>
                        <div class="form-wrapper">
                            <input type="text" name="phone" placeholder="電話" class="form-control">
                            <i class="zmdi zmdi-phone"></i>
                        </div>
                        <div class="form-wrapper">
                            <input type="text" name="roc" placeholder="身分證" class="form-control">
                            <i class="zmdi zmdi-roc"></i>
                        </div> 
                        <div class="form-group">
                            <input type="text" name="weight" placeholder="身高" class="form-control">
                            <input type="text" name="body_weight" placeholder="體重" class="form-control">
                            <i class="zmdi zmdi-weight">
                        </div>
                        <div class="form-wrapper">
                            <input type="text" name="address" placeholder="地址" class="form-control">
                            <i class="zmdi zmdi-address"></i>
                        </div>
                        <div class="form-wrapper">
                            <input type="text" name="email" placeholder="電子郵件" class="form-control">
                            <i class="zmdi zmdi-email"></i>
                        </div>
                        <div class="image-holder">
                        </div>
                        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-wrapper">
                                <h3>請上傳參賽者照片</h3>
                            </div>
                            <div class="form-wrapper">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                            <!--<button>上傳 <i class="zmdi zmdi-arrow-right"></i></button>-->
                            <button>送出資料
                                <i class="zmdi zmdi-arrow-right"></i>
                            </button>
                        </form>
                    </form>
                </div>
        </div>
    
</div>

@include('netred.footer')