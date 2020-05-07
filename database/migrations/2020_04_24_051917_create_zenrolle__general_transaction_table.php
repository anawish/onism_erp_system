<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZenrolleGeneralTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zenrolle__general_transaction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction_type');
            $table->date('doc_date');
            $table->date('posting_date');
            $table->integer('doc_no');
            $table->double('net_balance');
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
        Schema::dropIfExists('zenrolle__general_transaction');
    }
}
