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
            $table->string('minimal_pendidikan');
            $table->string('prioritas_minimal_pendidikan');
            $table->string('tahun_pengalaman');
            $table->string('jurusan_pendidikan_terakhir');
            $table->string('rentang_usia');
            $table->string('bahasa');
            $table->string('keterampilan_teknis');
            $table->string('prioritas_keterampilan_teknis');
            $table->string('keterampilan_non_teknis');
            $table->string('prioritas_keterampilan_non_teknis');
            $table->string('sertifikasi')->nullable();
            $table->string('prioritas_sertifikasi')->nullable();
            $table->string('faktor_utama')->nullable();
            $table->string('bobot_faktor_utama')->nullable();
            $table->string('faktor_pendukung')->nullable();
            $table->string('bobot_faktor_pendukung')->nullable();
            $table->unsignedInteger('lowongan_id');
            $table->timestamps();
        });

        Schema::table('kriterias', function($table) {
            $table->foreign('lowongan_id')
            ->references('id')
            ->on('lowongans')
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
