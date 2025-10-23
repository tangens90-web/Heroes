<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        // dd('eqeqeqweq');
    //    phpinfo();
    //     exit;
        return view('admin.home');
       
    }

   
}
