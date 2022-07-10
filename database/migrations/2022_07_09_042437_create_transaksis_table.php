<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('harga', 20)->nullable();
            $table->enum('tipe_member', ['harian', 'tetap']);
            $table->enum('jenis_member', ['cardio', 'gym']);
            $table->date('tanggal_daftar');
            $table->date('masa_tenggang');
            $table->timestamps();

            $table->foreign('member_id')
                ->references('id')
                ->on('members')
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
        Schema::dropIfExists('transaksis');
    }
}
