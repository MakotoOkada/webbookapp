<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $primaryKey = 'rental_id';
    public $timestamps = false;
    protected $table = 'rentals';

    public static $rules_rental = array(
        'catalog_id' => 'unique:rentals,catalog_id',
    );

    public static $message_rental = array(
        'catalog_id.unique' => 'この資料IDはすでに借りられています。',
    );
}
