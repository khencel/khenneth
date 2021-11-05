<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrigramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trigrams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('element')->nullable();
            $table->integer('number')->nullable();
            $table->string('shape')->nullable();
            $table->string('door')->nullable();
            $table->string('star')->nullable();
            $table->string('direction')->nullable();

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
        Schema::dropIfExists('trigrams');
    }
}
