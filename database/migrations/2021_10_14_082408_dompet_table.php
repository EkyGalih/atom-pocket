<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DompetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dompet', function (Blueprint $table) {
            $table->string('ID', 40)->primary();
            $table->string('nama', 50);
            $table->string('referensi')->nullable();
            $table->text('deskripsi', 100)->nullable();
            $table->string('status_ID', 40);


            // membuat relasi tabel dompet dengan tabel dompet_status
            $table->foreign('status_ID')
                ->references('ID')
                ->on('dompet_status')
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
        Schema::dropIfExists('dompet');
    }
}
