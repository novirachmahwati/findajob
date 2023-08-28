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
        Schema::dropIfExists('sertifikasis');
        Schema::create('sertifikasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('penerbit');
            $table->date('tgl_diterbitkan')->nullable();
            $table->date('tgl_kadaluwarsa')->nullable();
            $table->string('kredensial_url')->nullable();
            $table->unsignedInteger('pencari_kerja_id');
            $table->timestamps();
        });

	    Schema::table('sertifikasis', function($table) {
            $table->foreign('pencari_kerja_id')
            ->references('id')
            ->on('pencari_kerjas')
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
        Schema::dropIfExists('sertifikasis');
    }
};
