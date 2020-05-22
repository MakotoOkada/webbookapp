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
            'user_id' => 'required',
            'user_email' => 'email|required|max:50',
        ],[
            'user_id.required' => '会員IDは必須です。',
            'user_email.email' => '正しいメールアドレスを入力してください。',
            'user_email.required' => 'メールアドレスは必須です。',
            'user_email.max' => 'メールアドレスは50文字以内で入力してください。',
        ]);
        if(Auth::attempt(['user_id' => $request->input('user_id'), 'user_email' => $request->input('user_email')])) {
            $msg = 'ログインしました。ようこそ' . Auth::user()->name . 'さん！';
        } else {
            $msg = 'ログインに失敗しました。';
        }
        return view('after_login_top', ['message' => $msg]);
    }
}
