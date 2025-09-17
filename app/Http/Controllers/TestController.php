<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
     use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
class TestController extends Controller
{ 
    // public function __construct()
    // {
    //     $this->middleware('throttle:10');
    // }
   public function index()
{
    try {
        Mail::to('some@example.com')->send(new TestMail());
        return "Письмо отправлено";
    } catch (\Exception $e) {
        Log::error('Ошибка при отправке письма: ' . $e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

    // public function __invoke()
    // {

    //     return response()->json(['test'=>'some'], 200,[]);
    // }
    //
}
