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
        Schema::dropIfExists('pencari_kerjas');
        Schema::create('pencari_kerjas', function (Blueprint $table) {
            $table->id();
            $table->string('alamat');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('no_telp');
            $table->string('agama');
            $table->string('foto')->nullable();
            $table->string('cv')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });

        Schema::table('pencari_kerjas', function($table) {
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
        Schema::dropIfExists('pencari_kerjas');
    }
};
