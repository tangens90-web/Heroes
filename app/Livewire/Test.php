<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Player;

class Test extends Component
{
    
    public $player_id;  
    
  public string $test = '';
     public function testFunc(){
        dd($this->test);
    }
    // public $players;

    // public function mount()
    // {
        
    //     $this->players = \App\Models\Player::all();
    // }
    public function render()
    {
        return view('livewire.test',[
            'players' => Player::all(),
        ]);
    }

   
}