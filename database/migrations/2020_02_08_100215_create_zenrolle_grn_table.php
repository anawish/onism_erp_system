<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZenrolleGrnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zenrolle_grn', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('grn_no');
            $table->date('doc_date');
            $table->date('posting_date');
            $table->Integer('po_no');
            $table->string('warehouse');
            $table->string('category')->nullable();
            $table->string('delivery_note')->nullable();
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
        Schema::dropIfExists('zenrolle_grn');
    }

}
