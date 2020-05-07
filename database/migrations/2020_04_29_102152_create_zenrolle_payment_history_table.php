<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZenrollePaymentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zenrolle_payment_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('gl_id')->nullable();
            $table->Integer('gl_no')->nullable();
            $table->string('gl_name')->nullable();
            $table->string('type')->nullable();
            $table->Double('debit')->nullable();
            $table->Double('credit')->nullable();
            $table->date('updated_date')->nullable();
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
        Schema::dropIfExists('zenrolle_payment_history');
    }
}
