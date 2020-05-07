<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZenrolleGrnDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zenrolle_grn_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('grn_id');
            $table->Integer('product_id');
            $table->string('product_name');
            $table->string('product_code')->nullable();
            $table->decimal('order_qty');
            $table->decimal('receive_qty')->nullable();
            $table->string('unit')->nullable();
            $table->string('comments')->nullable();
            $table->foreign('grn_id')->references('id')->on('zenrolle_grn');
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
        Schema::dropIfExists('zenrolle_grn_detail');
    }
}
