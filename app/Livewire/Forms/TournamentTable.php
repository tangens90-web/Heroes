<?php

namespace App\Livewire\Forms;

use App\Models\TournamentResult;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TournamentTable extends Form
{
  
//    #[Validate('required ')]
    public $player_id;

//    #[Validate('required')]
    //  public $tournamentId;

    // public function mount($tournamentId)
    // {
    //     $this->tournamentId = $tournamentId;
    //     // dd($tournamentId);
    // }

//    #[Validate('required|min:6')]
    public $final_place;

    public string $earned_money = '' ;

    protected function rules(): array
    {
        return [
            'player_id' => 'required',
            
            'final_place' => 'nullable',
            'earned_money' => 'nullable|string',
        ];
    }
   
 public function addTournamentPlayer($tournamentId)
    {
        // dd($tournamentId);
        $validated = $this->validate();
        // dd($this->tournamentId);
        $validated['tournament_id'] = $tournamentId;
        // dd($validated);
        // $validated = $this->validate();
        $tournament = TournamentResult::create($validated);
        $this->reset();
        session()->flash('success', 'Добавлен участник в турнир');
        return $tournament;
    }
    // public function saveUser()
    // {
    //     $validated = $this->validate();
    //     $user = TournamentResult::create($validated);
    //     $this->reset();
    //     session()->flash('success', 'User created successfully');
    //     return $user;
    // }

}