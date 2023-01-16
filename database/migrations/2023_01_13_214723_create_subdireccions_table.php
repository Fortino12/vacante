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
        Schema::create('subdireccions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreSubdireccion');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('oficina_id');
            $table->unsignedInteger('drv_id');
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
        Schema::dropIfExists('subdireccions');
    }
};
