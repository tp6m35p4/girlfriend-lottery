<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotteryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotteries', function (Blueprint $table) {
            $table->id();
            $table->char('code', 7)->unique();
            $table->string('title');
            $table->string('content');
            $table->string('link')->nullable();
        });
        Schema::create('winning_logs', function (Blueprint $table) {
            $table->id();
            $table->char('lottery_code');
            $table->timestamps();
            $table->foreign('lottery_code')->references('code')->on('lotteries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lottery');
    }
}
