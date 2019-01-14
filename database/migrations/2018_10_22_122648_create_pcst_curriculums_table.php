<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcstCurriculumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcst_curriculums', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pcst_program_id')->unsigned();
            $table->integer('pcst_class_year_id')->unsigned();
            $table->integer('pcst_semester_id')->unsigned();

            $table->foreign('pcst_program_id')->references('id')->on('pcst_programs');
            $table->foreign('pcst_class_year_id')->references('id')->on('pcst_class_years');
            $table->foreign('pcst_semester_id')->references('id')->on('pcst_semesters');
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
        Schema::dropIfExists('pcst_curriculums');
    }
}
