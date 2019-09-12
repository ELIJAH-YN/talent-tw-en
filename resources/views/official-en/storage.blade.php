@include('official-en.layout.header')

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
                <h3>Preliminary Selection</h3>
            </header>
            <div class="content">
                <ul>
                    <li>Date: 9/1/2019 – 9/30/2019</li>
                    <li>Competition Method: Participant post one or many 15-second short video to Tik Tok</li>
                    <li>Certification Mark: Please hashtag all the following sponsor names, #快拍股份有限公司、#晨悅預防醫學、#菲力斯國際、#H2OHOTEL、#桃園機場捷運、#台灣大車隊、#寶齡富錦生技、#富士康廣告、#創克整合行銷、#Juksy、#Qlive、#好事連播網、＃宅宅新聞、＃國王汽車、＃易珈生技、#原綺醫美集團。</li>
                    <li>Competition Contents: Creative commercial video for any product of GTTC sponsors.</li>
                    <li>Scoring Method: By the total number of loves of the films and judge score by 9/30/2019</li>
                </ul>
            </div>
            <header class="review-wrapper">
                <h3>Second Round Selection</h3>
            </header>
            <div class="content">
                <ul>
                    <li>Date: 10/1/2019 – 10/18/2019</li>
                    <li>Competition Method: Participant post five 15-second short video to Tik Tok</li>
                    <li>Certification Mark: Please hashtag all the following sponsor names, #快拍股份有限公司、#晨悅預防醫學、#菲力斯國際、#H2OHOTEL、#桃園機場捷運、#台灣大車隊、#寶齡富錦生技、#富士康廣告、#創克整合行銷、#Juksy、#Qlive、#好事連播網、＃宅宅新聞、＃國王汽車、＃易珈生技、#原綺醫美集團。</li>
                    <li>Competition Contents:  2 films for main sponsors.  1 film for each of the 3 other sponsors.</li>
                    <li>Scoring Method: By the total number of loves of the films and judge score by 10/31/2019</li>
                </ul>
            </div>
            <header class="area-review-wrapper">
                <h3>Regional Final Selection</h3>
            </header>
            <header>
                <h2>RULE</h2>
            </header>
            <div class="content">
                <ul>
                    <li>Date: 11/1/2019 – 11/2/2019</li>
                    <li>Competition Method: 2  PK rounds at a Location to be announced by GTTC. The regional top 3 finalist will be announced at the end of Regional Final.</li>
                </ul>
            </div>
            <div class="content">
                <ul>
                    <li>Regional Final PK Round I: 30 Participants compete according to the ranking. 15 participants will be selected at the end of round 1.</li>
                    <li>Competition content: Day one,a topic will be given by the GTTC.</li>
                    <li>Competition Method:  Contestants create the video on site with limited time.  Contestants upload the video to Tik Tok to be scored.</li>
                    <li>Certification Mark: hashtag global top talent contest(＃GTTC) and the sponsor brand name as the film score certification mark.</li>
                    <li>Scoring Method:  By the total number of loves of the films and judge score by noon next day.</li><br>
                </ul>
            </div>
            <div class="content">
                <ul>
                    <li>Regional Final Pk Round 2:  15 PK round 1 winner perform the talent by ranking order. 3 regional finalist will be selected</li>
                    <li>Competition content:  A self-promotion video and stage presentation.</li>
                    <li>Competition Method:  Uploading  the self-promotion to Tik Tok and stage prenstation</li>
                    <li>Certification Mark: hashtag global top talent contest(＃GTTC) and the sponsor brand name as the film score certification mark.</li>
                    <li>Scoring Method:  GTTC will calculate the result within a limited period(TBD) .  The 70% of the score is decided by loves of the video and remaining 30% by judge score.</li>
                </ul>
            </div>
            <footer>
                <a href="{{ route('/en') }}" class="button alt">Home</a>
            </footer>
        </article>
    </div>
</section>

@include('official-en.layout.footer')
