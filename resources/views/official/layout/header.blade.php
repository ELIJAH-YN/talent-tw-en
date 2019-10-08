<!doctype html>
<html lang="tw">
<head>
    <title>全球頂尖紅人對決官網</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="亞洲網路選秀最高賽事!! 全球頂尖紅人對決Global Top Talent Contest。你身懷十八般武藝,卻沒地方可發揮?你鬼點子特多,朋友卻都冷眼旁觀?每天拍Kuso搞笑影片是你的興趣?">
    <link rel="shortcut icon" sizes="16x16 32x32 48x48 64x64" href="{{ asset('images/Shortcut-Icon/talent-shortcut.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/modern-normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-footer.css') }}">
{{--    <link rel="stylesheet" href="assets/css/from-main.css">--}}
{{--    <link rel="stylesheet" href="assets/css/from-util.css">--}}

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-146160100-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-146160100-1');
    </script>
</head>
<body>
    <!-- Header -->
    <header id="header">
        <div class="logo"><a href="/">全球頂尖 <span>紅人對決大賽</span></a></div>
        <a href="#menu"><span>選單</span></a>
    </header>

    <!-- Nav -->
    <nav id="menu">
        <ul class="links">
            <li><a href="/">首頁</a></li>
            <li><a href="/">報名規則</a></li>
            <li><a href="{{ route('global-talent-registration') }}">前往報名</a></li>
            <li><a href="{{ route('/en') }}">English</a></li>
    </nav>



