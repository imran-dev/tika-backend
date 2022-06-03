<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dob');
            $table->string('id_no');
            $table->string('phone_no');
            $table->unsignedInteger('center_id');
            $table->date('upcoming_date');
            $table->date('v1_date')->nullable();
            $table->date('v2_date')->nullable();
            $table->string('unique_id');
            $table->unsignedTinyInteger('diabetes');
            $table->timestamps();

            $table->foreign('center_id')->references('id')->on('vaccination_centers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
