<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays-conditions', function (Blueprint $table) {
            $table->string('name')->index();
            $table->foreign('name')->references('name')->on('users')->onDelete('cascade');
            $table->string('role');
            $table->integer('yearly');
            $table->integer('january');
            $table->integer('february');
            $table->integer('march');
            $table->integer('april');
            $table->integer('may');
            $table->integer('june');
            $table->integer('july');
            $table->integer('august');
            $table->integer('september');
            $table->integer('october');
            $table->integer('november');
            $table->integer('december');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
