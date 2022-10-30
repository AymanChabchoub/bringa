<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategorieIdArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  Schema::enableForeignKeyConstraints();

        Schema::table('articles', function (Blueprint $table) {
            $table->unsignedBigInteger('categorie_id');
            $table->Foreign('categorie_id') ->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            Schema::enableForeignKeyConstraints();
            $table->dropForeign(['categorie_id']);
        });
    }
}
