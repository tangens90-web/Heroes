<?php

namespace App\Livewire\Tournament;

use Livewire\Component;
use App\Models\Player;
use App\Models\Tournament;
use App\Models\TournamentResult;

class PlayersList extends Component
{
    protected $listeners = [
    'playerAdded' => 'refresh',
];
    public $tournamentId;

        public function mount($tournamentId)
        {
           
    $this->tournamentId = $tournamentId;
        }
    public function deletePlayer($id){
        $player = TournamentResult::where('player_id', $id)
        ->where('tournament_id', $this->tournamentId)
        ->first();
        // dd($player,$id,$this->tournamentId);

    if ($player) {
        $player->delete();
        $this->dispatch('deletedPlayer');
    }
        // dd($player);
    }
    public function render()
    {
      $tournament = Tournament::find($this->tournamentId);

    if (!$tournament) {
        // Турнир не найден, передаем пустой список
        $players = collect();
    } else {
        // Получаем игроков, связанных с турниром через связь players()
        $players = $tournament->players()->get();
    }

    return view('livewire.tournament.players-list', [
        'players' => $players,
    ]);
    }
}
