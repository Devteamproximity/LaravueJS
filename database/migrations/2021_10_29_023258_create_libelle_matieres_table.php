<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibelleMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libelle_matieres', function (Blueprint $table) {
            $table->id();
            $table->string('libelle')->default("NULL");
            $table->string('session')->default("NULL");
            $table->string('codeEtab')->default("NULL");
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
        Schema::dropIfExists('libelle_matieres');
    }
}
