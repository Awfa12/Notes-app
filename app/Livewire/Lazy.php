<?php

namespace App\Livewire;

use Livewire\Component;

class Lazy extends Component
{

    public function mount()
    {
        sleep(5);
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
            <p>loading critical information   ...</p>
        </div>
        HTML;
    }

    public function render()
    {
        return view('livewire.lazy');
    }
}
