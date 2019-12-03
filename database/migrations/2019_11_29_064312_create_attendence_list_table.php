<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendenceListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendence_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dates');
            $table->integer('class_id');
            $table->integer('secton_id');
            $table->integer('student_id');
            $table->enum("status",["yes","no"]);
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
        Schema::dropIfExists('attendence_list');
    }
}
