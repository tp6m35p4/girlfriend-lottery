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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('content');
            $table->timestamp('event_start_at')->nullable();
            $table->timestamp('event_end_at')->nullable();
        });

        Schema::create('lotteries', function (Blueprint $table) {
            $table->id();
            $table->char('code', 7);
            $table->string('title');
            $table->string('content')->nullable();
            $table->longText('link')->nullable();
            $table->longText('image')->nullable();
            $table->boolean('is_used')->default(false);
            $table->unsignedBigInteger('belongs_to_event');
            $table->foreign('belongs_to_event')->references('id')->on('events');
            $table->unique(['code', 'belongs_to_event']);
        });

        Schema::create('winning_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lottery_id');
            $table->timestamps();
            $table->foreign('lottery_id')->references('id')->on('lotteries');
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
