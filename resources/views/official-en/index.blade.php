@include('official-en.layout.header')

<!-- Banner -->
<!--
    Note: To show a background image, set the "data-bg" attribute below
    to the full filename of your image. This is used in each section to set
    the background image.
-->
<section id="banner" class="bg-img" data-bg="banner-2.jpg">
    <div class="inner">
        @if(session('alert'))
            <div class="col-md-8 alert alert-success">
                {{session('alert')}}
            </div>
        @endif
    </div>
    <a href="#one" class="more">Learn More</a>
</section>

<!-- One -->
<section id="one" class="wrapper post bg-img" data-bg="banner-2.jpg">
    <div class="inner">
        <article class="box">
            <div class="content-wrapper">
                <p>Global Top Talent Contest (GTTC) is the premier online talent competition sponsored by a renowned online media company Quick Pi based in Taiwan.  The contest  select top 3 talents from each of the 10 cities which include Beijing, Shanghai, Taipei, Wuhan, Chengdu, Hangzhou, Ho Chi Minh City, Bangkok,  Kuala Lumpur, and Hong Kong.  The final competition will be held at Parisian Hotel in Macau December 2019.</p>
            </div>
            <div class="content-wrapper">
                <p>We welcome individuals who are looking for opportunity to demonstrate your unique talents to the world.  Take the chance to and let your talent shine at this exciting competition!!</p>
            </div>
            <header class="rules-wrapper">
                <h3>Overview</h3>
            </header>
            <div class="content">
                <p>
                    1. Open Registration:  8/1/2019 – 8/32/2019<br>
                    2. Qualification: 18 years or older, male or female<br>
                    3. Winner Awards : Champion NT $500,000 equivalent prize and cash.  Second Place NT$300,000 equivalent prize and cash.  Third Place NT$100,000 equivalent prize and cash.<br>
                    4. The results of the competition will be announced at the final competition in Macau.  The results will also be announced on the official Quick-Pi website and Facebook fan club.
                </p>
            </div>
        </article>
    </div>
    <a href="#two" class="more">Learn More</a>
</section>

<!-- Two -->
<section id="two" class="wrapper post bg-img" data-bg="banner-3.jpg">
    <div class="inner">
        <article class="box">
            <header class="rule-title">
                <h2>RULE</h2>
            </header>
            <header class="register-wrapper">
                <h3>Registration Details</h3>
            </header>
            <ul>
                <li>1. All participants must read carefully and agree to the rules and instructions outlined in the registration process.</li>
                <li>2. For the registration and schedule, if you have any questions please contact GTTC by the official email address service@quick-pi.com.</li>
                <li>3. Any delay or changes due to inclement weather and natural disasters, the organizer will announce the changes on the official website.</li>
                <li>4. After successful registration, the official system will automatically send a letter to the participants' mailbox, which contains the tournament instructions and relevant regulations. Participants must pay attention to the official follow-up notice.</li>
                <li>5. All participants must registry online at the official website.  Participants shall fill in the correct personal information according to the specified registration process. ( participants are responsible for any personal rights and interests affected by the incorrect personal data).</li>
            </ul>
            <div class="content">
                <h3>Other Important Matters</h3>
                <p>The organizer shall have the right to adjust the schedule and supplement or revise the contents. The participants shall not have any objection and shall abide by the rules of participation and the assessment of the review. The association reserves the right to collect relevant evidence and take appropriate action in the event of irrational protest (such as insulting the organizer, intent to suspend or hinder the conduct of the competition) and retain the right to legal prosecution.</p>
                <ul>
                    <li>Legal Consultant: Min-Quan Attorneys at Law</li>
                </ul>
            </div>
            <footer>
                <a href="{{  route('en/global-talent-registration') }}" class="button alt">Apply</a>
            </footer>
        </article>
    </div>
    <a href="#three" class="more">Learn More</a>
</section>

<!-- Three -->
<section id="three" class="wrapper post bg-img" data-bg="banner-4.jpg">
    <div class="inner">
        <article class="box col-md-4">
            <header class="review-wrapper">
                <h3>Preliminary Selection</h3>
            </header>
            <div class="content">
                <ul>
                    <li>Date: 9/1/2019 – 9/30/2019</li>
                    <li>Competition Method: Participant post one or many 15-second short video to Tik Tok</li>
                    <li>Certification Mark: Please hashtag all the following sponsor names, #快拍股份有限公司、#晨悅預防醫學、#寶齡富錦生技、#台灣大車隊、#H2O HOTEL、#桃園機場捷運、#創克整合行銷股份有公司、#Juksy、#Qlive、#富士康廣告、#菲力斯國際。</li>
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
                    <li>Certification Mark: Please hashtag all the following sponsor names, #快拍股份有限公司、#晨悅預防醫學、#寶齡富錦生技、#台灣大車隊、#H2O HOTEL、#桃園機場捷運、#創克整合行銷股份有公司、#Juksy、#Qlive、#富士康廣告、#菲力斯國際。</li>
                    <li>Competition Contents:  2 films for main sponsors.  1 film for each of the 3 other sponsors.</li>
                    <li>Scoring Method: By the total number of loves of the films and judge score by 10/31/2019</li>
                </ul>
            </div>
        </article>
    </div>
    <a href="#four" class="more">Learn More</a>
</section>

<!-- Four -->
<section id="four" class="wrapper post bg-img" data-bg="banner-5.jpg">
    <div class="inner">
        <article class="box">
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
        </article>
    </div>
    <a href="#five" class="more">Learn More</a>
</section>

<!-- Five -->
<section id="five" class="wrapper post bg-img" data-bg="banner-6.jpg">
    <div class="inner">
        <div class="bonus-wrapper">
            <div class="bonus-box">
                <h4>1 Million</h4>
                <p>Total prize with prizes</p>
                <div class="bonus-border"></div>
            </div>
            <div class="bonus-box">
                <h4>500 Thousand</h4>
                <p>The champion</p>
                <div class="bonus-border"></div>
            </div>
            <div class="bonus-box">
                <h4>30 Thousand</h4>
                <p>The first runner-up</p>
                <div class="bonus-border"></div>
            </div>
            <div class="bonus-box">
                <h4>20 Thousand</h4>
                <p>The second runner-up</p>
                <div class="bonus-border"></div>
            </div>
        </div>
        <article class="box-1">
            <header>
                <h2>Regional Final Awards</h2>
            </header>
            <ul class="finial-wrapper">
                <li>Regional top 3 finalist awards are:</li><br>
                <li>First Place $NT500,000 equivalent prize and cash.</li>
                <li>Second Place: $NT30,000 equivalent prize and cash.</li>
                <li>Third Place: $NT20,000 equivalent prize and cash.</li><br>
                <li>International Final Competition - The top 3 finalist from each region will compete at Parisian Hotel in Macau</li>
                <li>Date: 12/14</li><br>
                <li>Competition Content:</li>
                <li>The top 3 winners from each region will perform on stage and compete for the  championship. The judge panel will score and comment accordingly. The one with the highest score is the Top Talent Champion.</li>
                <li>Competition Method:  Stage Presentation.  The order of contestant stage presentation is decided by drawing</li>
                <li>Scoring Method: 100% By judge score</li>
            </ul>
            <footer>
                <a href="{{ route('en/global-talent-registration') }}" class="button alt">Apply</a>
            </footer>
        </article>
    </div>
</section>

@include('official-en.layout.footer')
