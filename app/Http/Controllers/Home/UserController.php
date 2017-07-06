<?php

namespace App\Http\Controllers\Home;


use App\Models\Home\Mark;
use App\Models\Home\User;
use Illuminate\Http\Request;
use App\Tool\Sms\SendTemplateSMS;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Mews\Captcha\Facades\Captcha;

class Usercontroller extends Controller
{
    //显示注册页面
    public function registerForm()
    {
        //加载注册页面
        return view('Home.register');
    }

    //验证注册数据
    public function doregForm(Request $request)
    {

        $result = User::create($request->all());
        if ($result) {
            $user = User::where('UserPhone', $request->phone)->first();
            //将当前用户信息添加到session中
            $request->session()->put('user', $user);
            //跳转个人中心页面
            return redirect('personal');
        } else {
            return back();
        }

    }

    //显示登录页面
    public function loginForm()
    {
        return view('Home.login');
    }

    //验证密码
    public function checkPass(Request $request)
    {
        //判断用户密码是否正确
        $user = User::where('UserPhone', $request->phone)->first();
        //判断密码是否正确
        if (Hash::check($request->password, $user->UserPass)) {
            //将当前用户信息添加到session中
            $sign = Mark::where('uid', $user->UserID)->first();
            if ($sign) {
                $user->sustaindays = $sign->sustaindays;
                $user->sumdays = $sign->sumdays;
            }
            $request->session()->put('user', $user);
            return 1;
        }
    }
    //验证手机号码是否存在
    public function checkPhone(Request $request)
    {
        $result = User::where('UserPhone', $request->phone)->first();
        if ($result) {
            //号码存在，返回1
            return 1;
        }
    }
    //验证图形验证码
    public function checkCode(Request $request)
    {
        $result = Captcha::check($request->code);
        if ($result) {
            return 1;
        }
    }

    //发送短信验证
    public function sendSms(Request $request)
    {
        //return $request->phone;
        //发送手机验证码
        $code = $this->getCode();
        //手机验证码存入session中
        $request->session()->put('code', $code);
        //实例化对象
        $sms = new SendTemplateSMS();
        //var_dump($sms);
        //调用对象中的方法
        $result = $sms->send($request->phone, array($code, 3), 1);
        //返回数据
        return $result->toJson();
    }

    //随机短信验证码
    public function getCode()
    {
        $charset='0123456789';
        $pos = strlen($charset) - 1;
        $code = '';
        for ($i = 0; $i < 4; $i ++) {
            $code .= $charset[mt_rand(0,$pos)];
        }

        return $code;
    }

    //验证手机验证码
    public function checkSms(Request $request)
    {
        $code = $request->session()->get('code');
        if ($code == $request->sms) {
            return 1;
        }
    }

    //退出登录
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('/');
    }

    //后台用户列表显示
    public function usersList()
    {
        $users = User::all();
        return view('Admin.users')->with('users', $users);
    }

    //后台改变用户状态
    public function changeStatus($id)
    {

        $status = User::where('UserID', $id)->get()->first();
        $status = $status['UserShutup'] == 1?2:1;
        User::where('UserID', $id)->update(['UserShutup' => $status]);
        return redirect('admin/users');
    }

    //后台显示用户详细信息
    public function showUser($id)
    {
        $data = User::where('UserID', $id)->get()->first();
        return view('admin.detail_user')->with('data', $data);
    }

    //后台删除用户
    public function deleUser($id)
    {
        $result = User::where('UserID', $id)->delete();
        if ($result) {
            return redirect('admin/users');
        }

    }

    //前台编辑个人信息
    public function userEdit(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        if (User::where('UserID', session('user')->UserID)->update($data)) {
            //将跟新后的信息重新存入session中
            $user = User::where('UserID', session('user')->UserID)->first();
            $request->session()->put('user', $user);
            return redirect('personal');
        } else {
            return back();
        }
    }

    //前台上传头像
    public function uploadImg(Request $request)
    {
        $img = $request->file('UserIcon');
        $info = $img->store('uploads');
        if (User::where('UserID', session('user')->UserID)->update(['UserIcon' => $info])) {
            //将跟新后的信息重新存入session中
            $user = User::where('UserID', session('user')->UserID)->first();
            $request->session()->put('user', $user);
            return redirect('personal');
        } else {
            return back();
        }
    }

    //加载个人中心页面
    public function personList()
    {
        if (session('user')) {

            $list= DB::table('inform')->where('status',1)->get();

            $req= DB::table('message')
                ->join('subcommunity','subcommunity.ID','message.F_id')
                ->where('U_id',session('user')->UserID)
                ->get();

            $re= DB::table('attention')->where('U_id',session('user')->UserID)->get();

            return view('Home.personal')->with('list',$list)->with('req',$req)->with('re',$re);



        } else {
            return redirect('login');
        }
    }
}
