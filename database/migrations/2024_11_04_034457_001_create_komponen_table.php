<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komponen', function (Blueprint $table) {
            $table->id();
            $table->string('namaKomponen');
            $table->boolean('indikatorLED');
            $table->boolean('simCard');
            $table->boolean('kondisiAlat');
            $table->boolean('sambunganKabel');
            $table->boolean('perawatanSonde');
            $table->boolean('testDanSettingRTC');
            $table->boolean('levelAirAki');
            $table->bigInteger('teganganBateraiAki');
            $table->bigInteger('alat_telemetri_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table
                ->foreign('alat_telemetri_id')
                ->references('id')
                ->on('alatTelemetri')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komponen');
    }
};
