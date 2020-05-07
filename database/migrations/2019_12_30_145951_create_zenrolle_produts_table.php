<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZenrolleProdutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zenrolle_produts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('category_id');
            $table->string('sub_category');
            $table->Integer('company_id');
            $table->Integer('warehouse');
            $table->string('product_name');
            $table->string('product_code')->nullable();
            $table->decimal('retail_price',16,2);
            $table->decimal('wholsale_price',16,2);
            $table->decimal('tax_rate',16,2);
            $table->decimal('discount_rate',16,2)->nullable();
            $table->decimal('qty',10,2);
            $table->integer('alert_qty');
            $table->string('barcode')->nullable();
            $table->string('product_desc')->nullable();
            $table->string('emp_bonus')->nullable();
            $table->string('image',255)->nullable();
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
        Schema::dropIfExists('zenrolle_produts');
    }

    public function zenrolle_produts()){
        return $this->belongsTo(Add_Product_Category::class, 'category_id');
    }
}
