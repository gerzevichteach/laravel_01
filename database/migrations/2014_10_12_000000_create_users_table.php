<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();                           //
            $table->string('lastname');     // фамилия
            $table->string('firstname');    // имя
            $table->integer('passuser');    // пароль открытый
            $table->string('login');        // логин
            $table->string('password');     // пароль хеш
            $table->string('type_user')->nullable()->default('Member');    // для админа
            $table->integer('enabled')->nullable()->default('1');     // активность
            $table->integer('cond')->nullable()->default('1');        //
            $table->integer('nous')->nullable()->default('1');        //
            $table->rememberToken();
            $table->timestamps();                   // временные метки
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
