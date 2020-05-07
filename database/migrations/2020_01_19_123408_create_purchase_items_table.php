<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pid')->unsigned();
            $table->string('product_id');
            $table->string('product_name');
            $table->string('product_code')->nullable();
            $table->decimal('qty');
            $table->decimal('tax')->nullable();
            $table->decimal('discount')->nullable();
            $table->decimal('ammount');
            $table->string('product_desc')->null();
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
        Schema::dropIfExists('purchase_items');
    }
}
