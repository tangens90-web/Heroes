<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{ 
    // public function __construct()
    // {
    //     $this->middleware('throttle:10');
    // }
    public function index()
    {
        return "test";
    }

    public function __invoke()
    {

        return response()->json(['test'=>'some'], 200,[]);
    }
    //
}
