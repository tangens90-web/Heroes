<?php

namespace App\Livewire\Tournament;

use Livewire\Component;

use App\Livewire\Forms\MatchForm;
use App\Models\Player;
use App\Models\Tournament;

class MatchCreate extends Component
{
     public $players = [];
    
    public $tournamentId;
     public function mount($tournamentId)
        {
            // dd($tournamentId);
    $this->tournamentId = $tournamentId;
    $this->refreshPlayerList();
        }
     public function addTournamentPlayer($tournamentId){
            // dd($tournamentId);
         $tournamentPlayer = $this->form->addTournamentPlayer($tournamentId);
         $this->dispatch('playerAdded', $tournamentPlayer);
        //  $this->successMessage = 'Данные успешно сохранены!';

        // Запускаем JS-событие, чтобы через 7 секунд скрыть сообщение
        $this->dispatch('hide-success-message-timer');
    }
    public function refreshPlayerList()
{
    $tournament = Tournament::find($this->tournamentId);

    $excludedPlayerIds = $tournament
        ? $tournament->players()->pluck('players.id')->toArray()
        : [];

    $this->players = Player::whereNotIn('id', $excludedPlayerIds)->get();
    return count($excludedPlayerIds);
}
    public function render()

    {
        $playersCount =  $this->refreshPlayerList();
        return view('livewire.tournament.match-create');
    }
}
