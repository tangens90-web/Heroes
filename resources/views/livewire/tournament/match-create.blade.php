<div>
     @if ($playersCount == $tournamentNumberParticipants)
        Все игроки добавлены
    @else
        @if (session()->has('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif
        <form wire:submit='createMatch({{ $tournamentId }})'>
            {{-- игрок --}}

            <div class='mb-3'>
                <select class='form-select select2 match-player-1-select' wire:model="form.player_1_id">
                    <option selected> Выберите игрока</option>
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->username }}</option>
                    @endforeach

                </select>
            </div>
             <div class='mb-3'>
                <select class='form-select select2 match-player-1-select' wire:model="form.player_2_id">
                    <option selected> Выберите игрока</option>
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->username }}</option>
                    @endforeach

                </select>
            </div>
          
            <button type="submit" class="btn btn-primary my-2">Создать матч</button>
        </form>
    @endif
</div>

@livewireScripts()

<script>
    //  $js('increment', () => {
    //     console.log('increment')
    // })

    $(document).ready(function() {
        $('.match-player-1-select').select2().on('change', function() {
            @this.set('form.player_id', $(this).val());
        });

       
    });
    window.addEventListener('hide-success-message-timer', () => {
        setTimeout(() => {
            @this.hideSuccessMessage();
        }, 7000);
    });
</script>