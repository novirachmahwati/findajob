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
        Schema::dropIfExists('riwayat_lamarans');
        Schema::create('riwayat_lamarans', function (Blueprint $table) {
            $table->id();
            $table->dateTime('terkirim_pada');
            $table->string('status');
            $table->unsignedInteger('lowongan_id');
            $table->unsignedInteger('pencari_kerja_id');
            $table->unsignedInteger('penyedia_kerja_id');
            $table->timestamps();
        });

	    Schema::table('riwayat_lamarans', function($table) {
            $table->foreign('lowongan_id')
            ->references('id')
            ->on('lowongans')
            ->onDelete('cascade');

            $table->foreign('pencari_kerja_id')
            ->references('id')
            ->on('pencari_kerjas')
            ->onDelete('cascade');

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
        Schema::dropIfExists('riwayat_lamarans');
    }
};
