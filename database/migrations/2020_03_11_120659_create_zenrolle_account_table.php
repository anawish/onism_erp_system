<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZenrolleAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zenrolle_account', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gl_no');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('account_type');
            $table->double('closing_bla')->nullable();
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
        Schema::dropIfExists('zenrolle_account');
    }
}
