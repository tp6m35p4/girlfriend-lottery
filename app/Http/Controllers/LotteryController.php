<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use Illuminate\Http\Request;

class LotteryController extends Controller
{
    //

    public function index()
    {
        $lotteries = Lottery::all();
        return view('home', compact('lotteries'));
    }
}
