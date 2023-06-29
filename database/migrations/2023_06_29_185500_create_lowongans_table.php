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
        Schema::dropIfExists('lowongans');
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->string('judul_pekerjaan');
            $table->text('deskripsi_pekerjaan');
            $table->string('jenis_pekerjaan');
            $table->string('lokasi_pekerjaan');
            $table->string('rentang_gaji_minimal');
            $table->string('rentang_gaji_maksimal');
            $table->string('jenis_kelamin');
            $table->date('tanggal_tayang');
            $table->date('tanggal_kadaluwarsa');
            $table->integer('kuota');
            $table->string('status');
            $table->unsignedInteger('penyedia_kerja_id');
            $table->timestamps();
        });

	    Schema::table('lowongans', function($table) {
            $table->foreign('penyedia_kerja_id')
            ->references('id')
            ->on('penyedia_kerjas')
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
        Schema::dropIfExists('lowongans');
    }
};
