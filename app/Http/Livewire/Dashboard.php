<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Dashboard extends Component
{
    public Collection $events;
    public function mount()
    {
        $this->events = Event::all();
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
