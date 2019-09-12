@include('official-vn.layout.header')

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
                <h3>Đánh giá bầu chọn vòng loại</h3>
            </header>
            <div class="content">
                <ul>
                    <li>Ngày tham gia thi đấu: 15/09/2019 -30/09/2019</li>
                    <li>Địa điểm tham gia thi đấu: Cạnh tranh trên mạng</li>
                    <li>Phương thức thi: Yêu cầu người tham gia cuộc thi tải lên Tik Tok một đoạn phim ngắn 15 giây.</li>
                    <li>Nội dung thi: Chủ đề là tùy ý chọn  các Nhà tài trợ, tạo dựng đoạn phim sáng tạo tuyên truyền ra mắt sản phẩm.</li>
                    <li>Phương thức tính điểm: Trong thời gian của vòng loại, người tham gia cuộc thi không hạn chế số lượng đoạn phim, tính điểm theo tổng số trái tim và đánh giá đoạn phim.</li>
                    <li>Phương thức chứng nhận đoạn phim cạnh tranh: Danh sách hashtag Nhà tài trợ，#快拍股份有限公司、#晨悅預防醫學、#菲力斯國際、#H2OHOTEL、#桃園機場捷運、#台灣大車隊、#寶齡富錦生技、#富士康廣告、#創克整合行銷、#Juksy、#Qlive、#好事連播網、＃宅宅新聞、＃國王汽車、＃易珈生技、#原綺醫美集團。</li>
                </ul>
            </div>
            <header class="review-wrapper">
                <h3>Đánh giá bầu chọn vòng giữa</h3>
            </header>
            <div class="content">
                <ul>
                    <li>Ngày tham gia thi đấu: 01/10/2019 – 18/10/2019</li>
                    <li>Địa điểm tham gia thi đấu: Cạnh tranh trên mạng</li>
                    <li>Phương thức thi: Yêu cầu người tham gia cuộc thi tải lên Tik Tok một đoạn phim ngắn 15 giây.</li>
                    <li>Nội dung thi: Chỉ định chủ đề là một Nhà tài trợ đơn nhất (2 đoạn phim) và 3 phần Nhà tài trợ (mỗi phần 1 đoạn phim), tạo dựng đoạn phim tuyên truyền ra mắt sản phẩm để tiến hành cuộc thi.</li>
                    <li>Phương thức tính điểm: Trong thời gian chỉ định, người tham gia cuộc thi giới hạn tải lên 5 đoạn phim, tính điểm theo tổng số trái tim và đánh giá đoạn phim.</li>
                    <li>Phương thức chứng nhận đoạn phim cạnh tranh: Danh sách hashtag Nhà tài trợ，#快拍股份有限公司、#晨悅預防醫學、#菲力斯國際、#H2OHOTEL、#桃園機場捷運、#台灣大車隊、#寶齡富錦生技、#富士康廣告、#創克整合行銷、#Juksy、#Qlive、#好事連播網、＃宅宅新聞、＃國王汽車、＃易珈生技、#原綺醫美集團。</li>
                </ul>
            </div>
            <header class="area-review-wrapper">
                <h3>Đánh giá bầu chọn vòng chung kết khu vực</h3>
            </header>
            <header>
                <h2>RULE</h2>
            </header>
            <div class="content">
                <ul>
                    <li>Ngày tham gia thi đấu: 15/11/2019 – 16/11/2019</li>
                    <li>Địa điểm tham gia thi đấu: Đơn vị tổ chức sẽ thông báo cho người tham gia cuộc thi theo kết quả đánh giá bầu chọn</li>
                </ul>
            </div>
            <div class="content">
                <ul>
                    <li>Phương thức cạnh tranh vòng 1: Số 1 buổi sáng sắp xếp thứ tự 30 người theo cấp bậc PK chọn ra 15 người.</li>
                    <li>Nội dung cạnh tranh vòng 1: Chỉ định chủ đề Tik Tok / giới hạn thời gian / số trái tim PK quyết định thắng thua. Sau khi số 1 đăng ký có mặt, Đơn vị sản xuất thống nhất công bố chủ để sáng tác và sau đó sáng tác tại chỗ tải lên Tik Tok, số 2 buổi trưa 12 giờ kết thúc thống kê số trái tim, vòng chung kết cuối cùng cho top 15 người đứng đầu.</li>
                </ul>
            </div>
            <div class="content">
                <ul>
                    <li>Phương thức cạnh tranh vòng 2: Sắp xếp thứ tự 15 người theo cấp bậc biểu diễn tài năng văn nghệ</li>
                    <li>cạnh tranh vòng 2: Sau khi công bố 15 người cuối cùng, mỗi người tải lên Tik Tok 1 đoạn phim chào hàng bỏ phiếu cho mình, sau khi thống kê đến thời gian nhât định sẽ thống kê số lượng, đánh giá của Ban giám khảo có 30% quyền thêm số điểm, sau khi tổng cộng điểm số chọn ra top 3 người đứng đầu và trao giải thưởng phần thưởng.</li>
                </ul>
            </div>
            <footer>
                <a href="{{ route('/vn') }}" class="button alt">Trở về nhà</a>
            </footer>
        </article>
    </div>
    {{--    <a href="#four" class="more">Learn More</a>--}}
</section>

@include('official-vn.layout.footer')
