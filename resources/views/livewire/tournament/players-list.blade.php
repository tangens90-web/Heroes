<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <div>
        @foreach ($players as $player)
        <div class='d-flex gap-3'>
        <div class=''>
           {{ $player->username }} 

           </div>
           <button class="btn btn-danger my-2" wire:click='deletePlayer({{ $player->id }})'> Удалить игрока</button>
           </div>
        @endforeach
    </div>


</div>
