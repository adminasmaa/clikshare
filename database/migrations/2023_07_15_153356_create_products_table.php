<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBiginteger('category_id');
            $table->unsignedBiginteger('price');
            $table->string('sku')->nullable();
            $table->boolean('manage_stock')->nullable();
            $table->integer('qty')->nullable();
            $table->boolean('in_stock')->nullable();
            $table->integer('status')->default(1)->comment("1 => Pending, 2 => Rejected, 3 => Approved");
            $table->string('cover_photo')->nullable();
            $table->string('product_photo')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->string('created_on');
            $table->unsignedBigInteger('modified_by')->nullable();
            $table->string('modified_on')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->string('approved_on')->nullable();
            $table->text('reject_reason')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('modified_by')->references('id')->on('users');
            $table->foreign('approved_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
