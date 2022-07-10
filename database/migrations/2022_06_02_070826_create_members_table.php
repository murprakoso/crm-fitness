<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->enum('gender', ['pria', 'wanita']);
            $table->string('no_hp', 15)->nullable();
            $table->string('foto')->nullable();
            $table->string('job')->nullable();
            $table->enum('tipe_member', ['harian', 'tetap'])->nullable();
            $table->enum('jenis_member', ['cardio', 'gym'])->nullable();
            $table->date('masa_tenggang')->nullable();
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
        Schema::dropIfExists('members');
    }
}
