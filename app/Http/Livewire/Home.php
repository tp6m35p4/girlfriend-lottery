<?php

namespace App\Http\Livewire;

use App\Models\Lottery;
use App\Models\WinningLogs;
use Illuminate\Support\Carbon;
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

    public function redeem()
    {
        // check time
        $last_winning_log = WinningLogs::orderBy('created_at', 'desc')->first();

        if ($last_winning_log == NULL || Carbon::now()->diffInHours(Carbon::parse($last_winning_log->created_at)) > 4) {
            // if more than 4 hours, then able for redeem
            $lottery = Lottery::where('code', $this->code);
            if ($lottery->exists()) {
                WinningLogs::insert([
                    'lottery_code' => $this->code
                ]);
                $this->dispatchBrowserEvent('lottery-redeemed');
            } else {
                $this->dispatchBrowserEvent('lottery-not-found');
            }
        } else {
            // else you need to wait
            $this->dispatchBrowserEvent('cool-down');
        }
    }
}
