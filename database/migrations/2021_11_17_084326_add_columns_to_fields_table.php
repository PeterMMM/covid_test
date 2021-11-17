<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fields', function (Blueprint $table) {
            $table->date('dob')->comment('Date of birth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('passport')->nullable();
            $table->string('hotel_name')->nullable();
            $table->string('arrival_flight_number')->nullable();
            $table->dateTime('arrival_date_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fields', function (Blueprint $table) {
            $table->dropColumn('dob');
            $table->dropColumn('nationality');
            $table->dropColumn('passport');
            $table->dropColumn('hotel_name');
            $table->dropColumn('arrival_flight_number');
            $table->dropColumn('arrival_date_time');
            
        });
    }
}
