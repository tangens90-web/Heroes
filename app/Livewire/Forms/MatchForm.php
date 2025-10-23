<?php

namespace App\Livewire\Forms;

use App\Models\Matches;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MatchForm extends Form
{
  
//    #[Validate('required ')]
    // public $player_id;
    public $start_date;
    public $tournament_id;
    public $stage_id;
    public $bo_format;
    public $player_1_id;
    public $player_2_id;


//    #[Validate('required')]
    //  public $tournamentId;

    // public function mount($tournamentId)
    // {
    //     $this->tournamentId = $tournamentId;
    //     // dd($tournamentId);
    // }

//    #[Validate('required|min:6')]
    

    

    protected function rules(): array
    {
        return [
            // 'player_id' => 'required',
            'player_1_id' => 'required',
            'player_2_id' => 'required',
            'start_date'=> 'nullable',
            'tournament_id'=>'required',
            // 'winner' => 'nullable',
            'stage_id' => 'nullable',
            'bo_format'=>'required',
            // 'result_player_1'=>'nullable',
            // 'result_player_2'
            
        ];
    }
   
 public function createMatch($tournamentId)
    {
        // dd($tournamentId);
        $validated = $this->validate();
        // dd($this->tournamentId);
        $validated['tournament_id'] = $tournamentId;
        // dd($validated);
        // $validated = $this->validate();
        $tournament = Matches::create($validated);
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