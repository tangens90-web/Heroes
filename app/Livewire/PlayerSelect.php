<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Player; // Модель игрока

class PlayerSelect extends Component
{
    public $count = 1; // выбранное число (количество селектов)
    public $selectedPlayers = []; // выбранные игроки (по индексу)
    public $playersList = []; // список всех игроков из БД

    public function mount()
    {
        // Загружаем всех игроков из базы для выбора
        $this->playersList = Player::all();
    }

    public function updatedCount($value)
    {
        // Обновляем массив выбранных игроков под новый размер
        $this->selectedPlayers = array_slice($this->selectedPlayers, 0, $value);
    }

    public function save()
    {
        // Здесь логика сохранения выбранных игроков, например:
        foreach ($this->selectedPlayers as $playerId) {
            // ваша логика вставки в базу (например, создание записи в другой таблице)
        }
        
        session()->flash('message', 'Игроки успешно добавлены!');
    }

    public function render()
    {
        return view('livewire.player-select');
    }
}
