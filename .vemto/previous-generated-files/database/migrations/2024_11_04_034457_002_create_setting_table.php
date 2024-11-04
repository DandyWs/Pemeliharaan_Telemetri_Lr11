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
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->string('namaSetting');
            $table->bigInteger('nilaiSebelumKalibrasi');
            $table->bigInteger('nilaiSesudahKalibrasi');
            $table->bigInteger('displaySebelumKalibrasi');
            $table->bigInteger('displaySesudahKalibrasi');
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
        Schema::dropIfExists('setting');
    }
};
