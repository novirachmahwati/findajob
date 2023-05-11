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
        Schema::create('kriterias', function (Blueprint $table) {
            $table->id();
            $table->string('pendidikan');
            $table->string('skill');
            $table->string('pengalaman_kerja');
            $table->string('penghargaan');
            $table->string('organisasi');
            $table->string('bahasa');
            $table->unsignedInteger('lowongan_kerja_id');
            $table->timestamps();
        });

        Schema::table('kriterias', function($table) {
            $table->foreign('lowongan_kerja_id')
            ->references('id')
            ->on('lowongan_kerjas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriterias');
    }
};
