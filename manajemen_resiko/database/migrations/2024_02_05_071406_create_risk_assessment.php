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
        Schema::create('risk_assessment', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')
            ->references('id')
            ->on('users');
            $table->string('risk_id')
            ->references('id')
            ->on('risk');
            $table->date('tanggal_evaluasi');
            $table->string('penilaian_risiko')
            ->references('id')
            ->on('risk_value');
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
        Schema::dropIfExists('risk_assessment');
    }
};
