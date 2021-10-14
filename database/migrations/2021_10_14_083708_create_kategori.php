<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->string('ID', 40)->primary();
            $table->string('nama', 100);
            $table->text('deskripsi');
            $table->string('status_ID', 40);


            // membuat relasi tabel kategori dengan tabel kategori_status
            $table->foreign('status_ID')
                ->references('ID')
                ->on('kategori_status')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori');
    }
}
