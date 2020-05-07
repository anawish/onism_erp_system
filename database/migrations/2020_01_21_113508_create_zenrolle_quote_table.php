<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZenrolleQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zenrolle_quote', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->string('invoice_no');
            $table->date('invoicedate');
            $table->date('invoice_duedate');
            $table->string('refer_no')->nullable();
            $table->unsignedBigInteger('csid');
            $table->unsignedBigInteger('warehouse_id');
            $table->decimal('tax');
            $table->decimal('discount');
            $table->decimal('total_tax')->nullable();
            $table->decimal('shipping')->nullable();
            $table->decimal('sub_total');
            $table->decimal('total');
            $table->string('invoice_note')->nullable();
            $table->enum('status',array('Due','Paid'))->nullable()->cahnge();
            $table->unsignedBigInteger('empid');
            $table->string('pmethod')->nullable();
            $table->decimal('payment')->nullable();
            $table->decimal('p_blance')->nullable();
            $table->decimal('item_qty');
            $table->decimal('terms')->nullable();
            $table->foreign('company_id')->references('company_id')->on('companies');
            $table->foreign('csid')->references('id')->on('zenrolle_customers');
            $table->foreign('warehouse_id')->references('id')
                                                ->on('zenrolle_warehouse');
            $table->foreign('empid')->references('id')->on('zenrolle_employees');
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
        Schema::dropIfExists('zenrolle_quote');
    }
}
