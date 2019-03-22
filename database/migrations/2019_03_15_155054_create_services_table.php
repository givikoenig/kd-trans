<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ru_title',255)->nullable();
            $table->string('de_title',255)->nullable();
            $table->string('en_title',255)->nullable();
            $table->string('ch_title',255)->nullable();
            $table->text('ru_text')->nullable();
            $table->text('de_text')->nullable();
            $table->text('en_text')->nullable();
            $table->text('ch_text')->nullable();
            $table->string('alias',150)->unique();
            $table->string('img',255)->nullable();
            $table->string('img2',255)->nullable();
            $table->string('keywords')->nullable();
            $table->string('meta_desc')->nullable();
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
        Schema::dropIfExists('services');
    }
}
