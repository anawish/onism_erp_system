<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZenrolleEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zenrolle_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_name');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('region')->nullable();
            $table->string('country');
            $table->string('postbox');
            $table->mediumtext('picture');
            $table->string('salary')->nullable();
            $table->string('blance');
            $table->date('joining_date');
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
        Schema::dropIfExists('zenrolle_employees');
    }
}
