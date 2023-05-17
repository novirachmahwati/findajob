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
            $table->string('status_pernikahan');
            $table->integer('rentang_usia_minimal');
            $table->integer('rentang_usia_maksimal');
            $table->string('bahasa');
            $table->string('keterampilan_teknis');
            $table->string('prioritas_keterampilan_teknis');
            $table->string('keterampilan_non_teknis');
            $table->string('prioritas_keterampilan_non_teknis');
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
