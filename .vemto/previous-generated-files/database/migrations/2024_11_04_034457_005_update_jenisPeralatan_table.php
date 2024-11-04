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
        Schema::table('jenisPeralatan', function (Blueprint $table) {
            $table->string('namaJenisAlat')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jenisPeralatan', function (Blueprint $table) {
            $table->dropColumn('namaJenisAlat');
        });
    }
};
