<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
class RegisterController extends Controller
{
    //
     public function index(){
        return view('register.index');
    }
      public function store(Request $request){
       $validated = $request->validate([
        'name'=>['required', 'string','max:50'],
        'email'=>['required', 'string','max:50','email','unique:users'],
        'password'=>['required', 'string','min:6','max:50','unique:users','confirmed'],
        'agreement'=>['accepted']
        
       ]);

       $user = new User;
       
      //  dd($validated);
      //  $user = new User;
      //  $user->name = $validated['name'];
      //  $user->email = $validated['email'];
      //  $user->password = $validated['password'];
      // //  $user->name = $validated['name'];
      //  $user->save();
       $user = User::query()->create([
        'name'=> $validated['name'],
        'email'=> $validated['email'],
        'password'=> $validated['password'],
       
       ]);

    // Авторизация нового пользователя
    $token = JWTAuth::fromUser($user);

    return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => JWTAuth::factory()->getTTL() * 60,
    ]);
    //    dd($user->toArray());
        return redirect()->route('user');
       
    }
}
