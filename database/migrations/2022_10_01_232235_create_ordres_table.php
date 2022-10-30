<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   schema::disableForeignKeyConstraints();
        Schema::create('ordres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('codcl');
            $table->Foreign('codcl') ->references('id')->on('clients');
            $table->unsignedBigInteger('codsh');
            $table->Foreign('codsh') ->references('id')->on('shipings');
            $table->unsignedBigInteger('codpay');
            $table->Foreign('codpay') ->references('id')->on('payments');
            $table->String('total');
            $table->String('status');
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
        Schema::dropIfExists('ordres');
    }
}
