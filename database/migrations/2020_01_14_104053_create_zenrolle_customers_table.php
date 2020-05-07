<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZenrolleCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zenrolle_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->string('postbox')->nullable();
            $table->string('company')->nullable();
            $table->string('taxid')->nullable();
            $table->unsignedBigInteger('gid');
            $table->string('name_s')->nullable();
            $table->string('phone_s')->nullable();
            $table->string('email_s')->nullable();
            $table->string('address_s')->nullable();
            $table->string('city_s')->nullable();
            $table->string('region_s')->nullable();
            $table->string('country_s')->nullable();
            $table->string('postbox_s')->nullable();
            $table->unsignedBigInteger('route_id');
            $table->foreign('company_id')->references('company_id')->on('companies');
            $table->foreign('gid')->references('id')->on('zenrolle_cust_group');
            $table->foreign('route_id')->references('id')->on('zenrolle_cust_route');
            
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
        Schema::dropIfExists('zenrolle_customers');
    }
}
