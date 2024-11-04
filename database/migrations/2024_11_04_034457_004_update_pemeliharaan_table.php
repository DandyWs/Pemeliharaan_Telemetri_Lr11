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
        Schema::table('pemeliharaan', function (Blueprint $table) {
            $table->dateTime('tanggalPemeliharaan')->after('id');
            $table
                ->dateTime('waktuMulaiPemeliharaan')
                ->after('tanggalPemeliharaan');
            $table
                ->string('periodePemeliharaan')
                ->after('waktuMulaiPemeliharaan');
            $table->string('cuaca')->after('periodePemeliharaan');
            $table->bigInteger('no_alatUkur')->after('cuaca');
            $table->bigInteger('no_GSM')->after('no_alatUkur');
            $table
                ->bigInteger('user_id')
                ->unsigned()
                ->after('no_GSM');
            $table
                ->bigInteger('alat_telemetri_id')
                ->unsigned()
                ->after('user_id');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::table('pemeliharaan', function (Blueprint $table) {
            $table->dropColumn('tanggalPemeliharaan');
            $table->dropColumn('waktuMulaiPemeliharaan');
            $table->dropColumn('periodePemeliharaan');
            $table->dropColumn('cuaca');
            $table->dropColumn('no_alatUkur');
            $table->dropColumn('no_GSM');
            $table->dropColumn('user_id');
            $table->dropColumn('alat_telemetri_id');
            $table->dropForeign('pemeliharaan_user_id_foreign');
            $table->dropForeign('pemeliharaan_alat_telemetri_id_foreign');
        });
    }
};
