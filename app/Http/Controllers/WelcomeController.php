<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Throwable;
use Log;

class WelcomeController extends Controller
{
    //
    public const PAGINATE_LIMIT = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //
            $players = Player::getWithCountryBySimplePaginate(self::PAGINATE_LIMIT);
            return view('welcome')->with('players', $players);
        } catch(Throwable $e) {
            Log::debug($e->getMessage());
            abort(500);
        }
    }
}