@include('official-th.layout.header')

<!-- Banner -->
<!--
    Note: To show a background image, set the "data-bg" attribute below
    to the full filename of your image. This is used in each section to set
    the background image.
-->
{{--<section id="banner" class="bg-img" data-bg="banner-1.jpg">--}}
{{--    <div class="inner">--}}
{{--    </div>--}}
{{--    <a href="#one" class="more">Learn More</a>--}}
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
                <h4 class="register-wrapper-title">กรุณากรอกแบบฟอร์มการสมัครพร้อมข้อมูลจริง</h4>
                <h5>โปรดตรวจสอบข้อมูลอย่างระมัดระวังและยกเลิกการรับรองหากข้อมูลไม่ถูกต้อง</h5>
            </header>
            <div class="content">
                <form id="top_register_form" method="POST" action="{{ url('/register-th') }}">
                    @csrf
                    <div class="form-group">
                        <select name="area" id="area" class="form-control">
                            <option value="泰國">ประเทศไทย</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" id="name" placeholder="ชื่อเต็ม" class="form-control">
                        <i class="zmdi zmdi-name"></i>
                    </div>
                    <div class="form-group">
                        <input type="date" name="birthday" id="birthday" placeholder="วันเดือนปีเกิด" class="form-control">
                        <i class="zmdi zmdi-date"></i>
                    </div>
                    <div class="form-group">
                        <select name="gender" id="gender" class="form-control">
                            <option value="" disabled selected>＊กรุณาเลือกเพศ</option>
                            <option value="male">ชาย</option>
                            <option value="female">เพศหญิง</option>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" id="phone" placeholder="โทรศัพท์ติดต่อ" class="form-control">
                        <i class="zmdi zmdi-phone"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" id="address" placeholder="ที่อยู่ติดต่อ" class="form-control">
                        <i class="zmdi zmdi-address"></i>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="E-mail" class="form-control">
                        <i class="zmdi zmdi-email"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" name="douyin" id="douyin" placeholder="ลิงก์ TikTok ส่วนตัว" class="form-control">
                        <i class="zmdi zmdi-label"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" name="facebookid" id="facebookid" placeholder="ลิงก์ Facebook ส่วนตัว" class="form-control">
                        <i class="zmdi-facebook"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" name="performance" id="performance" placeholder="ความเชี่ยวชาญ (ความสามารถ) คำอธิบาย" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-danger btn-block btn-lg m-auto">ส่งข้อมูล
                        <i class="zmdi zmdi-arrow-right"></i>
                    </button>
                    <div class="content-err">
                </div>
                <div class="err_alert">
                    <div class="err_msg">
                        ฟิลด์บางฟิลด์ไม่ถูกต้องโปรดแก้ไขก่อนที่จะส่งออก

                        <div class="option">
                            <button id="close_err_msg" type="button" class="btn btn-info"> ใกล้ </button>
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



@include('official-th.layout.footer')
