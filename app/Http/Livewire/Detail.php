<?php

namespace App\Http\Livewire;

use App\Models\Lottery;
use App\Models\WinningLogs;
use Livewire\Component;

class Detail extends Component
{
    public $lottery;
    public function mount($code)
    {
        $this->lottery = Lottery::where('code', $code)->first();
        if (!$this->lottery || !$this->lottery->status) {
            $this->redirect(route('home'));
        }

    }
    public function render()
    {
        return view('livewire.detail');
    }
}
