<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('mobile_number')->nullable();
            $table->integer('age')->nullable();
            $table->integer('gender')->comment('0=>male,1=>female,2=>other')->nullable();
            $table->string('city')->comment('bk/pk/ks/cm')->nullable();
            $table->string('test_type')->nullable();
            $table->string('document')->nullable();
            $table->string('test_location')->nullable();
            $table->string('antigen_test_location')->nullable();
            $table->string('antibody_test_location')->nullable();
            $table->integer('person_no')->nullable();
            $table->string('pcr_location')->nullable();
            $table->string('cb_pcr_location')->nullable();
            $table->string('cb_antigen_location')->nullable();
            $table->string('cm_pcr_location')->nullable();
            $table->string('cm_antigen_location')->nullable();
            $table->string('pk_pcr_location')->nullable();
            $table->string('pk_antigen_location')->nullable();
            $table->string('drive_through_pcr_test')->nullable();
            $table->string('car_detail')->nullable();
            $table->string('home_address')->nullable();
            $table->dateTime('app_date_time')->comment('app_date + app_time')->nullable();
            $table->text('add_info')->nullable();
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
        Schema::dropIfExists('fields');
    }
}
