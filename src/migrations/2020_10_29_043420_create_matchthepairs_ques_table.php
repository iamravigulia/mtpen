<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchthepairsQuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fmt_matchthepairs_ques', function (Blueprint $table) {
            $table->id();
            $table->longText('question')->nullable();
            $table->foreignId('media_id')->nullable();
            $table->boolean('active')->default(0);
            $table->string('hint')->nullable();
            $table->set('level', ['easy', 'medium', 'hard'])->default('easy');
            $table->integer('score')->default(1);
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
        Schema::dropIfExists('fmt_matchthepairs_ques');
    }
}
