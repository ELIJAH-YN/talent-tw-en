@include('official.layout.header')

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
                <h4 class="register-wrapper-title">請以真實資料填寫參賽報名表格</h4>
                <h5>請仔細核對資料，若資訊有誤則取消參賽資格</h5>
            </header>
            
            @include('official-register.form')
            
            
        </article>
    </div>
</section>



@include('official.layout.footer')
