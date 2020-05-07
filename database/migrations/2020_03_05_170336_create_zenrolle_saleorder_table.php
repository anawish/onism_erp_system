<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZenrolleSaleorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zenrolle_saleorder', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('company_id')->nullable();
            $table->Integer('order_no');
            $table->string('po_no')->nullable();
            $table->string('qty_kg')->nullable();
            $table->string('qty_each')->nullable();
            $table->date('order_date');
            $table->date('delivery_date');
            $table->string('order_note');
            $table->DOUBLE('subtotal');
            $table->DOUBLE('shipping');
            $table->DOUBLE('total');
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
        Schema::dropIfExists('zenrolle_saleorder');
    }
}
