<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $primaryKey = 'user_id';
    protected $guarded = array('user_id');
    protected $table = 'members';

    public $timestamps = false;

    public static $rules_member_register = array(
        'user_name' => 'required|max:50',
        'user_address' => 'required|max:200',
        'user_tel' => 'required|max:20',
        'user_email' => 'required|max:50|unique:members,user_email|email',
        'user_birthday' => "required|date_format:Y/m/d|before:date('Y/m/d')",
    );

    public static $message_member_register = array(
        'user_name.required' => '名前は必須項目です。',
        'user_name.max' => '名前は50文字以下で入力してください。',
        'user_address.required' => '住所は必須項目です。',
        'user_address.max' => '住所は200文字以下で入力してください。',
        'user_tel.required' => '電話番号は必須項目です。',
        'user_tel.max' => '電話番号は20文字以下で入力してください。',
        'user_email.required' => 'メールアドレスは必須項目です。',
        'user_email.max' => 'メールアドレスは50文字以下で入力してください。',
        'user_email.unique' => 'このメールアドレスはすでに登録されています。',
        'user_email.email' => '正しいメールアドレスではありません。',
        'user_birthday.required' => '誕生日は必須項目です。',
        'user_birthday.date_format' => '日付の書き方が間違っています。',
        'user_birthday.before' => 'この日付は入力できません。',
    );

    public function getAuthPassword() 
    {
        return $this->user_email; 
    }


    //杉澤さん
    // 会員編集のバリデーション

    public static $edit_member_rules = array(
        'user_name'  => 'max:50|required',
        'user_address' => 'max:200|required',
        'user_tel' => 'max:20|required',
        'user_email' => 'email|max:50|required',
    );

    public static $edit_member_messages = array(
        'user_name.max' => '名前は50文字以下にしてください',
        'user_name.required' => '名前は必須です',
        'user_address.max' => '住所は200文字以下にしてください',
        'user_address.required' => '住所は必須です',
        'user_tel.required' => '電話番号は必須です',
        'user_tel.max' => '電話番号は:max文字以下で入力してください',
        'user_email.email' => 'メールアドレスの形式にしてください',
        'user_email.max' => 'メールアドレスは50文字以下にしてください',
        'user_email.required' => 'メールアドレスは必須です',
    );
}
