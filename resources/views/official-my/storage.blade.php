@include('official-my.layout.header')

<!-- Three -->
<section id="three" class="wrapper post bg-img" data-bg="banner-4.jpg">
    <div class="inner">
        <article class="box col-md-4">
            @if(Session::has('alert'))
                <script>
                    var msg = '{{Session::get('alert')}}';
                    var exist = '{{Session::has('alert')}}';
                    if(exist){
                        alert(msg);
                    }
                </script>
            @endif
            <header class="review-wrapper">
                <h3>初  賽  評  審  規  則</h3>
            </header>
            <div class="content">
                <ul>
                    <li>參賽日期：2019/09/01 - 2019/09/30</li>
                    <li>參賽地點：網路競賽</li>
                    <li>競賽方式：請參賽者上傳15秒短影片至抖音</li>
                    <li>競賽內容：主題為任選各贊助廠商，推出產品宣傳創意影片。</li>
                    <li>計分方式：初賽時間內參賽者不限影片數量，以影片愛心數總計及評審計分。</li>
                    <li>競賽影片認證方式：請hashtag以下全部贊助廠商名稱，#快拍股份有限公司、#晨悅預防醫學、#菲力斯國際、#寶齡富錦生技、#台灣大車隊、#H2O HOTEL、#桃園機場捷運、#創克整合行銷股份有公司、#Juksy、#Qlive、#富士康廣告。</li>
                </ul>
            </div>
            <header class="review-wrapper">
                <h3>複  賽  評  審  規  則</h3>
            </header>
            <div class="content">
                <ul>
                    <li>參賽日期：2019/10/01 - 2019/10/18</li>
                    <li>參賽地點：網路競賽</li>
                    <li>競賽方式：請參賽者上傳15秒短影片至抖音</li>
                    <li>競賽內容：指定主題為單一贊助廠商 ( 2 部影片 ) 與三個部分贊助廠商 ( 各一部 )，推出產品宣傳影片來進行比賽。</li>
                    <li>計分方式：指定時間內參賽者限定上傳五支影片，以影片愛心數總計及評審計分。</li>
                    <li>競賽影片認證方式：請hashtag以下全部贊助廠商名稱，#快拍股份有限公司、#晨悅預防醫學、#菲力斯國際、#寶齡富錦生技、#台灣大車隊、#H2O HOTEL、#桃園機場捷運、#創克整合行銷股份有公司、#Juksy、#Qlive、#富士康廣告。</li>
                </ul>
            </div>
            <header class="review-wrapper">
                <h3>地區決賽評選規則</h3>
            </header>
            <header>
                <h2>RULE</h2>
            </header>
            <div class="content">
                <ul>
                    <li>參賽日期：2019/11/01 - 2019/11/02</li>
                    <li>參賽地點：高雄 H2O HOTEL</li>
                </ul>
            </div>
            <div class="content">
                <ul>
                    <li>第一輪競賽方式：一號早上 30 人依晉級名次排列 PK 選出 15 位人選。</li>
                    <li>第一輪競賽內容：指定主題抖音 / 限定時間 / 愛心數 PK 決勝負。1 號報到後，製作單位統一公佈創作主題現時創作後上架抖音，2 號中午 12 點截止統計愛心數，前 15 名晉級最後決賽。</li>
                </ul>
            </div>
            <div class="content">
                <ul>
                    <li>第二輪競賽方式：15 人依晉級名次排列才藝表演。</li>
                    <li>第二輪競賽內容：公布最後 15 人選後，每人上傳一隻拜票影片至抖音，統計至一定時間後統計數量，評審有 30% 加權分數，分數加總後選出前三名頒發獎盃獎品。</li>
                </ul>
            </div>
            <footer>
                <a href="{{ route('/my') }}" class="button alt">回首頁</a>
            </footer>
        </article>
    </div>
</section>

@include('official-my.layout.footer')
