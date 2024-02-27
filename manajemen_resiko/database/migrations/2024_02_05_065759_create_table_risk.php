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
        Schema::create('risk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_risiko');
            $table->string('deskripsi');
            $table->string('kategori');
            $table->string('tingkat_risiko')
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
        Schema::dropIfExists('table_risk');
    }
};
