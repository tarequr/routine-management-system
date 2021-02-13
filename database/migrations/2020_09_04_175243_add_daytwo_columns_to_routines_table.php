<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDaytwoColumnsToRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('routines', function (Blueprint $table) {
            $table->integer('dayTwoId')->nullable();
            $table->integer('timeTwoId')->nullable();
            $table->integer('roomTwoId')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('routines', function (Blueprint $table) {
            $table->integer('dayTwoId');
            $table->integer('timeTwoId');
            $table->integer('roomTwoId');
        });
    }
}
