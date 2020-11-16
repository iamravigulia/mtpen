<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchthepairsAnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fmt_matchthepairs_ans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->longText('answer');
            $table->boolean('active')->default(0);
            $table->foreignId('media_id')->nullable();
            $table->foreignId('match_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fmt_matchthepairs_ans');
    }
}
