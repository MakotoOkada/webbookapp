<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    //岩下
    //資料削除日・備考欄のバリデーション
    public static $document_delete_rules = array(
        'disposal_date' => 'required|date',
        'catalog_remark' => 'max:200'
    );
    
    public static $document_delete_messages = array(
        'disposal_date.date' => '廃棄年月日は日付で入力してください',
        'disposal_date.required' => '廃棄年月日は必須です',
        'catalog_remark.max' => '備考は200文字以内で入力してください'
    );

    //杉澤さん
    // 資料追加のバリデーション
    protected $guarded = array('catalog_id');
    public static $document_add_rules = array(
    'catalog_number'  => 'integer|digits_between:10, 13|required',
    );

    public static $document_add_messages = array(
    'catalog_number.integer' => 'ISBNは半角数字で入力してください',
    'catalog_number.digits_between' => 'ISBNは10桁または13桁で入力してください',
    'catalog_number.required' => 'ISBNは必須です',
    );

    //本間くん
    public $timestamps=false;
    protected $primaryKey='catalog_id';

    public function catalog(){
        return $this->belongsTo('App\Catalog','catalog_number','catalog_number');
    }
}
