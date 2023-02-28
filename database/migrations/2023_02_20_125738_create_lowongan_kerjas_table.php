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
        Schema::dropIfExists('lowongan_kerjas');
        Schema::create('lowongan_kerjas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->string('lokasi');
            $table->string('gaji');
            $table->text('deskripsi');
            $table->text('status');
            $table->unsignedInteger('kriteria_id');
            $table->unsignedInteger('penyedia_kerja_id');
            $table->timestamps();
        });

	    Schema::table('lowongan_kerjas', function($table) {
            $table->foreign('penyedia_kerja_id')
            ->references('id')
            ->on('penyedia_kerjas')
            ->onDelete('cascade');
        });

        Schema::table('lowongan_kerjas', function($table) {
            $table->foreign('kriteria_id')
            ->references('id')
            ->on('kriterias')
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
        Schema::dropIfExists('lowongan_kerjas');
    }
};
