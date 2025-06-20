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
        Schema::table('pencari_kerjas', function (Blueprint $table) {
            $table->string('pendidikan')->nullable();
            $table->string('jurusan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pencari_kerjas', function (Blueprint $table) {
            $table->dropColumn(['pendidikan', 'jurusan']);
        });
    }
};
