<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link href="https://cdn.bootcss.com/modern-normalize/0.5.0/modern-normalize.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('css_home/style.css')}}" rel="stylesheet">

    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
    <title>全球的頂尖紅人對決 參賽規則</title>
</head>
<body>
        <div class="container">
                <div class="wrapper">
                        <div class="inner">
                            <div class="image-holder">
                            </div>
                            <form method="POST" action="{{ url('/register') }}">
                                @csrf
                                <h3>參&nbsp;賽&nbsp;規&nbsp;則</h3>
                                <br>
                                比賽獎金：冠軍獎金 新台幣$1,000,000 與等值獎品<br>
                                <br>
                                報名資格：年齡18歲以上、男女不拘<br>
                                <br>
                                報名日期：108年2月20日  至  108年4月1日<br>
                                <br>
                                <br>
                                <br>
                                參賽須知：<br>
                                <br>
                                1. 競賽方式 : 請參賽者上傳15-30秒短影片至抖音。<br>
                                <br>
                                2. 競賽內容 : <br>
                                指定主題為任選各贊助廠商，推出產品宣傳影片。
                                <br>
                                <br>
                                3. 計分方式 : <br>
                                海選內參賽者不限影片數量，以影片愛心數總計為主。<br>
                                <br>
                                4. 競賽影片認證方式：<br>
                                以hashtag全球頂尖紅人與贊助品牌為影片計分認證。<br>
                                <br>
                                <button><a href="{{ route('register')}}" style="color:#fff; text-decoration:none">前往報名！ <i class="zmdi zmdi-arrow-right"></i></a></button>
                            </form>
                        </div>
                </div>
            
        </div>
        
</body>
</html>