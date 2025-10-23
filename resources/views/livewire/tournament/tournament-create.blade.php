<div>
    <p>Tournament ID: {{ $tournamentId }}</p>
    @if ($playersCount == $tournamentNumberParticipants)
        Все игроки добавлены
    @else
        @if (session()->has('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif
        <form wire:submit='addTournamentPlayer({{ $tournamentId }})'>
            {{-- игрок --}}

            <div class='mb-3'>
                <select class='form-select select2 player-select' wire:model="form.player_id">
                    <option selected> Выберите игрока</option>
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->username }}</option>
                    @endforeach

                </select>
            </div>
            {{-- турнир
          <select class='form-select select2' wire:model="tournament_id">
                                    <option selected> Выберите турнир</option>
                                    @foreach ($players as $player)
                                             <option value="{{$player->id}}">{{$player->username}}</option>
                                        
                                    @endforeach
                                   
                                </select> --}}
            {{-- место в турнире --}}
            {{-- <div class='mb-3'>
          <select class="form-select select2 place-select" wire:model="form.final_place">
    <option selected>Занятое место</option>
    @foreach ($this->getAvailablePlaces() as $place)
        <option value="{{ $place }}">{{ $place }}</option>
    @endforeach
</select>
                                </div> --}}
            {{-- <div class='mb-3'>
                <input class="form-control" wire:model="form.earned_money" placeholder="Выигрыш">
            </div> --}}
            <button type="submit" class="btn btn-primary my-2">Добавить игрока</button>
        </form>
    @endif

    {{-- <button wire:click="testFunc" class="btn btn-primary my-2">Тестируем</button> --}}

</div>


@livewireScripts()

<script>
    //  $js('increment', () => {
    //     console.log('increment')
    // })

    $(document).ready(function() {
        $('.player-select').select2().on('change', function() {
            @this.set('form.player_id', $(this).val());
        });

        // $('.place-select').select2().on('change', function() {
        //     @this.set('form.final_place', $(this).val());
        // });
    });
    window.addEventListener('hide-success-message-timer', () => {
        setTimeout(() => {
            @this.hideSuccessMessage();
        }, 7000);
    });
</script>
