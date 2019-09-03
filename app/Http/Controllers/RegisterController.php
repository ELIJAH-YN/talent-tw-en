<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        if (!$this->validate($request,[
            'name' => [
                'required',
                'unique:candidates,name',
                'regex:/^[^\d\s]{2,}$/'
            ],
            'birthday' => [
                'required',
                'regex:/^\d{4}\-\d{2}\-\d{2}/'
            ],
            'gender' => [
                'required',
                'regex:/^(male|female)$/'
            ],
            'address' => 'required',
            'email' => 'required',
            'douyin' => 'required',
            'facebookid' => 'required',
            'performance' => 'required',
        ])) {
            return Redirect::to('global-talent-registration')->withInput();
        } elseif (!$this->validate($request, [
            'phone' => [
                'required',
                'unique:candidates,phone',
                'regex:/^09\d{8}$/'
            ],
        ])) {
            return Redirect::to('global-talent-registration')->withInput();
        } elseif (!$this->validate($request, [
            'email' => [
                'required',
                'unique:users,email',
                'regex:/^[\w\-_+\.]+@[\w\-_]+[\.a-z]{2,}$/'
            ],
        ])) {
            return Redirect::to('global-talent-registration')->withInput();
        } elseif (!$this->validate($request, [
            'douyin' => [
                'required',
                'unique:candidates,douyin',
                'regex:/^http\:\/\/.+\.tiktok\.com\/.+/'
            ],
        ])) {
            return Redirect::to('global-talent-registration')->withInput();
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

        return redirect('global-talent-upload');
    }
