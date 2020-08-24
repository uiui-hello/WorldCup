<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    //
    use SoftDeletes;
    
    //
    protected $table = "goals";
    protected $dates = ["expired_at", "deleted_at", "updated_at", "created_at"];
}