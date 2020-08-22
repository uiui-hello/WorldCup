<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table = "countries";
    protected $dates = ["expired_at", "deleted_at", "updated_at", "created_at"];
}