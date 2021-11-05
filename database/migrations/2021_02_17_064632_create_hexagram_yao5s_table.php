<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHexagramYao5sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hexagram_yao5s', function (Blueprint $table) {
            $table->id();
            $table->integer('hexagram_id');
            $table->integer('hex_transformation_id');
            $table->text('yao_poem');
            $table->text('yao_text');
            $table->integer('rating');
            $table->text('gen_luck');
            $table->text('health');
            $table->text('relationships');
            $table->text('career_wealth');
            $table->text('expectant_mothers');
            $table->text('examinations');
            $table->text('lost_property');
            $table->text('missing_persons');
            $table->text('travel');
            $table->text('legal_matters');
            $table->text('weather');
            $table->text('overall_forecast');
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
        Schema::dropIfExists('hexagram_yao5s');
    }
}
