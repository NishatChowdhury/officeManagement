<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('pr_address_line_one');
            $table->string('pr_address_line_two');
            $table->string('pr_phone_one');
            $table->string('pr_phone_two');
            $table->string('pr_email');
            $table->string('pr_village');
            $table->string('pr_police_station');
            $table->string('pr_post_office');
            $table->string('pr_city_id');
            $table->unsignedBigInteger('pr_country_id');
            $table->string('pa_address_line_one');
            $table->string('pa_address_line_two');
            $table->string('pa_phone_one');
            $table->string('pa_phone_two');
            $table->string('pa_email');
            $table->string('pa_village');
            $table->string('pa_police_station');
            $table->string('pa_post_office');
            $table->string('pa_city_id');
            $table->unsignedBigInteger('pa_country_id');
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
        Schema::dropIfExists('employee_addresses');
    }
}
