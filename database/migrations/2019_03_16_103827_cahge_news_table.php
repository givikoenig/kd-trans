<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CahgeNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->renameColumn('title', 'ru_title');
            $table->renameColumn('text', 'ru_text');
            $table->string('de_title')->nullable();
            $table->text('de_text')->nullable();
            $table->string('en_title')->nullable();
            $table->text('en_text')->nullable();
            $table->string('ch_title')->nullable();
            $table->text('ch_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            //
        });
    }
}
