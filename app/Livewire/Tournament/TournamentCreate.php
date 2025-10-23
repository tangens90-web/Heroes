<?php

namespace App\Livewire\Tournament;

use Livewire\Component;
use App\Models\Player;
use App\Models\Tournament;
use App\Livewire\Forms\TournamentTable;

class TournamentCreate extends Component
{
    public TournamentTable $form;
   
    // public $player_id;  
    public $players = [];
    public $successMessage;
    protected $listeners = ['hideSuccessMessage','playerDeleted' => 'refreshPlayerList'];
    public $tournamentNumberParticipants;
    public $tournamentId;

        public function mount($tournamentId)
        {
            // dd($tournamentId);
    $this->tournamentId = $tournamentId;
    $this->refreshPlayerList();
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
    // public string $test = '';
     public function addTournamentPlayer($tournamentId){
            // dd($tournamentId);
         $tournamentPlayer = $this->form->addTournamentPlayer($tournamentId);
         $this->dispatch('playerAdded', $tournamentPlayer);
         $this->successMessage = 'Данные успешно сохранены!';

        // Запускаем JS-событие, чтобы через 7 секунд скрыть сообщение
        $this->dispatch('hide-success-message-timer');
    }
      public function hideSuccessMessage()
    {
        $this->successMessage = null;
    }
    // проверяем на то есть ли места
     public function getAvailablePlaces()
    {
        $tournament = Tournament::find($this->tournamentId);
        if (!$tournament) {
            return [];
        }

        $takenPlaces = $tournament->players()
            ->whereNotNull('tournament_result.final_place')
            ->pluck('tournament_result.final_place')
            ->toArray();

        $allPlaces = range(1, $this->tournamentNumberParticipants);

        return array_values(array_diff($allPlaces, $takenPlaces));
    }

    public function render()
    {
      $playersCount =  $this->refreshPlayerList();
    

    return view('livewire.tournament.tournament-create', [

        'players' =>  $this->players,
        'playersCount'=>$playersCount
    ]);
       
    }
    
}
