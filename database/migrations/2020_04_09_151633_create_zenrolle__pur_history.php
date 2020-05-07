<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZenrollePurHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zenrolle__pur_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('po_id');
            $table->Integer('vendor_id');
            $table->double('payment')->nullable();
            $table->double('debit')->nullable();
            $table->double('credit')->nullable();
            $table->double('closing_balance');
            $table->string('payment_method');
            $table->string('type');
            $table->string('payment_note')->nullable();
            $table->date('updated_date');
            $table->foreign('po_id')->references('id')->on('zenrolle_purcahse')->onDelete('cascade');
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
        Schema::dropIfExists('zenrolle__pur_history');
    }
}
