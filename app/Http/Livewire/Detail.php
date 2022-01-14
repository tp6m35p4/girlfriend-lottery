<?php

namespace App\Http\Livewire;

use App\Models\Lottery;
use Livewire\Component;

class Detail extends Component
{
    public $lottery;
    public function mount($code)
    {
        if (Lottery::where('code', $code)->exists()) {
            $this->lottery = Lottery::where('code', $code)->first();
        } else {
            $this->redirect(route('home'));
        }

    }
    public function render()
    {
        return view('livewire.detail');
    }
}
