<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientIdCodclOnCommande extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::enableForeignKeyConstraints();
        Schema::table('commandes', function (Blueprint $table) {
           
            $table->unsignedBigInteger('cod_cl');
            $table->Foreign('cod_cl') ->references('id')->on('clients')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commandes', function (Blueprint $table) {
            
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['cod_cl']);
        });
    }
}
