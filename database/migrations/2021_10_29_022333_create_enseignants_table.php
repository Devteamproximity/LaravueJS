<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->default('NULL')->onDelete('cascade');
            $table->string('nom')->default("NULL");
            $table->string('prenom')->default("NULL");
            $table->integer('tel')->default("0");
            $table->string('email')->default("NULL");
            $table->string('sexe')->default("NULL");
            $table->integer('statut')->default("1");
            $table->string('nationalite')->default("NULL");
            $table->string('situation')->default("NULL");
            $table->string('matricule')->default("NULL");
            $table->string('salaire')->default("NULL");
            $table->string('dateEmbauche')->default("NULL");
            $table->integer('type')->default("1");
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
        Schema::dropIfExists('enseignants');
    }
}
