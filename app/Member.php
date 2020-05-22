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
        'user_birthday' => 'required|date_format:Y/m/d',
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
    );

    public static $rules_rental = array(
        'user_id' => 'required|exists:members,user_id',
    );

    public static $message_rental = array(
        'user_id.required' => '会員IDは必須です。',
        'user_id.exists' => 'この会員IDは登録されていません。',
    );

    public function getAuthPassword() 
    {
        return $this->user_email; 
    }
}
