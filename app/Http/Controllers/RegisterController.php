<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        if (!$this->validate($request,[
            'name' => ['required', 'unique:candidates,name', 'regex:/^[^\d\s]{2,}$/'],
            'birthday' => ['required', 'regex:/^\d{4}\-\d{2}\-\d{2}/'],
            'gender' => ['required', 'regex:/^(male|female)$/'],
            'address' => 'required',
            'email' => 'required',
            'douyin' => 'required',
            'facebookid' => 'required',
            'performance' => 'required',
        ])) {
//            return redirect('register')->back()->withInput();
            return Redirect::to('register')->withInput();
        } elseif (!$this->validate($request, [
            'phone' => ['required', 'unique:candidates,phone', 'regex:/^09\d{8}$/'],
        ])) {
//            return redirect('register')->with('message', '電話號碼重複');
            return Redirect::to('register')->withInput();
        } elseif (!$this->validate($request, [
            'email' => ['required', 'unique:users,email', 'regex:/^[\w\-_+\.]+@[\w\-_]+[\.a-z]{2,}$/'],
        ])) {
//            return redirect('register')->with('message', '電子信箱格式錯誤！');
            return Redirect::to('register')->withInput();
        } elseif (!$this->validate($request, [
            'douyin' => ['required', 'unique:candidates,douyin', 'regex:/^http\:\/\/.+\.tiktok\.com\/.+/'],
        ])) {
//            return redirect('register')->with('message', '抖音網址格式錯誤！');
            return Redirect::to('register')->withInput();
        }

        $user = User::create([
            'name'=> $request->input('name'), 
            'password'=> bcrypt($request->input('password')), 
            'email'=> $request->input('email')]
        );

        Auth::login($user);

        $candidate = new Candidate;
        $candidate->user_id = $user->id;
        $candidate->area = $request->input('area');
        $candidate->name = $request->input('name');
        $candidate->birthday = $request->input('birthday');
        $candidate->gender = $request->input('gender');
        $candidate->phone = $request->input('phone');
        $candidate->address = $request->input('address');
        $candidate->douyin = $request->input('douyin');
        $candidate->facebookid= $request->input('facebookid');
        $candidate->performance = $request->input('performance');
        $candidate->save();

