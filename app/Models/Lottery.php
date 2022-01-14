<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getStatusAttribute(): bool
    {
        return WinningLogs::where('lottery_id', $this->id)->exists();
    }
}
