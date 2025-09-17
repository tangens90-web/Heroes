<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePost extends Component
{
    public string $someone = 'Кто-то';
    //  public function mount()
    // {
    //     $this->someone = $someone;
 
    //     // $this->fill( 
    //     //     $someone->only('title', 'description'), 
    //     // ); 
    // }
    public function render()
    {

        return view('livewire.create-post',[
            'age'=>27
        ]);
    }
}
