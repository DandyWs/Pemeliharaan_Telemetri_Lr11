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
        Schema::table('pemeriksaan', function (Blueprint $table) {
            $table->boolean('hasilPemeriksaan')->after('id');
            $table->string('catatan')->after('hasilPemeriksaan');
            $table
                ->bigInteger('user_id')
                ->unsigned()
                ->after('catatan');
            $table
                ->bigInteger('pemeliharaan_id')
                ->unsigned()
                ->after('user_id');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('pemeliharaan_id')
                ->references('id')
                ->on('pemeliharaan')
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
        Schema::table('pemeriksaan', function (Blueprint $table) {
            $table->dropColumn('hasilPemeriksaan');
            $table->dropColumn('catatan');
            $table->dropColumn('user_id');
            $table->dropColumn('pemeliharaan_id');
            $table->dropForeign('pemeriksaan_user_id_foreign');
            $table->dropForeign('pemeriksaan_pemeliharaan_id_foreign');
        });
    }
};
