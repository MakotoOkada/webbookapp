<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getAuth(Request $request)
    {
        $param = ['message' => 'ログインして下さい。'];
        return view('login', $param);
    }

    public function postAuth(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'email|required|max:50',
        ],[
            'name.required' => '名前は必須です。',
            'email.email' => '正しいメールアドレスを入力してください。',
            'email.required' => 'メールアドレスは必須です。',
            'email.max' => 'メールアドレスは50文字以内で入力してください。',
        ]);
        if(Auth::attempt(['name' => $request->input('name'), 'email' => $request->input('email')])) {
            return redirect()->route('after_login_top');
        }
        return redirect()->back();
    }

    public function top()
    {
        return view('after_login_top');
    }
}
