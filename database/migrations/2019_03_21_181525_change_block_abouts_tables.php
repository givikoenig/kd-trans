<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBlockAboutsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('block_abouts', function (Blueprint $table) {
            $table->text('ru_text1')->nullable()->change();
            $table->text('de_text1')->nullable()->change();
            $table->text('en_text1')->nullable()->change();
            $table->text('ch_text1')->nullable()->change();
            $table->text('ru_text2')->nullable()->change();
            $table->text('de_text2')->nullable()->change();
            $table->text('en_text2')->nullable()->change();
            $table->text('ch_text2')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('block_abouts', function (Blueprint $table) {
            //
        });
    }
}
