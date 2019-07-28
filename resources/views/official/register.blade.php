@include('official.layout.header')

<div class="logo-banner text-center">
    <img src=@lang('index.logo-banner') alt="" class="logo-banner-logo">
</div>

<div class="col-lg-6 offset-lg-3">
    <div class="text-center form-control-mnp">
        <h5 class="reg-h5">請以真實資料填寫參賽報名表格</h5>
        <p class="reg-p">請仔細核對資料，若資訊有誤則取消參賽資格</p>
        <hr>
        @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-warning">{{$error}}</div>
            @endforeach
        @endif
    </div>

    @if(session('message'))
        <div class="col-md-8 alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <form id="top_register_form" method="POST" action="{{ url('/register') }}">
        @csrf
        <div class="form-group">
            <select name="area" id="area" class="form-control">
                <option value="台灣">台灣</option>
                <option value="大灣區">大灣區</option>
                <option value="新加坡">新加坡</option>
                <option value="印尼">印尼</option>
                <option value="泰國">泰國</option>
                <option value="越南">越南</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="name" id="name" placeholder="姓名" class="form-control">
            <i class="zmdi zmdi-name"></i>
        </div>
        <div class="form-group">
            <input type="date" name="birthday" id="birthday" placeholder="出生年月日" class="form-control" id="datepicker">
            <i class="zmdi zmdi-date"></i>
        </div>
        <div class="form-group">
            <select name="gender" id="gender" class="form-control">
                <option value="" disabled selected>＊請選擇性別</option>
                <option value="male">男性</option>
                <option value="female">女性</option>
            </select>
            <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
        </div>
        <div class="form-group">
            <input type="text" name="phone" id="phone" placeholder="聯絡手機" class="form-control">
            <i class="zmdi zmdi-phone"></i>
        </div>
        <div class="form-group">
            <input type="text" name="address" id="address" placeholder="聯絡地址" class="form-control">
            <i class="zmdi zmdi-address"></i>
        </div>
        <div class="form-group">
            <input type="mail" name="email" id="email" placeholder="電子郵件" class="form-control">
            <i class="zmdi zmdi-email"></i>
        </div>
        <div class="form-group">
            <input type="text" name="douyin" id="douyin" placeholder="個人抖音網址" class="form-control">
            <i class="zmdi zmdi-label"></i>
        </div>
        <div class="container">
            <h3 align="center">File Uploading in Laravel</h3>
            <br>
            <form action="{{ route('imgupload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <table class="table">
                        <tr>
                            <td width="40%" align="right">
                                <label>Select File for Upload</label>
                            </td>
                            <td width="30">
                                <input type="file" name="fileToUpload[]" id="fileToUpload" multiple/>
                            </td>
                            <td width="30%" align="left">
                                <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" align="right"></td>
                            <td width="30">
                                <span class="text-muted">jpeg, jpg, png, gif</span>
                            </td>
                            <td width="30%" align="left"></td>
                        </tr>
                    </table>
                </div>
            </form>
            <div>
                @if( !empty($medias) )
                    @foreach ($medias as $media)
                        <img src="{{ $media->getUrl() }}">
                    @endforeach
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-danger btn-block btn-lg m-auto">送出資料
            <i class="zmdi zmdi-arrow-right"></i>
        </button>
    </form>

    <div class="err_alert">
        <div class="err_msg">
            部份欄位錯誤，請修改後再送出。

            <div class="option">
                <button id="close_err_msg" type="button" class="btn btn-info"> 關閉 </button>
            </div>
        </div>
    </div>

    <style>
        #top_register_form .form-group.error {
            position: relative;
        }
        #top_register_form .form-group.error::after {
            content: 'error';
            display: block;
            position: absolute;
            top: 50%;
            right: 1.5em;
            color: red;
            font-weight: bolder;
            transform: translateY(-50%);
        }

        .err_alert {
            position: fixed;
            background-color: #00000085;
            height: 100vh;
            width: 100vw;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9000;
        }
        .err_msg {
            background-color: #fff;
            padding: 1rem 2.5rem;
            border-radius: 0.4rem;
            font-size: 1.5rem;
        }
        .err_msg .option {
            display: flex;
            justify-content: flex-end;
            margin-top: 4rem;
        }

        .err_alert:not(.active) {
            display: none;
        }
    </style>
    <script>
        $(function(){
            const pattern = {
                area(val) {
                    return ['台灣', '大灣區', '新加坡', '印尼', '泰國', '越南'].includes(val);
                },
                name(val) {
                    return val.length > 1;
                },
                birthday(val) {
                    return /^\d{4}-\d{2}-\d{2}/.test(val) && !isNaN((new Date(val)).getTime() );
                },
                gender(val) {
                    return ['male', 'female'].includes(val);
                },
                phone(val) {
                    return /^[\d/s-]+$/.test(val);
                },
                address(val) {
                    return val.length > 1;
                },
                email(val) {
                    return /^[\w-_+\.]+@[\w-_]+\.[a-z]{2,}$/.test(val);
                },
                douyin(val) {
                    return /^http\:\/\/.+\.tiktok.com\/.+/.test(val);
                },
            }
            Object.keys( pattern ).forEach( (key) => {
                const el = $(`#${key}`);

                el.on('change', () => {
                    el.parent().removeClass('error');
                });
            } );
            $('#close_err_msg').on('click', () => {
                console.log('close');
                $('.err_alert').removeClass('active');
            });
            $('#top_register_form').on('submit', (event) => {

                const result = Object.keys( pattern ).filter( ( key ) => {
                    const el = $(`#${key}`);
                    el.parent().removeClass('error');
                    return !pattern[key]( el.val() );
                } );

                if( result.length > 0 ) {
                    event.preventDefault();

                    result.forEach( (key) => {
                        console.log( key );
                        const el = $(`#${key}`);
                        el.parent().addClass('error');
                    } );

                    $('.err_alert').addClass('active');

                } else {
                    console.log( 'ok' );
                }
            })
        });
    </script>
</div>

@include('official.layout.footer')
