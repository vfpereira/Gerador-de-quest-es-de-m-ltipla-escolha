<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('id_categories')->unsigned();
            $table->foreign('id_categories')->references('id')->on('categories');
            $table->string('title');
            $table->string('answera');
            $table->string('answerb');
            $table->string('answerc');
            $table->string('answerd');
            $table->string('answere');
            $table->string('correctanswer',1);
            $table->boolean('deleted')->default(false);
            $table->boolean('active')->default(true);

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
        Schema::dropIfExists('questions');
    }
}
