<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAlternatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alternatifs', function (Blueprint $table) {
            $table->integer('popularitas_aplikasi')->nullable();
            $table->integer('kemudahan_fitur')->nullable();
            $table->integer('top_up_biaya_transaksi')->nullable();
            $table->integer('keamanan_bertransaksi')->nullable();
            $table->integer('promosi_diskon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alternatifs', function (Blueprint $table) {
            $table->dropColumn('popularitas_aplikasi');
            $table->dropColumn('kemudahan_fitur');
            $table->dropColumn('top_up_biaya_transaksi');
            $table->dropColumn('keamanan_bertransaksi');
            $table->dropColumn('promosi_diskon');
        });
    }
};
