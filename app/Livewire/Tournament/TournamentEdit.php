<?php

namespace App\Livewire\Tournament;

use Livewire\Component;

class TournamentEdit extends Component
{
      public $tournament;

    public function mount($tournament)
    {
        $this->tournament = $tournament;
    }

     public $activeSection = 'players'; 

    public function setSection($section)
    {
        $this->activeSection = $section;
    }
    public function render()
    {
        return view('livewire.tournament.tournament-edit');
    }
}