//        return redirect('')->with('alert', '感謝您的報名');

        return redirect('upload');
    }

    public function media()
    {

        $user = Auth::user();
        $medias = $user->getMedia();

        return view('official/upload', compact('medias'));

        /*if(Auth::check())
        {

        }*/

        return redirect('rule')->with('alert', '感謝您的報名');
    }

    public function upload(Request $request)
    {
        /*if( ! Auth::check()) return redirect('/');*/

        if (!$request->hasFile('fileToUpload')) {
            $request->session()->flash('message.content', 'Error! Image to large');
//            return redirect('/update');
            return Redirect::to('update')->withInput();
        }

        $file = $request->file('fileToUpload');

        if (empty($file)) {
            $request->session()->flash('message.content', 'Error!');
//            return redirect('/update');
            return Redirect::to('update')->withInput();
        }

        $user = Auth::user();


        if (is_array($file)) {
            $files = $file;
            foreach ($files as $file) {
                $user->addMedia($file->getRealPath())
                    ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
                    ->toMediaCollection();
            }

            return redirect('rule')->with('alert', '感謝您的報名');
        }

        $user->addMedia($file->getRealPath())
            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection();


        return redirect('rule')->with('alert', '感謝您的報名');
    }

    /* EN Controller */
    public function registeren(Request $request)
    {
        if (!$this->validate($request,[
            'name' => ['required', 'unique:candidates,name', 'regex:/^[^\d]{2,}$/'],
            'birthday' => ['required', 'regex:/^\d{4}\-\d{2}\-\d{2}/'],
            'gender' => ['required', 'regex:/^(male|female)$/'],
            'address' => 'required',
            'email' => 'required',
            'douyin' => 'required',
            'facebookid' => 'required',
            'performance' => 'required',
        ])) {
//            return redirect('register-en')->with('message', '欄位格式錯誤');
            return Redirect::to('register-en')->withInput();
        } elseif (!$this->validate($request, [
            'phone' => ['required', 'unique:candidates,phone', 'regex:/^1\d{9}$/'],
        ])) {
//            return redirect('register-en')->with('message', '電話號碼重複');
            return Redirect::to('register-en')->withInput();
        } elseif (!$this->validate($request, [
            'email' => ['required', 'unique:users,email', 'regex:/^[\w\-_+\.]+@[\w\-_]+\.[a-z]{2,}$/'],
        ])) {
//            return redirect('register-en')->with('message', '電子信箱格式錯誤！');
            return Redirect::to('register-en')->withInput();
        } elseif (!$this->validate($request, [
            'douyin' => ['required', 'unique:candidates,douyin', 'regex:/^http\:\/\/.+\.tiktok\.com\/.+/'],
        ])) {
//            return redirect('register-en')->with('message', '抖音網址格式錯誤！');
            return Redirect::to('register-en')->withInput();
        }

        $user = User::create([
            'name'=> $request->input('name'),
            'password'=> bcrypt($request->input('password')),
            'email'=> $request->input('email')]
        );

        Auth::login($user);

        $candidate = new Candidate;
        $candidate->user_id = $user->id;
        $candidate->area = $request->input('area');
        $candidate->name = $request->input('name');
        $candidate->birthday = $request->input('birthday');
        $candidate->gender = $request->input('gender');
        $candidate->phone = $request->input('phone');
        $candidate->address = $request->input('address');
        $candidate->douyin = $request->input('douyin');
        $candidate->facebookid= $request->input('facebookid');
        $candidate->performance = $request->input('performance');
        $candidate->save();

        return redirect('upload-en');
    }

    public function mediaen()
    {

        $user = Auth::user();
        $medias = $user->getMedia();

        return view('official-en/upload-en', compact('medias'));

        /*if(Auth::check())
        {

        }*/

        return redirect('register-en')->with('alert', 'Thanks Your Apply');
    }

    public function uploaden(Request $request)
    {
        /*if( ! Auth::check()) return redirect('/');*/

        if (!$request->hasFile('fileToUpload')) {
            $request->session()->flash('message.content', 'Error! Image to large');
//            return redirect('update-en');
            return Redirect::to('update-en')->withInput();
        }

        $file = $request->file('fileToUpload');

        if (empty($file)) {
            $request->session()->flash('message.content', 'Error!');
//            return redirect('update-en');
            return Redirect::to('update-en')->withInput();
        }

        $user = Auth::user();


        if (is_array($file)) {
            $files = $file;
            foreach ($files as $file) {
                $user->addMedia($file->getRealPath())
                    ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
                    ->toMediaCollection();
            }

            return redirect('register-en')->with('alert', 'Thanks Your Apply ');
        }

        $user->addMedia($file->getRealPath())
            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection();


        return redirect('register-en')->with('alert', 'Thanks Your Apply');
    }

    public function registerarea(Request $request)
    {
        if (!$this->validate($request,[
            'name' => ['required', 'unique:candidates,name', 'regex:/^[^\d\s]{2,}$/'],
            'birthday' => ['required', 'regex:/^\d{4}\-\d{2}\-\d{2}/'],
            'gender' => ['required', 'regex:/^(male|female)$/'],
            'address' => 'required',
            'email' => 'required',
            'douyin' => 'required',
            'facebookid' => 'required',
            'performance' => 'required',
        ])) {
            return redirect('register')->with('message', '欄位格式錯誤');
        } elseif (!$this->validate($request, [
            'phone' => ['required', 'unique:candidates,phone', 'regex:/^0\d{9}$/'],
        ])) {
            return redirect('register-area')->with('message', '電話號碼重複');
        } elseif (!$this->validate($request, [
            'email' => ['required', 'unique:users,email', 'regex:/^[\w\-_+\.]+@[\w\-_]+\.[a-z]{2,}$/'],
        ])) {
            return redirect('register-area')->with('message', '電子信箱格式錯誤！');
        } elseif (!$this->validate($request, [
            'douyin' => ['required', 'unique:candidates,douyin', 'regex:/^http\:\/\/.+\.tiktok\.com\/.+/'],
        ])) {
            return redirect('register-area')->with('message', '抖音網址格式錯誤！');
        }

        $user = User::create([
            'name'=> $request->input('name'),
            'password'=> bcrypt($request->input('password')),
            'email'=> $request->input('email')]
        );

        Auth::login($user);

        $candidate = new Candidate;
        $candidate->user_id = $user->id;
        $candidate->area = $request->input('area');
        $candidate->name = $request->input('name');
        $candidate->birthday = $request->input('birthday');
        $candidate->gender = $request->input('gender');
        $candidate->phone = $request->input('phone');
        $candidate->address = $request->input('address');
        $candidate->douyin = $request->input('douyin');
        $candidate->facebookid= $request->input('facebookid');
        $candidate->performance = $request->input('performance');
        $candidate->save();

        return redirect('upload-area');
    }

    public function mediaarea()
    {

        $user = Auth::user();
        $medias = $user->getMedia();

        return view('official-area/upload', compact('medias'));

        /*if(Auth::check())
        {

        }*/

        return redirect('register-area')->with('message', '感謝您的報名！');
    }

    public function uploadarea(Request $request)
    {
        /*if( ! Auth::check()) return redirect('/');*/

        if (!$request->hasFile('fileToUpload')) {
            $request->session()->flash('message.content', 'Error! Image to large');
            return redirect('/update-area');
        }

        $file = $request->file('fileToUpload');

        if (empty($file)) {
            $request->session()->flash('message.content', 'Error!');
            return redirect('/update-area');
        }

        $user = Auth::user();


        if (is_array($file)) {
            $files = $file;
            foreach ($files as $file) {
                $user->addMedia($file->getRealPath())
                    ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
                    ->toMediaCollection();
            }

            return redirect('register-area')->with('message', '感謝您的報名！');
        }

        $user->addMedia($file->getRealPath())
            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection();


        return redirect('register-area')->with('message', '感謝您的報名！');
    }

    /* HK-EN */
    public function registerareaen(Request $request)
    {
        if (!$this->validate($request,[
            'name' => ['required', 'unique:candidates,name', 'regex:/^[^\d\s]{2,}$/'],
            'birthday' => ['required', 'regex:/^\d{4}\-\d{2}\-\d{2}/'],
            'gender' => ['required', 'regex:/^(male|female)$/'],
            'address' => 'required',
            'email' => 'required',
            'douyin' => 'required',
            'facebookid' => 'required',
            'performance' => 'required',
        ])) {
            return redirect('register')->with('message', '欄位格式錯誤');
        } elseif (!$this->validate($request, [
            'phone' => ['required', 'unique:candidates,phone', 'regex:/^0\d{9}$/'],
        ])) {
            return redirect('register-area')->with('message', '電話號碼重複');
        } elseif (!$this->validate($request, [
            'email' => ['required', 'unique:users,email', 'regex:/^[\w\-_+\.]+@[\w\-_]+\.[a-z]{2,}$/'],
        ])) {
            return redirect('register-area')->with('message', '電子信箱格式錯誤！');
        } elseif (!$this->validate($request, [
            'douyin' => ['required', 'unique:candidates,douyin', 'regex:/^http\:\/\/.+\.tiktok\.com\/.+/'],
        ])) {
            return redirect('register-area')->with('message', '抖音網址格式錯誤！');
        }

        $user = User::create([
            'name'=> $request->input('name'),
            'password'=> bcrypt($request->input('password')),
            'email'=> $request->input('email')]
        );

        Auth::login($user);

        $candidate = new Candidate;
        $candidate->user_id = $user->id;
        $candidate->area = $request->input('area');
        $candidate->name = $request->input('name');
        $candidate->birthday = $request->input('birthday');
        $candidate->gender = $request->input('gender');
        $candidate->phone = $request->input('phone');
        $candidate->address = $request->input('address');
        $candidate->douyin = $request->input('douyin');
        $candidate->facebookid= $request->input('facebookid');
        $candidate->performance = $request->input('performance');
        $candidate->save();

        return redirect('upload-area-en');
    }

    public function mediaareaen()
    {

        $user = Auth::user();
        $medias = $user->getMedia();

        return view('official-area-en/upload', compact('medias'));

        /*if(Auth::check())
        {

        }*/

        return redirect('register-area-en')->with('message', 'Thanks For Registration！');
    }

    public function uploadareaen(Request $request)
    {
        /*if( ! Auth::check()) return redirect('/');*/

        if (!$request->hasFile('fileToUpload')) {
            $request->session()->flash('message.content', 'Error! Image to large');
            return redirect('/update-area-en');
        }

        $file = $request->file('fileToUpload');

        if (empty($file)) {
            $request->session()->flash('message.content', 'Error!');
            return redirect('/update-area-en');
        }

        $user = Auth::user();


        if (is_array($file)) {
            $files = $file;
            foreach ($files as $file) {
                $user->addMedia($file->getRealPath())
                    ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
                    ->toMediaCollection();
            }

            return redirect('register-area-en')->with('message', 'Thanks For Registration！');
        }

        $user->addMedia($file->getRealPath())
            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection();


        return redirect('register-area-en')->with('message', 'Thanks For Registration！');
    }

    /*          VN-Controller             */

    public function registervn(Request $request)
    {
        if (!$this->validate($request,[
            'name' => ['required', 'unique:candidates,name', 'regex:/^[^\d]{2,}$/'],
            'birthday' => ['required', 'regex:/^\d{4}\-\d{2}\-\d{2}/'],
            'gender' => ['required', 'regex:/^(male|female)$/'],
            'address' => 'required',
            'email' => 'required',
            'douyin' => 'required',
            'facebookid' => 'required',
            'performance' => 'required',
        ])) {
//            return redirect('register')->back()->withInput();
            return Redirect::to('register-vn')->withInput();
        } elseif (!$this->validate($request, [
            'phone' => ['required', 'unique:candidates,phone', 'regex:/^09\d{8}$/'],
        ])) {
//            return redirect('register')->with('message', '電話號碼重複');
            return Redirect::to('register-vn')->withInput();
        } elseif (!$this->validate($request, [
            'email' => ['required', 'unique:users,email', 'regex:/^[\w\-_+\.]+@[\w\-_]+\.[a-z]{2,}$/'],
        ])) {
//            return redirect('register')->with('message', '電子信箱格式錯誤！');
            return Redirect::to('register-vn')->withInput();
        } elseif (!$this->validate($request, [
            'douyin' => ['required', 'unique:candidates,douyin', 'regex:/^http\:\/\/.+\.tiktok\.com\/.+/'],
        ])) {
//            return redirect('register')->with('message', '抖音網址格式錯誤！');
            return Redirect::to('register-vn')->withInput();
        }

        $user = User::create([
                'name'=> $request->input('name'),
                'password'=> bcrypt($request->input('password')),
                'email'=> $request->input('email')]
        );

        Auth::login($user);

        $candidate = new Candidate;
        $candidate->user_id = $user->id;
        $candidate->area = $request->input('area');
        $candidate->name = $request->input('name');
        $candidate->birthday = $request->input('birthday');
        $candidate->gender = $request->input('gender');
        $candidate->phone = $request->input('phone');
        $candidate->address = $request->input('address');
        $candidate->douyin = $request->input('douyin');
        $candidate->facebookid= $request->input('facebookid');
        $candidate->performance = $request->input('performance');
        $candidate->save();

        return redirect('upload-vn');
    }

    public function mediavn()
    {

        $user = Auth::user();
        $medias = $user->getMedia();

        return view('upload-vn', compact('medias'));

        /*if(Auth::check())
        {

        }*/

        return redirect('register-vn')->with('alert', '感謝您的報名');
    }

    public function uploadvn(Request $request)
    {
        /*if( ! Auth::check()) return redirect('/');*/

        if (!$request->hasFile('fileToUpload')) {
            $request->session()->flash('message.content', 'Error! Image to large');
//            return redirect('/update');
            return Redirect::to('update-vn')->withInput();
        }

        $file = $request->file('fileToUpload');

        if (empty($file)) {
            $request->session()->flash('message.content', 'Error!');
//            return redirect('/update');
            return Redirect::to('update-vn')->withInput();
        }

        $user = Auth::user();


        if (is_array($file)) {
            $files = $file;
            foreach ($files as $file) {
                $user->addMedia($file->getRealPath())
                    ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
                    ->toMediaCollection();
            }

            return redirect('register-vn')->with('alert', '感謝您的報名');
        }

        $user->addMedia($file->getRealPath())
            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection();


        return redirect('register-vn')->with('alert', '感謝您的報名');
    }

    /*          Th-Controller             */

    public function registerth(Request $request)
    {
        if (!$this->validate($request,[
            'name' => ['required', 'unique:candidates,name', 'regex:/^[^\d]{2,}$/'],
            'birthday' => ['required', 'regex:/^\d{4}\-\d{2}\-\d{2}/'],
            'gender' => ['required', 'regex:/^(male|female)$/'],
            'address' => 'required',
            'email' => 'required',
            'douyin' => 'required',
            'facebookid' => 'required',
            'performance' => 'required',
        ])) {
//            return redirect('register')->back()->withInput();
            return Redirect::to('register-th')->withInput();
        } elseif (!$this->validate($request, [
            'phone' => ['required', 'unique:candidates,phone', 'regex:/^09\d{8}$/'],
        ])) {
//            return redirect('register')->with('message', '電話號碼重複');
            return Redirect::to('register-th')->withInput();
        } elseif (!$this->validate($request, [
            'email' => ['required', 'unique:users,email', 'regex:/^[\w\-_+\.]+@[\w\-_]+\.[a-z]{2,}$/'],
        ])) {
//            return redirect('register')->with('message', '電子信箱格式錯誤！');
            return Redirect::to('register-th')->withInput();
        } elseif (!$this->validate($request, [
            'douyin' => ['required', 'unique:candidates,douyin', 'regex:/^http\:\/\/.+\.tiktok\.com\/.+/'],
        ])) {
//            return redirect('register')->with('message', '抖音網址格式錯誤！');
            return Redirect::to('register-th')->withInput();
        }

        $user = User::create([
                'name'=> $request->input('name'),
                'password'=> bcrypt($request->input('password')),
                'email'=> $request->input('email')]
        );

        Auth::login($user);

        $candidate = new Candidate;
        $candidate->user_id = $user->id;
        $candidate->area = $request->input('area');
        $candidate->name = $request->input('name');
        $candidate->birthday = $request->input('birthday');
        $candidate->gender = $request->input('gender');
        $candidate->phone = $request->input('phone');
        $candidate->address = $request->input('address');
        $candidate->douyin = $request->input('douyin');
        $candidate->facebookid= $request->input('facebookid');
        $candidate->performance = $request->input('performance');
        $candidate->save();

        return redirect('upload-th');
    }

    public function mediath()
    {

        $user = Auth::user();
        $medias = $user->getMedia();

        return view('upload-th', compact('medias'));

        /*if(Auth::check())
        {

        }*/

        return redirect('register-th')->with('alert', '感謝您的報名');
    }

    public function uploadth(Request $request)
    {
        /*if( ! Auth::check()) return redirect('/');*/

        if (!$request->hasFile('fileToUpload')) {
            $request->session()->flash('message.content', 'Error! Image to large');
//            return redirect('/update');
            return Redirect::to('update-th')->withInput();
        }

        $file = $request->file('fileToUpload');

        if (empty($file)) {
            $request->session()->flash('message.content', 'Error!');
//            return redirect('/update');
            return Redirect::to('update-th')->withInput();
        }

        $user = Auth::user();


        if (is_array($file)) {
            $files = $file;
            foreach ($files as $file) {
                $user->addMedia($file->getRealPath())
                    ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
                    ->toMediaCollection();
            }

            return redirect('register-th')->with('alert', '感謝您的報名');
        }

        $user->addMedia($file->getRealPath())
            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection();


        return redirect('register-th')->with('alert', '感謝您的報名');
    }

