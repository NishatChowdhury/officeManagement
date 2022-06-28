<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_no');
            $table->string('name');
            $table->string('bn_name');
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->date('dob');
            $table->unsignedBigInteger('marital_status_id');
            $table->string('spouse')->nullable();
            $table->unsignedBigInteger('blood_group_id');
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->string('nid');
            $table->string('passport')->nullable();
            $table->string('driving_license')->nullable();
            $table->string('image');
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
        Schema::dropIfExists('employees');
    }
}
