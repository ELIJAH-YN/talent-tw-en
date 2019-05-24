@include('rwd.layout.header')
<div class="col-lg-6 offset-lg-3">
    <div class="text-center form-control-mnp">
        <h5>請以真實資料填寫參賽報名表格</h5>
        <p>請仔細核對資料，若資訊有誤則取消參賽資格</p>
        <hr>
        @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-warning">{{$error}}</div>
            @endforeach
        @endif
    </div>

    @if(session('response'))
        <div class="col-md-8 alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <div class="form-group">
            <select name="area" id="" class="form-control">
                <option value="台灣">台灣</option>
                <option value="香港">香港</option>
                <option value="澳門">澳門</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="name" placeholder="姓名" class="form-control">
            <i class="zmdi zmdi-name"></i>
        </div>
        <div class="form-group">
            <input type="text" name="birthday" placeholder="出生年月日" class="form-control" id="datepicker">
            <i class="zmdi zmdi-date"></i>
        </div>
        <div class="form-group">
            <select name="gender" id="" class="form-control">
                <option value="" disabled selected>＊請選擇性別</option>
                <option value="male">男性</option>
                <option value="femal">女性</option>
            </select>
            <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
        </div>
        <div class="form-group">
            <input type="text" name="phone" placeholder="聯絡手機" class="form-control">
            <i class="zmdi zmdi-phone"></i>
        </div>
        <div class="form-group">
            <input type="text" name="address" placeholder="請填寫可收通知信的地址" class="form-control">
            <i class="zmdi zmdi-address"></i>
        </div>
        <div class="form-group">
            <input type="text" name="email" placeholder="電子郵件" class="form-control">
            <i class="zmdi zmdi-email"></i>
        </div>
        <div class="form-group">
            <input type="text" name="douyin" placeholder="個人抖音網址" class="form-control">
            <i class="zmdi zmdi-label"></i>
        </div>
        <button type="submit" class="btn btn-danger btn-block btn-lg m-auto">送出資料
            <i class="zmdi zmdi-arrow-right"></i>
        </button>
    </form>
</div>
@include('rwd.layout.footer')
