<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public int $count = 10;
    public int $number;

    public function ChangeNumber()
    {
        $this->count = $this->number;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
