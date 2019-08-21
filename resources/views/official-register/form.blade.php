<style>[v-cloak] {display: none;}</style>
<div id="top_register_form" class="content" v-cloak>
    @{{ dict.msg }}
    <form v-on:submit.prevent action="{{ url('/register') }}" ref="register_form">
        @csrf
        <!-- <div class="form-group">
            <select name="area" id="area" class="form-control">
                <option value="台灣">台灣</option>
                <option value="大灣區">大灣區</option>
                <option value="泰國">泰國</option>
                <option value="越南">越南</option>
            </select>
        </div> -->
        <div class="form-group" :class="{error: isNameError}" data-errmsg="必填, 含姓名兩字以上">
            <input type="text" name="name" id="name" placeholder="姓名" class="form-control" v-model="form_data.name">
            <i class="zmdi zmdi-name"></i>
        </div>
        <div class="form-group" :class="{error: isBirthdayError}" data-errmsg="必填">
            <input type="date" name="birthday" id="birthday" placeholder="出生年月日" class="form-control" v-model="form_data.birthday">
            <i class="zmdi zmdi-date"></i>
        </div>
        <div class="form-group" :class="{error: isGenderError}" data-errmsg="必選">
            <select name="gender" id="gender" class="form-control" v-model="form_data.gender">
                <option value="" disabled selected>＊請選擇性別</option>
                <option value="male">男性</option>
                <option value="female">女性</option>
            </select>
            <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
        </div>
        <div class="form-group" :class="{error: isPhoneError}" data-errmsg="必填, 數字10碼">
            <input type="text" name="phone" id="phone" placeholder="聯絡手機" class="form-control" v-model="form_data.phone">
            <i class="zmdi zmdi-phone"></i>
        </div>
        <div class="form-group" :class="{error: isAddressError}" data-errmsg="必填">
            <input type="text" name="address" id="address" placeholder="聯絡地址" class="form-control" v-model="form_data.address">
            <i class="zmdi zmdi-address"></i>
        </div>
        <div class="form-group" :class="{error: isEmailError}" data-errmsg="必填, email格式">
            <input type="email" name="email" id="email" placeholder="電子郵件" class="form-control" v-model="form_data.email">
            <i class="zmdi zmdi-email"></i>
        </div>
        <div class="form-group" :class="{error: isDouyinError}" data-errmsg="必填, 完整抖音網址">
            <input type="text" name="douyin" id="douyin" placeholder="個人抖音連結" class="form-control" v-model="form_data.douyin">
            <i class="zmdi zmdi-label"></i>
        </div>
        <div class="form-group" :class="{error: isFacebookidError}" data-errmsg="必填, 完整臉書網址">
            <input type="text" name="facebookid" id="facebookid" placeholder="個人臉書連結" class="form-control" v-model="form_data.facebookid">
            <i class="zmdi-facebook"></i>
        </div>
        <div class="form-group" :class="{error: isPerformanceError}" data-errmsg="必填">
            <input type="text" name="performance" id="performance" placeholder="專長 (才藝) 描述" class="form-control" v-model="form_data.performance">
        </div>
    {{--                    <div class="form-group">--}}
    {{--                        <input type="file" name="fileToUpload[]" id="fileToUpload" class="form-control" multiple>--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group">--}}
    {{--                        <button class="btn btn-block btn-danger m-auto">上傳 <i class="zmdi zmdi-arrow-right"></i></button>--}}
    {{--                    </div>--}}
        <button type="submit" class="btn btn-danger btn-block btn-lg m-auto" @click="handleSubmit">送出資料
            <i class="zmdi zmdi-arrow-right"></i>
        </button>
    </form>
    <div class="err_alert" :class="{active: show_error_model}">
        <div class="err_msg">
            部份欄位錯誤，請修改後再送出。
        </div>
    </div>
</div>

<script src="assets/lang_dict/register_form/zh.js"></script>
<script src="assets/js/vue.js"></script>
<script>
    const vm = new Vue({
        el: '#top_register_form',
        data() { return {
            lang: 'zh',
            dict,
            form_data: {
                '_token': '',
                name: '',
                birthday: '',
                gender: '',
                phone: '',
                address: '',
                email: '',
                douyin: '',
                facebookid: '',
                performance: '',
            },
            show_error_model: false,
            action_url: "{{ url('/register') }}",
        }},
        computed: {
            isNameError() { return this.form_data.name.length < 2; },
            isBirthdayError() { return !/^\d{4}-\d{2}-\d{2}/.test(this.form_data.birthday) || isNaN(new Date(this.form_data.birthday).getTime()); },
            isGenderError() { return !['male', 'female'].includes(this.form_data.gender); },
            isPhoneError() { return !/^[\d/s-]{10}$/.test(this.form_data.phone); },
            isAddressError() { return this.form_data.address.length < 1; },
            isEmailError() { return !/^[\w-_+\.]+@[\w-_]+(?:\.[a-z]{2,})+$/.test(this.form_data.email); },
            isDouyinError() { return !/^http\:\/\/.+\.tiktok.com\/.+/.test(this.form_data.douyin); },
            isFacebookidError() { return !/^https\:\/\/(?:www\.)?facebook.com\/.+/.test(this.form_data.facebookid); },
            isPerformanceError() { return this.form_data.performance.length < 1; },
            isAllOk() {
                return [
                    this.isNameError,
                    this.isBirthdayError,
                    this.isGenderError,
                    this.isPhoneError,
                    this.isAddressError,
                    this.isEmailError,
                    this.isDouyinError,
                    this.isFacebookidError,
                    this.isPerformanceError
                ].every( val=>!val );
            }
        },
        methods: {
            async handleSubmit() {
                console.log('on submit;');
                // if( !this.isAllOk ) {
                //     this.show_error_model = true;
                //     return 
                // }

                let postResult = {};
                postResult = await fetch( this.action_url, {
                    method: 'POST',
                    body: JSON.stringify(this.form_data)
                });

                console.log('postResult',  postResult.status );

                // console.log('submit ok');
            }
        },
        mounted() {
            this.form_data['_token'] = this.$refs["register_form"].querySelector('[name="_token"]').value;
        }
    });
</script>

<style>
    #top_register_form .form-group.error {
        position: relative;
    }
    #top_register_form .form-group.error::after {
        pointer-events: none;
        content: 'error';
        content: attr(data-errmsg);
        display: block;
        position: absolute;
        top: 50%;
        right: 1.5em;
        color: red;
        font-weight: bolder;
        transform: translateY(-50%);
    }

    .err_msg {
        color: #000;
        background-color: #fff;
        padding: 1rem 2.5rem;
        border-radius: 0.4rem;
        font-size: 1.5rem;
    }

    .err_alert:not(.active) {
        /* display: none; */
        opacity: 0;
    }
</style>