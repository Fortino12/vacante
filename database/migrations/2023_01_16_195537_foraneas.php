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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('puesto_id')->references('id')->on('puestos')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('municipios', function (Blueprint $table) {
            $table->foreignId('estado_id')->references('id')->on('estados')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('localidads', function (Blueprint $table) {
            $table->foreignId('municipio_id')->references('id')->on('municipios')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('direccions', function (Blueprint $table) {
            $table->foreignId('localidad_id')->references('id')->on('localidads')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('oficinas', function (Blueprint $table) {
            $table->foreignId('localidad_id')->references('id')->on('localidads')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('subdireccions', function (Blueprint $table) {
            $table->foreignId('oficina_id')->references('id')->on('oficinas')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreignId('drv_id')->references('id')->on('drvs')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('horarios', function (Blueprint $table) {
            $table->foreignId('oficina_id')->references('id')->on('oficinas')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('moras', function (Blueprint $table) {
            $table->foreignId('oficina_id')->references('id')->on('oficinas')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('drvs', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('historial_laborals', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('requesicions', function (Blueprint $table) {
            $table->foreignId('oficina_id')->references('id')->on('oficinas')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('vacantes', function (Blueprint $table) {
            $table->foreignId('puesto_id')->references('id')->on('puestos')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreignId('municipio_id')->references('id')->on('municipios')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('candidatos', function (Blueprint $table) {
            $table->foreignId('direccion_id')->references('id')->on('direccions')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('caja_chicas', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('facturacions', function (Blueprint $table) {
            $table->foreignId('caja_id')->references('id')->on('caja_chicas')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreignId('gasto_id')->references('id')->on('gastos')->onDelete('cascade')->onUpdate('cascade'); 
        });
        Schema::table('puesto_user', function (Blueprint $table) {
            $table->foreignId('puesto_id')->references('id')->on('puestos')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
