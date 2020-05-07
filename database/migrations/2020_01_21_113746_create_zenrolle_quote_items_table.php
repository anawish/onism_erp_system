<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZenrolleQuoteItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zenrolle_quote_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pid');
            $table->Integer('product_id');
            $table->string('product')->nullable();
            $table->string('code')->nullable();
            $table->decimal('qty');
            $table->enum('status',array('sold','reserved'));
            $table->decimal('price');
            $table->enum('price_type',array('Wholesale','Retail'));
            $table->decimal('tax')->nullable();
            $table->decimal('total_tax')->nullable();
            $table->decimal('discount')->nullable();
            $table->decimal('total_amount');
            $table->string('product_desc')->nullable();
            $table->foreign('pid')->references('id')->on('zenrolle_quote');
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
        Schema::dropIfExists('zenrolle_quote_items');
    }
}
