<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('deptId');
            $table->integer('semesterId');
            $table->integer('teacherId');
            $table->integer('batchId')->nullable();
            $table->integer('courseId');
            $table->integer('sectionId');
            $table->integer('dayId')->nullable();
            $table->integer('timeId')->nullable();
            $table->integer('roomId')->nullable();
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
        Schema::dropIfExists('routines');
    }
}
