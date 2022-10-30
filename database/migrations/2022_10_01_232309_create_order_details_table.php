<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   schema::disableForeignKeyConstraints();
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('codord');
            $table->Foreign('codord') ->references('id')->on('ordres');
            $table->unsignedBigInteger('codart');
            $table->Foreign('codart') ->references('id')->on('articles')->onDelete('restrict')->onUpdate('restrict');
            $table->String('article_name');
            $table->String('article_price');
            $table->String('article_sales_quantity');
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
        Schema::dropIfExists('order_details');
    }
}
