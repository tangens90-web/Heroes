<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
     //
     public function index(Request $request){
     $foo=session('foo');
    //   dd($foo);
        return view('login.index');
    }
//       public function store(Request $request){
//         // $session = session();
//         // $session = app()->make('session');
//         // $session = Session::get('key', 'default');
//         // dd($session);
//         // $ip =$request->ip();
//         //  $email =$request->input('email');
//         //   $password =$request->input('password');
//           // $remember = !!$request->input('remember');
//           // dd($ip);
          
//         // session()->put('foo', 'bar');
//         // session(['foo'=>'Bar']);
//         // session()->forget('foo');
//         // return response()->redirectToRoute('/user');
//           $credentials = $request->only('email', 'password');

//     if (!$token = JWTAuth::attempt($credentials)) {
//         return response()->json(['error' => 'Invalid credentials'], 401);
//     }

//     return response()->json([
//         'access_token' => $token,
//         'token_type' => 'bearer',
//         'expires_in' => JWTAuth::factory()->getTTL() * 60,
//     ]);
//         // return redirect()->route('user');
//         // только через точку работает из-за as, не знаю почему
//         // return redirect('user');
//     }
     public function store(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Успешный вход, пользователь автоматически сохраняется в сессию
        return redirect()->intended('/'); // или нужный маршрут
    } else {
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
  public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'); // или куда хотите перенаправить после выхода
    }
}
