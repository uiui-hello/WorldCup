<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Throwable;

class Player extends Model
{
    //
    use SoftDeletes;

    //
    protected $table = "players";
    protected $dates = ["expired_at", "deleted_at", "updated_at", "created_at"];

    public static function getWithCountryBySimplePaginate($paginate_limit) {
        try {
            return self::select('players.*', 'c.name as c_name', 't.goals as t_goals')
                ->leftjoin('countries as c', 'players.country_id', '=', 'c.id')
                ->leftjoin('total_goals as t', 'players.id', '=', 't.id')
                ->orderBy('t.goals', 'desc')
                ->orderBy('players.club', 'asc')
                ->orderBy('players.uniform_num', 'asc')
                ->simplePaginate($paginate_limit);
        } catch(Throwable $e) {
            throw $e;
        }
    }
}