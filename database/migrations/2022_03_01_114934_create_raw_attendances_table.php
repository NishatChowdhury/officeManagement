<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_attendances', function (Blueprint $table) {
            $table->id();
            $table->string('unit_name');
            $table->string('registration_id');
            $table->bigInteger('access_id');
            $table->string('department');
            $table->time('access_time');
            $table->date('access_date');
            $table->string('user_name');
            $table->string('unit_id');
            $table->string('card');
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
        Schema::dropIfExists('raw_attendances');
    }
}
