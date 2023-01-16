<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puesto_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('descripcion');
            $table->integer('puesto_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->date('fechaUpdate');
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
        Schema::dropIfExists('puesto_user');
    }
};
