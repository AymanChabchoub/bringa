<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientIdArticleIdOnLignecommandel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {Schema::enableForeignKeyConstraints();
        Schema::table('ligne_commandes', function (Blueprint $table) {
            $table->unsignedBigInteger('cod_cl');
            $table->Foreign('cod_cl')->references('id')->on('clients')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('cod_co');
            $table->Foreign('cod_co')->references('id')->on('commandes')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('cod_art');
            $table->Foreign('cod_art')->references('id')->on('articles')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ligne_commandes', function (Blueprint $table) {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('ligne_commandes');
        });
    }
}
