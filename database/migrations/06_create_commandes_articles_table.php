<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes_articles', function (Blueprint $table) {
            $table->foreignId('article_id')->constrained();
            $table->foreignId('commande_id')->constrained();
            $table->integer('quantite')->length(2);
            $table->string('taille', 20);
            $table->string('initiales', 2)->nullable();
            $table->integer('numero')->length(2)->nullable();
            $table->string('flocage', 20)->nullable();
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
        Schema::dropIfExists('commandes_articles');
    }
};
