<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function lotteries(): HasMany
    {
        return $this->hasMany(Lottery::class, 'belongs_to_event', 'id');
    }
}
