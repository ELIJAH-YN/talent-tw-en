<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link href="https://cdn.bootcss.com/modern-normalize/0.5.0/modern-normalize.min.css" rel="stylesheet">
    <link href="https://bootswatch.com/4/cyborg/bootstrap.css" rel="stylesheet">
    <link href="https://bootswatch.com/_assets/css/custom.min.css" rel="stylesheet">
    <link href="{{ '/assets/css/style.css' }}" rel="stylesheet">

    <title>全球頂尖紅人對決</title>
</head>
<body>
<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container">
        <a href="../" class="navbar-brand">全球頂尖紅人對決參賽官方網站</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">報名規則</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">開始報名</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container content">
    <div class="row">
        <div class="col-lg-6">
            <div class="bs-component text-center hidden-lg-down">
                <img src="/images/logo.png" class="img-fluid logo">
                <h5>GLOBAL <span class="red">TOP</span> TALENT CONTEST</h5>
                <h5>全球頂尖<span class="red">紅</span>人對決</h5>
                <hr>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="bs-component">
                <hr>
                <h5>參&nbsp;賽&nbsp;規&nbsp;則</h5>
                <dl class="row">
                    <dt class="col-3 text-right">冠軍獎金</dt>
                    <dd class="col-9">新台幣 <span class="red">$1,000,000</span> 與等值獎品.</dd>

                    <dt class="col-3 text-right">報名日期</dt>
                    <dd class="col-9">108年2月20日  至  108年4月1日</dd>

                    <dt class="col-3 text-right">報名資格</dt>
                    <dd class="col-9">年齡18歲以上、男女不拘</dd>
                </dl>

                <hr>
                <h5>參&nbsp;賽&nbsp;須&nbsp;知</h5>
                <dl class="row">
                    <dt class="col-3 text-right">競賽方式</dt>
                    <dd class="col-9">請參賽者上傳15-30秒短影片至 <span class="red">抖音</span> APP</dd>

                    <dt class="col-3 text-right">競賽內容</dt>
                    <dd class="col-9">指定主題為任選各贊助廠商，推出產品宣傳影片</dd>

                    <dt class="col-3 text-right">計分方式</dt>
                    <dd class="col-9">海選內參賽者不限影片數量，以影片愛心數總計為主</dd>

                    <dt class="col-3 text-right">認證方式</dt>
                    <dd class="col-9">以 #hashtag 全球頂尖紅人與贊助品牌為影片計分認證</dd>
                </dl>
                <hr>
                <a href="{{ route('register') }}" class="btn btn-danger btn-block btn-lg m-auto">馬上報名</a>
            </div>
        </div>
    </div>
    <div class="m-5"></div>
</div>

<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/js/bootstrap.js"></script>

<script src="https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.js"></script>
</body>
</html>