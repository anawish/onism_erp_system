<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZenrollePurcahseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zenrolle_purcahse', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->integer('emp_id');
            $table->string('supplier');
            $table->string('invoice_no');
            $table->string('reference_no')->nullable();
            $table->date('order_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('warehouse')->nullable();
            $table->string('tax')->nullable();
            $table->string('discount')->nullable();
            $table->string('invoice_note')->nullable();
            $table->decimal('subtotal');
            $table->decimal('total_tax')->nullable();
            $table->decimal('total_discount')->nullable();
            $table->decimal('shipping')->nullable();
            $table->decimal('total');  
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
        Schema::dropIfExists('zenrolle_purcahse');
    }
}
