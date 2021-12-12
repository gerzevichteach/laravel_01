<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kart_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('problem_id');
            $table->unsignedSmallInteger('variant_id');
            $table->unsignedSmallInteger('answer');
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
        Schema::dropIfExists('kart_answers');
    }
}
