<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   schema::disableForeignKeyConstraints();
        Schema::create('clients', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->Foreign('id') ->references('id')->on('users');
            $table->String('email');
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
        Schema::dropIfExists('clients');
    }
}
