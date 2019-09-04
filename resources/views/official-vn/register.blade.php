@include('official-vn.layout.header')

<!-- Banner -->
<!--
    Note: To show a background image, set the "data-bg" attribute below
    to the full filename of your image. This is used in each section to set
    the background image.
-->
{{--</section>--}}
<!-- One -->
<section id="one" class="wrapper post bg-img" data-bg="banner-2.jpg">
    <div class="inner">
        <article class="box">
            <div class="content-success">
                @if(Session::has('alert'))
                    <script>
                        var msg = '{{Session::get('alert')}}';
                        var exist = '{{Session::has('alert')}}';
                        if(exist){
                            alert(msg);
                        }
                    </script>
                @endif
                @if(count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-warning">{{$error}}</div>
                    @endforeach
                @endif
            </div>
            <header class="rules-wrapper">
                <h4 class="register-wrapper-title">Vui lòng điền vào mẫu nhập cảnh với thông tin thực tế.</h4>
                <h5>Vui lòng kiểm tra thông tin cẩn thận và hủy bỏ tiêu chuẩn nếu thông tin không chính xác.</h5>
            </header>
            <div class="content">
                <form id="top_register_form" method="POST" action="{{ url('/register-vn') }}">
                    @csrf
                    <div class="form-group">
                        <select name="area" id="area" class="form-control">
                            <option value="越南">Việt nam</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" id="name" placeholder="Tên" class="form-control">
                        <i class="zmdi zmdi-name"></i>
                    </div>
                    <div class="form-group">
                        <input type="date" name="birthday" id="birthday" placeholder="Ngày sinh" class="form-control">
                        <i class="zmdi zmdi-date"></i>
                    </div>
                    <div class="form-group">
                        <select name="gender" id="gender" class="form-control">
                            <option value="" disabled selected>＊Vui lòng chọn giới tính</option>
                            <option value="male">Nam</option>
                            <option value="female">Nữ</option>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" id="phone" placeholder="Điện thoại liên lạc" class="form-control">
                        <i class="zmdi zmdi-phone"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" id="address" placeholder="Địa chỉ liên lạc" class="form-control">
                        <i class="zmdi zmdi-address"></i>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                        <i class="zmdi zmdi-email"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" name="douyin" id="douyin" placeholder="Liên kết TikTok cá nhân" class="form-control">
                        <i class="zmdi zmdi-label"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" name="facebookid" id="facebookid" placeholder="Liên kết Facebook cá nhân" class="form-control">
                        <i class="zmdi-facebook"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" name="performance" id="performance" placeholder="Chuyên môn (tài năng) Mô tả" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-danger btn-block btn-lg m-auto">Gửi thông tin
                        <i class="zmdi zmdi-arrow-right"></i>
                    </button>
                    <div class="content-err">
                </div>
                <div class="err_alert">
                    <div class="err_msg">
                        Một số trường không chính xác. Vui lòng sửa đổi chúng trước khi gửi chúng đi.

                        <div class="option">
                            <button id="close_err_msg" type="button" class="btn btn-info"> Đóng </button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="col-lg-6 offset-lg-3">
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
    <a href="#two" class="more">Learn More</a>
</section>



@include('official-vn.layout.footer')
