<?php

namespace App\Http\Livewire;

use App\Models\Lottery;
use Livewire\Component;

class Home extends Component
{
    public $lotteries;
    public $code;
    public $rules = [
        'code' => ''
    ];
    public function render()
    {
        $this->lotteries = Lottery::all();
        return view('livewire.home');
    }

    public function submit()
    {

    }
}
