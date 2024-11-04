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
        Schema::table('alatTelemetri', function (Blueprint $table) {
            $table->string('namaAlat')->after('id');
            $table->string('serialNumber')->after('namaAlat');
            $table->string('lokasiStasiun')->after('serialNumber');
            $table->bigInteger('jenis_peralatan_id')->unsigned();
            $table
                ->foreign('jenis_peralatan_id')
                ->references('id')
                ->on('jenisPeralatan')
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
        Schema::table('alatTelemetri', function (Blueprint $table) {
            $table->dropColumn('namaAlat');
            $table->dropColumn('serialNumber');
            $table->dropColumn('lokasiStasiun');
            $table->dropColumn('jenis_peralatan_id');
            $table->dropForeign('alat_telemetri_jenis_peralatan_id_foreign');
        });
    }
};
