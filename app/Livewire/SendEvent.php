<?php

namespace App\Livewire;

use Livewire\Component;

class SendEvent extends Component
{
    public string $message;

    public function sendMessage()
    {
        $this->dispatch('message', $this->message)->to(ReceiveEvent::class);
    }

    public function resetComponent()
    {
        $this->dispatch('resetComponent');
    }

    public function render()
    {
        return view('livewire.send-event');
    }
}
