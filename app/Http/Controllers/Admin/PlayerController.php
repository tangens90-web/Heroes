<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Player;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::query()->paginate(12);
        return view('admin.index',compact('players'));
        // return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // dd($request->all(), $request->file('avatar'));
        $request->merge([
        'username' => trim($request->input('username')),
        ]);
         $validated = $request->validate([  
            'username'=>['required','string','max:100','unique:players,username','regex:/^\S+$/'],
            'name'=>['string','max:100'],
            'surname'=>['string','max:100'],
            'avatar' => [ 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'country'=>['string'],
            'birthday'=>['nullable','string']
            // 'published_at'=>['nullable','date','string'],
            // 'published'=>['nullable','boolean'], 
        ]);
         $relativePath = null;
        if ($request->hasFile('avatar')) {
         $file = $request->file('avatar');
         

        // Генерируем уникальное имя файла
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Сохраняем файл в storage/app/public/images
        // Для публичного доступа создайте символическую ссылку: php artisan storage:link
        $path = $file->storeAs('public/images/players/', $filename);

        // В базе сохраняем относительный путь или URL
        $relativePath = 'storage/images/players/' . $filename;
        }
        
        // dd($validated);
        $player = Player::query()->create([
            // 'user_id'=> User::query()->value('id'),
          'username'=> $validated['username'],
          'name'=> $validated['name'],
          'surname'=> $validated['surname'],
          'avatar'=> $relativePath,
          'birthday'=> $validated['birthday'],
          'country'=> $validated['country'],


        ]);

        // dd($player);
         return redirect()->route('admin.player.show',$player);
    }

    /**
     * Display the specified resource.
     */
    public function show($player)

    {
        $player = Player::findOrFail($player);
        return view('admin.show',compact('player'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
