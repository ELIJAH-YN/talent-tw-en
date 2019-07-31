<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\User;
use Illuminate\Support\Facades\Auth;

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
            return redirect('register')->with('message', '欄位格式錯誤');
        } elseif (!$this->validate($request, [
            'phone' => ['required', 'unique:candidates,phone', 'regex:/^0\d{9}$/'],
        ])) {
            return redirect('register')->with('message', '電話號碼重複');
        } elseif (!$this->validate($request, [
            'email' => ['required', 'unique:users,email', 'regex:/^[\w\-_+\.]+@[\w\-_]+\.[a-z]{2,}$/'],
        ])) {
            return redirect('register')->with('message', '電子信箱格式錯誤！');
        } elseif (!$this->validate($request, [
            'douyin' => ['required', 'unique:candidates,douyin', 'regex:/^http\:\/\/.+\.tiktok\.com\/.+/'],
        ])) {
            return redirect('register')->with('message', '抖音網址格式錯誤！');
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

        return redirect('/')->with('message', '感謝你的報名');
    }

    public function upload(Request $request)
    {
        /*if( ! Auth::check()) return redirect('/');*/

        if (!$request->hasFile('fileToUpload')) {
            $request->session()->flash('message.content', 'Error! Image to large');
            return redirect('/update');
        }

        $file = $request->file('fileToUpload');

        if (empty($file)) {
            $request->session()->flash('message.content', 'Error!');
            return redirect('/update');
        }

        $user = Auth::user();


        if (is_array($file)) {
            $files = $file;
            foreach ($files as $file) {
                $user->addMedia($file->getRealPath())
                    ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
                    ->toMediaCollection();
            }

            return redirect('/')->with('message', '感謝你的報名');
        }

        $user->addMedia($file->getRealPath())
            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection();


        return redirect('/')->with('message', '感謝你的報名');
    }

    public function registeren(Request $request)
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
            return redirect('register')->with('message', '電話號碼重複');
        } elseif (!$this->validate($request, [
            'email' => ['required', 'unique:users,email', 'regex:/^[\w\-_+\.]+@[\w\-_]+\.[a-z]{2,}$/'],
        ])) {
            return redirect('register')->with('message', '電子信箱格式錯誤！');
        } elseif (!$this->validate($request, [
            'douyin' => ['required', 'unique:candidates,douyin', 'regex:/^http\:\/\/.+\.tiktok\.com\/.+/'],
        ])) {
            return redirect('register')->with('message', '抖音網址格式錯誤！');
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

        return view('official-en/upload', compact('medias'));

        /*if(Auth::check())
        {

        }*/

        return redirect('index-en')->with('message', 'Thanks For Registration');
    }

    public function uploaden(Request $request)
    {
        /*if( ! Auth::check()) return redirect('/');*/

        if (!$request->hasFile('fileToUpload')) {
            $request->session()->flash('message.content', 'Error! Image to large');
            return redirect('/update-en');
        }

        $file = $request->file('fileToUpload');

        if (empty($file)) {
            $request->session()->flash('message.content', 'Error!');
            return redirect('/update-en');
        }

        $user = Auth::user();


        if (is_array($file)) {
            $files = $file;
            foreach ($files as $file) {
                $user->addMedia($file->getRealPath())
                    ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
                    ->toMediaCollection();
            }

            return redirect('index-en')->with('message', 'Thanks For Registration');
        }

        $user->addMedia($file->getRealPath())
            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection();


        return redirect('index-en')->with('message', 'Thanks For Registration');
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
