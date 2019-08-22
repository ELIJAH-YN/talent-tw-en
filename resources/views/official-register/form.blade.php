<style>[v-cloak] {display: none;}</style>
<div id="top_register_form" class="content" :lang="[lang]" v-cloak>
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
        <div class="form-group" :class="{error: isNameError}" :data-errmsg="dict.form_field.name.errMsg">
            <input type="text" name="name" id="name" :placeholder="dict.form_field.name.plceholder" class="form-control" v-model="form_data.name">
            <i class="zmdi zmdi-name"></i>
        </div>
        <div class="form-group" :class="{error: isBirthdayError}" :data-errmsg="dict.require">
            <input type="date" name="birthday" id="birthday" :placeholder="dict.form_field.birthday.plceholder" class="form-control" v-model="form_data.birthday">
            <i class="zmdi zmdi-date"></i>
        </div>
        <div class="form-group" :class="{error: isGenderError}" :data-errmsg="dict.require">
            <select name="gender" id="gender" class="form-control" v-model="form_data.gender">
                <option value="" disabled selected> @{{ dict.form_field.gender.pleaseSelect }}  </option>
                <option value="male"> @{{ dict.form_field.gender.male }} </option>
                <option value="female"> @{{ dict.form_field.gender.female }} </option>
            </select>
            <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
        </div>
        <div class="form-group" :class="{error: isPhoneError}" :data-errmsg="dict.form_field.phone.errMsg">
            <input type="text" name="phone" id="phone" :placeholder="dict.form_field.phone.plceholder" class="form-control" v-model="form_data.phone">
            <i class="zmdi zmdi-phone"></i>
        </div>
        <div class="form-group" :class="{error: isAddressError}" :data-errmsg="dict.require">
            <input type="text" name="address" id="address" :placeholder="dict.form_field.address.plceholder" class="form-control" v-model="form_data.address">
            <i class="zmdi zmdi-address"></i>
        </div>
        <div class="form-group" :class="{error: isEmailError}" :data-errmsg="dict.form_field.email.errMsg">
            <input type="email" name="email" id="email" :placeholder="dict.form_field.email.plceholder" class="form-control" v-model="form_data.email">
            <i class="zmdi zmdi-email"></i>
        </div>
        <div class="form-group" :class="{error: isDouyinError}" :data-errmsg="dict.form_field.douyin.errMsg">
            <input type="text" name="douyin" id="douyin" :placeholder="dict.form_field.douyin.plceholder" class="form-control" v-model="form_data.douyin">
            <i class="zmdi zmdi-label"></i>
        </div>
        <div class="form-group" :class="{error: isFacebookidError}" :data-errmsg="dict.form_field.facebookid.errMsg">
            <input type="text" name="facebookid" id="facebookid" :placeholder="dict.form_field.facebookid.plceholder" class="form-control" v-model="form_data.facebookid">
            <i class="zmdi-facebook"></i>
        </div>
        <div class="form-group" :class="{error: isPerformanceError}" :data-errmsg="dict.require">
            <input type="text" name="performance" id="performance" :placeholder="dict.form_field.performance.plceholder" class="form-control" v-model="form_data.performance">
        </div>
        <div class="form-group" :class="{error: isPhotoError}" :data-errmsg="dict.require">
            <div class="fakeinput" @click="$refs['photo'].click()"> @{{ isPhotoError? dict.form_field.photo.unselect : dict.form_field.photo.selected  }} </div>
            <input type="file" name="photo[]" id="photo" class="form-control" multiple @change="processFile" ref="photo">
        </div>
    {{--                    <div class="form-group">--}}
    {{--                        <button class="btn btn-block btn-danger m-auto">上傳 <i class="zmdi zmdi-arrow-right"></i></button>--}}
    {{--                    </div>--}}
        <button type="submit" class="btn btn-danger btn-block btn-lg m-auto" @click="handleSubmit"> @{{ dict.form_field.submit.send_text }}
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
                photo: false
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
            isPhotoError() { return !this.form_data.photo; },
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
                    this.isPerformanceError,
                    this.isPhotoError
                ].every( val=>!val );
            }
        },
        methods: {
            processFile(event) {
                this.form_data.photo = event.target.files[0]
            },
            async handleSubmit() {
                console.log('on submit;');
                // if( !this.isAllOk ) {
                //     this.show_error_model = true;
                //     return 
                // }
                    
                const fd = new FormData();
                Object.keys(this.form_data).forEach( fieldName => {
                    console.log('fieldName', fieldName);
                    fd.append(fieldName, this.form_data[fieldName]);
                });

                console.log('postResult',  fd );
                let postResult = {};
                postResult = await fetch( this.action_url, {
                    method: 'POST',
                    body: fd
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
    .form-group .fakeinput {
        text-align: left;
        border: solid 1px;
        background: rgba(144, 144, 144, 0.075);
        border-color: rgba(144, 144, 144, 0.25);
        height: 2.75em;
        padding: 0.4em 1em;
    }
    .form-group .fakeinput+input {
        display: none;
    }
    .form-group.error {
        position: relative;
    }
    .form-group.error::after {
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