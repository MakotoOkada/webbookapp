<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $primaryKey = 'rental_id';
    public $timestamps = false;
    protected $table = 'rentals';
}
