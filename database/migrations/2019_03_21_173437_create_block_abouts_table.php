<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ru_title1', 100)->nullable();
            $table->string('ru_text1')->nullable();
            $table->string('de_title1',100)->nullable();
            $table->string('de_text1')->nullable();
            $table->string('en_title1',100)->nullable();
            $table->string('en_text1')->nullable();
            $table->string('ch_title1',100)->nullable();
            $table->string('ch_text1')->nullable();
            $table->string('ru_title2', 100)->nullable();
            $table->string('ru_text2')->nullable();
            $table->string('de_title2',100)->nullable();
            $table->string('de_text2')->nullable();
            $table->string('en_title2',100)->nullable();
            $table->string('en_text2')->nullable();
            $table->string('ch_title2',100)->nullable();
            $table->string('ch_text2')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('block_abouts');
    }
}
