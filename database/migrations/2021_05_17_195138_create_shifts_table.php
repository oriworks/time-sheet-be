<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('workday_id');
            $table->foreign('workday_id')->references('id')->on('workdays')->onDelete('cascade');

            $table->unsignedBigInteger('workplace_id')->nullable();
            $table->foreign('workplace_id')->references('id')->on('workplaces')->nullOnDelete();

            $table->date('started_at');
            $table->date('ended_at');

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
        Schema::dropIfExists('shifts');
    }
}
