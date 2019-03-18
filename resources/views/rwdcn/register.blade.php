@include('rwdcn.layout.header')
<div class="col-lg-6 offset-lg-3">
    <div class="text-center form-control-mnp">
        <h5>请以真实资料填写参赛报名表格</h5>
        <p>请仔细核对资料，若资讯有误则取消参赛资格</p>
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

    <form method="POST" action="{{ url('/registercn') }}">
        @csrf
        <div class="form-group">
            <select name="area" id="" class="form-control">
                <option value="" disabled selected>＊请选择地区</option>
                <option value="北京">北京</option>
                <option value="上海">上海</option>
                <option value="澳門">澳门</option>
                <option value="杭州">杭州</option>
                <option value="深圳">深圳</option>
                <option value="廣州">广州</option>
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
                <option value="" disabled selected>＊请选择性别</option>
                <option value="male">男性</option>
                <option value="femal">女性</option>
            </select>
            <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
        </div>
        <div class="form-group">
            <input type="text" name="phone" placeholder="联络手机" class="form-control">
            <i class="zmdi zmdi-phone"></i>
        </div>
        <div class="form-group">
            <input type="text" name="address" placeholder="请填写可收通知信的地址" class="form-control">
            <i class="zmdi zmdi-address"></i>
        </div>
        <div class="form-group">
            <input type="text" name="email" placeholder="电子邮件" class="form-control">
            <i class="zmdi zmdi-email"></i>
        </div>
        <div class="form-group">
            <input type="text" name="douyin" placeholder="个人抖音网址" class="form-control">
            <i class="zmdi zmdi-label"></i>
        </div>
        <button type="submit" class="btn-danger btn-block btn-lg">送出资料
            <i class="zmdi zmdi-arrow-right"></i>
        </button>
    </form>
</div>
@include('rwdcn.layout.footer')
