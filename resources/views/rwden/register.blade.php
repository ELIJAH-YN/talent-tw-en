@include('rwden.layout.header')
<div class="col-lg-6 offset-lg-3">
    <div class="text-center form-control-mnp-en">
        <h5>Please fill in the entry form with real data</h5>
        <p>Please check the data carefully, and you will be disqualified if the data is incorrect</p>
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

    <form method="POST" action="{{ url('/registeren') }}">
        @csrf
        <div class="form-group">
            <select name="area" id="" class="form-control">
                <option value="" disabled selected>＊Select area</option>
                <option value="香港">Hong Kong</option>
                <option value="澳門">Macao</option>
                <option value="新加坡">Singapore</option>
                <option value="馬來西亞">Malaysia</option>
                <option value="泰國">Thailand</option>
                <option value="越南">Vietnam</option>
                <option value="印尼">Indonesia</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="name" placeholder="Name" class="form-control">
            <i class="zmdi zmdi-name"></i>
        </div>
        <div class="form-group">
            <input type="text" name="birthday" placeholder="Date of birth" class="form-control" id="datepicker">
            <i class="zmdi zmdi-date"></i>
        </div>
        <div class="form-group">
            <select name="gender" id="" class="form-control">
                <option value="" disabled selected>＊Select Gender</option>
                <option value="male">Male</option>
                <option value="femal">Femal</option>
            </select>
            <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
        </div>
        <div class="form-group">
            <input type="text" name="phone" placeholder="Phone" class="form-control">
            <i class="zmdi zmdi-phone"></i>
        </div>
        <div class="form-group">
            <input type="text" name="address" placeholder="Address" class="form-control">
            <i class="zmdi zmdi-address"></i>
        </div>
        <div class="form-group">
            <input type="text" name="email" placeholder="Email" class="form-control">
            <i class="zmdi zmdi-email"></i>
        </div>
        <div class="form-group">
            <input type="text" name="douyin" placeholder="Personal TikTok link" class="form-control">
            <i class="zmdi zmdi-label"></i>
        </div>
        <button type="submit" class="btn btn-danger btn-block btn-lg m-auto">Send
            <i class="zmdi zmdi-arrow-right"></i>
        </button>
    </form>
</div>
@include('rwden.layout.footer')