/*             Read Destroy              */
    public function getData() {
        $candidates = Candidate::all();
        return view('getdb', compact('candidates'));
    }

    public function getUser() {
        $users = User::all();
        return view('getuser', compact('users'));
    }

    public function destroy($id) {
        DB::table('candidates')->where('id', $id)->delete();
        return redirect('getdb')->with('success', 'Stock has been deleted Successfully!');
    }

    public function destroyuser($id) {
        DB::table('users')->where('id', $id)->delete();
        return redirect('getuser')->with('success', 'Stock has been deleted Successfully!');
    }

    public function media()
    {
        $user = Auth::user();
        $medias = $user->getMedia();
        return view('global-talent-upload', compact('medias'));

        /*if(Auth::check())
        {

        }*/
    }

    public function upload(Request $request)
    {
        /*if( ! Auth::check()) return redirect('/');*/

        if (!$request->hasFile('fileToUpload')) {
            $request->session()->flash('message.content', 'Error! Image to large');
            return Redirect::to('global-talent-upload')->withInput();
        }

        $file = $request->file('fileToUpload');

        if (empty($file)) {
            $request->session()->flash('message.content', 'Error!');
            return Redirect::to('global-talent-upload')->withInput();
        }

        $user = Auth::user();


        if (is_array($file)) {
            $files = $file;
            foreach ($files as $file) {
                $user->addMedia($file->getRealPath())
                    ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
                    ->toMediaCollection();
            }

            return redirect('global-talent-rules')->with('alert', '感謝您的報名');
        }

        $user->addMedia($file->getRealPath())
            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection();


        return redirect('global-talent-rules')->with('alert', '感謝您的報名');
    }

    /* EN Controller */
    public function registeren(Request $request)
    {
        if (!$this->validate($request,[
            'name' => [
                'required',
                'unique:candidates,name',
                'regex:/^[^\d]{2,}$/'
            ],
            'birthday' => [
                'required',
                'regex:/^\d{4}\-\d{2}\-\d{2}/'
            ],
            'gender' => [
                'required',
                'regex:/^(male|female)$/'
            ],
            'address' => 'required',
            'email' => 'required',
            'douyin' => 'required',
            'facebookid' => 'required',
            'performance' => 'required',
        ])) {
            return Redirect::to('en/global-talent-registration')->withInput();
        } elseif (!$this->validate($request, [
            'phone' => [
                'required',
                'unique:candidates,phone',
                'regex:/^09\d{8}$/'
            ],
        ])) {
            return Redirect::to('en/global-talent-registration')->withInput();
        } elseif (!$this->validate($request, [
            'email' => [
                'required',
                'unique:users,email',
                'regex:/^[\w\-_+\.]+@[\w\-_]+[\.a-z]{2,}$/'
            ],
        ])) {
            return Redirect::to('en/global-talent-registration')->withInput();
        } elseif (!$this->validate($request, [
            'douyin' => [
                'required',
                'unique:candidates,douyin',
                'regex:/^http\:\/\/.+\.tiktok\.com\/.+/'
            ],
        ])) {
            return Redirect::to('en/global-talent-registration')->withInput();
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

        return redirect('en/global-talent-upload');
    }

    public function mediaen()
    {

        $user = Auth::user();
        $medias = $user->getMedia();

        return view('en/global-talent-upload', compact('medias'));

        /*if(Auth::check())
        {

        }*/
    }

    public function uploaden(Request $request)
    {
        /*if( ! Auth::check()) return redirect('/');*/

        if (!$request->hasFile('fileToUpload')) {
            $request->session()->flash('message.content', 'Error! Image to large');
//            return redirect('update-en');
            return Redirect::to('en/global-talent-upload')->withInput();
        }

        $file = $request->file('fileToUpload');

        if (empty($file)) {
            $request->session()->flash('message.content', 'Error!');
            return Redirect::to('en/global-talent-upload')->withInput();
        }

        $user = Auth::user();


        if (is_array($file)) {
            $files = $file;
            foreach ($files as $file) {
                $user->addMedia($file->getRealPath())
                    ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
                    ->toMediaCollection();
            }

            return redirect('en/global-talent-rules')->with('alert', 'Thanks Your Apply ');
        }

        $user->addMedia($file->getRealPath())
            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection();


        return redirect('en/global-talent-rules')->with('alert', 'Thanks Your Apply');
    }

    /*          VN-Controller             */

    public function registervn(Request $request)
    {
        if (!$this->validate($request,[
            'name' => [
                'required',
                'unique:candidates,name',
                'regex:/^[^\d]{2,}$/'
            ],
            'birthday' => [
                'required',
                'regex:/^\d{4}\-\d{2}\-\d{2}/'
            ],
            'gender' => [
                'required',
                'regex:/^(male|female)$/'
            ],
            'address' => 'required',
            'email' => 'required',
            'douyin' => 'required',
            'facebookid' => 'required',
            'performance' => 'required',
        ])) {
            return Redirect::to('vn/global-talent-registration')->withInput();
        } elseif (!$this->validate($request, [
            'phone' => [
                'required',
                'unique:candidates,phone',
                'regex:/^09\d{8}$/'
            ],
        ])) {
            return Redirect::to('vn/global-talent-registration')->withInput();
        } elseif (!$this->validate($request, [
            'email' => [
                'required',
                'unique:users,email',
                'regex:/^[\w\-_+\.]+@[\w\-_]+\.[a-z]{2,}$/'
            ],
        ])) {
            return Redirect::to('vn/global-talent-registration')->withInput();
        } elseif (!$this->validate($request, [
            'douyin' => [
                'required',
                'unique:candidates,douyin',
                'regex:/^http\:\/\/.+\.tiktok\.com\/.+/'
            ],
        ])) {
            return Redirect::to('vn/global-talent-registration')->withInput();
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

        return redirect('vn/global-talent-upload');
    }

    public function mediavn()
    {

        $user = Auth::user();
        $medias = $user->getMedia();

        return view('vn/global-talent-upload', compact('medias'));

        /*if(Auth::check())
        {

        }*/
    }

    public function uploadvn(Request $request)
    {
        /*if( ! Auth::check()) return redirect('/');*/

        if (!$request->hasFile('fileToUpload')) {
            $request->session()->flash('message.content', 'Error! Image to large');
//            return redirect('/update');
            return Redirect::to('vn/global-talent-upload')->withInput();
        }

        $file = $request->file('fileToUpload');

        if (empty($file)) {
            $request->session()->flash('message.content', 'Error!');
            return Redirect::to('vn/global-talent-upload')->withInput();
        }

        $user = Auth::user();


        if (is_array($file)) {
            $files = $file;
            foreach ($files as $file) {
                $user->addMedia($file->getRealPath())
                    ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
                    ->toMediaCollection();
            }

            return redirect('vn/global-talent-rules')->with('alert', 'Cảm ơn bạn đã đăng ký');
        }

        $user->addMedia($file->getRealPath())
            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection();


        return redirect('vn/global-talent-rules')->with('alert', 'Cảm ơn bạn đã đăng ký');
    }

    /*          Th             */

    public function registerth(Request $request)
    {
        if (!$this->validate($request,[
            'name' => [
                'required',
                'unique:candidates,name',
                'regex:/^[^\d]{2,}$/'
            ],
            'birthday' => [
                'required',
                'regex:/^\d{4}\-\d{2}\-\d{2}/'
            ],
            'gender' => [
                'required',
                'regex:/^(male|female)$/'
            ],
            'address' => 'required',
            'email' => 'required',
            'douyin' => 'required',
            'facebookid' => 'required',
            'performance' => 'required',
        ])) {
            return Redirect::to('th/global-talent-registration')->withInput();
        } elseif (!$this->validate($request, [
            'phone' => [
                'required',
                'unique:candidates,phone',
                'regex:/^09\d{8}$/'
            ],
        ])) {
            return Redirect::to('th/global-talent-registration')->withInput();
        } elseif (!$this->validate($request, [
            'email' => [
                'required',
                'unique:users,email',
                'regex:/^[\w\-_+\.]+@[\w\-_]+\.[a-z]{2,}$/'
            ],
        ])) {
            return Redirect::to('th/global-talent-registration')->withInput();
        } elseif (!$this->validate($request, [
            'douyin' => [
                'required',
                'unique:candidates,douyin',
                'regex:/^http\:\/\/.+\.tiktok\.com\/.+/'
            ],
        ])) {
            return Redirect::to('th/global-talent-registration')->withInput();
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

        return redirect('th/global-talent-upload');
    }

    public function mediath()
    {

        $user = Auth::user();
        $medias = $user->getMedia();

        return view('th/global-talent-upload', compact('medias'));

        /*if(Auth::check())
        {

        }*/
    }

    public function uploadth(Request $request)
    {
        /*if( ! Auth::check()) return redirect('/');*/

        if (!$request->hasFile('fileToUpload')) {
            $request->session()->flash('message.content', 'Error! Image to large');
            return Redirect::to('th/global-talent-upload')->withInput();
        }

        $file = $request->file('fileToUpload');

        if (empty($file)) {
            $request->session()->flash('message.content', 'Error!');
            return Redirect::to('th/global-talent-upload')->withInput();
        }

        $user = Auth::user();


        if (is_array($file)) {
            $files = $file;
            foreach ($files as $file) {
                $user->addMedia($file->getRealPath())
                    ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
                    ->toMediaCollection();
            }

            return redirect('th/global-talent-rules')->with('alert', 'ขอบคุณสำหรับการสมัคร');
        }

        $user->addMedia($file->getRealPath())
            ->usingFileName(sha1(time() . rand(1, 9999)) . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection();


        return redirect('th/global-talent-rules')->with('alert', 'ขอบคุณสำหรับการสมัคร');
    }
}
