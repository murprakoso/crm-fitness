<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablePesans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesans', function (Blueprint $table) {
            $table->enum('ke', ['status', 'gender', 'job'])->nullable()->after('pesan');
            $table->enum('gender', ['pria', 'wanita'])->nullable()->after('status');
            $table->string('job', 200)->nullable()->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesans', function (Blueprint $table) {
            $table->dropColumn(['ke', 'gender', 'job']);
        });
    }
}
