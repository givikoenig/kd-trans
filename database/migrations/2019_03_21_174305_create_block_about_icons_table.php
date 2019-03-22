<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockAboutIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_about_icons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ru_title', 100)->nullable();
            $table->string('ru_text')->nullable();
            $table->string('de_title',100)->nullable();
            $table->string('de_text')->nullable();
            $table->string('en_title',100)->nullable();
            $table->string('en_text')->nullable();
            $table->string('ch_title',100)->nullable();
            $table->string('ch_text')->nullable();
            $table->string('icon', 50)->nullable();
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
        Schema::dropIfExists('block_about_icons');
    }
}
