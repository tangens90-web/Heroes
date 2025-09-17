<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $matches = Matches::with(['stage', 'players'])->get();

        return view('home.index',compact('matches'));
    }
}
