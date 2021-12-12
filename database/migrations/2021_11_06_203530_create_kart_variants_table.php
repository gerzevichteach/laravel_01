<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kart_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('name_id');
            $table->unsignedSmallInteger('variant');
            $table->unsignedSmallInteger('image_id');
            $table->unsignedSmallInteger('specification_id');
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
        Schema::dropIfExists('kart_variants');
    }
}
