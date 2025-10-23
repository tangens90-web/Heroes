{{-- <div>
     <label>Выберите количество игроков:</label>
    <select wire:model="count">
        @for ($i = 1; $i <= 10; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>

    <div class="mt-4">
        @for ($i = 0; $i < $count; $i++)
            <div class="mb-2">
                <label>Игрок {{ $i + 1 }}:</label>
                <select wire:model="selectedPlayers.{{ $i }}">
                    <option value="">-- Выберите игрока --</option>
                    @foreach($playersList as $player)
                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>
        @endfor
    </div>

    <button wire:click="save" class="mt-2">Сохранить</button>

    @if (session()->has('message'))
        <div class="mt-2 text-green-600">
            {{ session('message') }}
        </div>
    @endif
</div> --}}
<div>
    <form wire:submit='addPlayer'>
    <select class='form-select select2' wire:model="player_id">
                                    <option selected> Выберите игрока</option>
                                    @foreach ($players as $player)
                                             <option value="{{$player->id}}">{{$player->username}}</option>
                                        
                                    @endforeach
                                   
                                </select>
                                <button type="submit" class="btn btn-primary my-2">Добавить игрока</button>
                                </form>
                                 <input type="text" name="name" class="form-control" 
                   wire:model="test" placeholder="Name">
                   <button wire:click="testFunc" class="btn btn-primary my-2">Тестируем</button>
                               
</div>
  

@livewireScripts()

<script>
    //  $js('increment', () => {
    //     console.log('increment')
    // })
    
    $(document).ready(function() {
    let select2 = $('.select2');
   
    select2.select2();
    select2.on('change', function(e) {
        console.log($(this).val());
        @this.form.player_id = $(this).val();
        // this.$wire.set('form.player_id',$(this).val(),false)
    });
});
</script>


{{-- @endscript --}}
