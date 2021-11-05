<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalConsultantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_consultants', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('schedule_user_id');
            $table->integer('type');
            $table->string('cast_type');
            $table->string('question');
            $table->text('details');
            $table->text('comment')->nullable();
            $table->integer('original_hex_id')->nullable();
            $table->string('hex_focus')->nullable();
            $table->integer('transform_hex_id')->nullable();
            $table->integer('trigram_id')->nullable();
            $table->string('date');
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
        Schema::dropIfExists('journal_consultants');
    }
}
