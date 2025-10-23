<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tournament;


class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tournaments = Tournament::query()->paginate(12);
        return view('admin.tournaments.index',compact('tournaments'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        
        return view('admin.tournaments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // dd($request->all(), $request->file('avatar'));
        // $request->merge([
        // 'username' => trim($request->input('username')),
        // ]);
        // dd($request->input('number_participants'));
         $validated = $request->validate([  
            'title'=>['required','string','max:100'],
            'prize_fund' => ['nullable','required', 'min:0'],
            'number_participants'=>['required','integer', 'min:2'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:4096'],
            
            // 'published_at'=>['nullable','date','string'],
            // 'published'=>['nullable','boolean'], 
        ]);
       
         $relativePath = null;
        if ($request->hasFile('image')) {
         $file = $request->file('image');
         

        // Генерируем уникальное имя файла
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Сохраняем файл в storage/app/public/images
        // Для публичного доступа создайте символическую ссылку: php artisan storage:link
        $path = $file->storeAs('public/images/tournaments/', $filename);

        // В базе сохраняем относительный путь или URL
        $relativePath = 'storage/images/tournaments/' . $filename;
        }
        // dd($validated['number_participants']);
        // dd($validated);
        $tournament  = Tournament::query()->create([
            // 'user_id'=> User::query()->value('id'),
          'title'=> $validated['title'],
          'number_participants'=>$validated['number_participants'],
          'image'=> $relativePath,
           'prize_fund'=> $validated['prize_fund'] ?? 0,
        
        ]);

        // dd($player);
         return redirect()->route('admin.tournaments.show',[
    'id' => $tournament->id,
    'tournament' => $tournament->title,
   
]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)

    {
        // dd('eqweqe');
        $tournament = Tournament::with('players')->findOrfail($id);
        // $players = Player::
        return view('admin.tournaments.show',compact('tournament'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $tournament, $section = null)
    {
        
         $tournament = Tournament::findOrfail($id);
        //
        return view('admin.tournaments.edit',compact('tournament','section'));
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