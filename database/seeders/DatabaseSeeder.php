<?php

namespace Database\Seeders;

use App\Models\Lottery;
use Database\Factories\LotteryFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Lottery::factory(30)->create();
    }
}
