<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('values', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ru_title', 100)->nullable();
            $table->string('de_title', 100)->nullable();
            $table->string('en_title', 100)->nullable();
            $table->string('ch_title', 100)->nullable();
            $table->text('ru_text')->nullable();
            $table->text('de_text')->nullable();
            $table->text('en_text')->nullable();
            $table->text('ch_text')->nullable();
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
        Schema::dropIfExists('values');
    }
}
