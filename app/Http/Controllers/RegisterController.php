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
        $this->validate($request,[
            /*'password' => 'required',*/
            'name' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required'
        ]);

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
        $candidate->save();

        return redirect('upload');
    }

    public function media()
    {

        $user = Auth::user();
        $medias = $user->getMedia();

        return view('rwd/upload', compact('medias'));

        /*if(Auth::check())
        {

        }*/

        return redirect('/');
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

            return redirect('/update');
        }

        $user->addMedia($file->getRealPath())
            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection();


        return redirect('/update');
    }

    /*================ CN ==================*/

    public function registercn(Request $request)
    {
        $this->validate($request,[
            /*'password' => 'required',*/
            'name' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required'
        ]);

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
        $candidate->save();

        return redirect('uploadcn');
    }

    public function mediacn()
    {

        $user = Auth::user();
        $medias = $user->getMedia();

        return view('uploadcn', compact('medias'));

        /*if(Auth::check())
        {

        }*/

        return redirect('/');
    }

    public function uploadcn(Request $request)
    {
        /*if( ! Auth::check()) return redirect('/');*/

        if (!$request->hasFile('fileToUpload')) {
            $request->session()->flash('message.content', 'Error! Image to large');
            return redirect('uploadcn');
        }

        $file = $request->file('fileToUpload');

        if (empty($file)) {
            $request->session()->flash('message.content', 'Error!');
            return redirect('uploadcn');
        }

        $user = Auth::user();


        if (is_array($file)) {
            $files = $file;
            foreach ($files as $file) {
                $user->addMedia($file->getRealPath())
                    ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
                    ->toMediaCollection();
            }

            return redirect('uploadcn');
        }

        $user->addMedia($file->getRealPath())
            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection();


        return redirect('uploadcn');
    }

    /*================ EN ==================*/

    public function registeren(Request $request)
    {
        $this->validate($request,[
            /*'password' => 'required',*/
            'name' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required'
        ]);

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
        $candidate->save();

        return redirect('uploaden');
    }

    public function mediaen()
    {

        $user = Auth::user();
        $medias = $user->getMedia();

        return view('uploaden', compact('medias'));

        /*if(Auth::check())
        {

        }*/

        return redirect('/');
    }

    public function uploaden(Request $request)
    {
        /*if( ! Auth::check()) return redirect('/');*/

        if (!$request->hasFile('fileToUpload')) {
            $request->session()->flash('message.content', 'Error! Image to large');
            return redirect('uploaden');
        }

        $file = $request->file('fileToUpload');

        if (empty($file)) {
            $request->session()->flash('message.content', 'Error!');
            return redirect('uploaden');
        }

        $user = Auth::user();


        if (is_array($file)) {
            $files = $file;
            foreach ($files as $file) {
                $user->addMedia($file->getRealPath())
                    ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
                    ->toMediaCollection();
            }

            return redirect('uploaden');
        }

        $user->addMedia($file->getRealPath())
            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection();


        return redirect('uploaden');
    }
}
