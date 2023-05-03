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
        Schema::dropIfExists('penyedia_kerjas');
        Schema::create('penyedia_kerjas', function (Blueprint $table) {
            $table->id();
            $table->string('bidang')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->integer('jml_karyawan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('website')->nullable();
            $table->string('sosial_media')->nullable();
            $table->string('foto')->nullable();
            $table->string('nama_administrator')->nullable();
            $table->string('no_telp_administrator')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });

	    Schema::table('penyedia_kerjas', function($table) {
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('penyedia_kerjas');
    }
};