//
//    /*================ EN ==================*/
//
//    public function registeren(Request $request)
//    {
//        $this->validate($request,[
//            /*'password' => 'required',*/
//            'name' => 'required',
//            'birthday' => 'required',
//            'gender' => 'required',
//            'phone' => 'required',
//            'address' => 'required',
//            'email' => 'required'
//        ]);
//
//        $user = User::create([
//                'name'=> $request->input('name'),
//                'password'=> bcrypt($request->input('password')),
//                'email'=> $request->input('email')]
//        );
//
//        Auth::login($user);
//
//        $candidate = new Candidate;
//        $candidate->user_id = $user->id;
//        $candidate->area = $request->input('area');
//        $candidate->name = $request->input('name');
//        $candidate->birthday = $request->input('birthday');
//        $candidate->gender = $request->input('gender');
//        $candidate->phone = $request->input('phone');
//        $candidate->address = $request->input('address');
//        $candidate->douyin = $request->input('douyin');
//        $candidate->save();
//
//        return redirect('uploaden');
//    }
//
//    public function mediaen()
//    {
//
//        $user = Auth::user();
//        $medias = $user->getMedia();
//
//        return view('uploaden', compact('medias'));
//
//        /*if(Auth::check())
//        {
//
//        }*/
//
//        return redirect('/');
//    }
//
//    public function uploaden(Request $request)
//    {
//        /*if( ! Auth::check()) return redirect('/');*/
//
//        if (!$request->hasFile('fileToUpload')) {
//            $request->session()->flash('message.content', 'Error! Image to large');
//            return redirect('uploaden');
//        }
//
//        $file = $request->file('fileToUpload');
//
//        if (empty($file)) {
//            $request->session()->flash('message.content', 'Error!');
//            return redirect('uploaden');
//        }
//
//        $user = Auth::user();
//
//
//        if (is_array($file)) {
//            $files = $file;
//            foreach ($files as $file) {
//                $user->addMedia($file->getRealPath())
//                    ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
//                    ->toMediaCollection();
//            }
//
//            return redirect('uploaden');
//        }
//
//        $user->addMedia($file->getRealPath())
//            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
//            ->toMediaCollection();
//
//
//        return redirect('uploaden');
//    }
}
