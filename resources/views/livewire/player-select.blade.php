<div style="max-width: 400px; margin: 20px auto;">

    <div style="margin-bottom: 15px;">
        <label for="count">Количество игроков (2–64):</label>
        <input 
            id="count" 
            type="number" 
            wire:model="count" 
            min="2" max="64" 
            style="width: 60px; margin-left: 10px;"
        />
    </div>

    <div style="margin-bottom: 15px;">
        <button 
            type="button" 
            wire:click="removePlayerSelect" 
            @if($count <= 2) disabled @endif
        >Удалить игрока</button>

        <button 
            type="button" 
            wire:click="addPlayerSelect" 
            @if($count >= 64) disabled @endif
            style="margin-left: 10px;"
        >Добавить игрока</button>
    </div>

    @for ($i = 0; $i < $count; $i++)
        <div style="margin-bottom: 10px;">
            <select wire:model="selectedPlayers.{{ $i }}" style="width: 100%;">
                <option value="">Выберите игрока</option>
                @foreach ($playersList as $player)
                    <option value="{{ $player->id }}">{{ $player->name }}</option>
                @endforeach
            </select>
            @error('selectedPlayers.' . $i) 
                <div style="color: red; font-size: 0.85em;">{{ $message }}</div> 
            @enderror
        </div>
    @endfor

    <div style="margin-top: 20px;">
        <button wire:click="save" type="button">Сохранить</button>
    </div>

    @if (session()->has('message'))
        <div style="color: green; margin-top: 15px; font-weight: bold;">
            {{ session('message') }}
        </div>
    @endif

</div>