<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZenrolleGeneralTransactionDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zenrolle__general_transaction_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pid');
            $table->integer('gl_id');
            $table->integer('gl_no');
            $table->string('name');
            $table->string('description')->nullable();
            $table->double('debit')->nullable();
            $table->double('credit')->nullable();
            $table->foreign('pid')->references('id')->on('zenrolle__general_transaction')->onDelete('cascade');
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
        Schema::dropIfExists('zenrolle__general_transaction_detail');
    }
}
