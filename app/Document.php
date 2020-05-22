<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $primaryKey = 'catalog_id';
    protected $table = 'documents';

    public static $rules_rental = array(
        'catalog_id' => 'required|exists:documents,catalog_id',
    );

    public static $message_rental = array(
        'catalog_id.required' => '資料IDを入力してください。',
        'catalog_id.exists' => 'この資料IDは登録されていません。',
    );
}
