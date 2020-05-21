<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
   public function add_member(Request $request)
   {
        return view('member_register');
   }

   public function add_member_check(Request $request)
   {
        $this->validate($request, Member::$rules_member_register, Member::$message_member_register);
        $data = $request->all();
        $request->session()->put($data);
        return view('member_register_confirming',['data' => $data]);
   }

   public function create_member(Request $request)
   {    
        $action = $request->get('action','back');
        $input = $request->except('action');
        if($action === 'back') {
            return redirect()->action('MemberController@add_member')->withInput($input);
        } else if($action === 'next'){
        $member = new Member;
        $member->user_name = $request->user_name;
        $member->user_address = $request->user_address;
        $member->user_tel = $request->user_tel;
        $member->user_email = $request->user_email;
        $member->user_birthday = $request->user_birthday;
        $member->user_joindate = $request->user_joindate;
        unset($member['_token']);
        $member->save();
        return view('member_register_complete',['form' => Member::find($member->user_id)]);   
        }
   }
}
