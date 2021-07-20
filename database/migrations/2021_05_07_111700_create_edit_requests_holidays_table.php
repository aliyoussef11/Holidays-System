<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditRequestsHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edit-holidays-requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->foreign('name')->references('name')->on('users')->onDelete('cascade');
            $table->string('role');
            $table->string('title');
            $table->string('details');
            $table->string('previousDate');
            $table->date('newDate');
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
        //
    }
}
