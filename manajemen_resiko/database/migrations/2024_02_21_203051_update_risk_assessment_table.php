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
        Schema::table('risk_assessment', function (Blueprint $table) {
            $table->renameColumn('risk_id', 'activity_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('risk_assessment', function (Blueprint $table) {
            $table->renameColumn('activity_id', 'risk_id');
        });
    }
};
