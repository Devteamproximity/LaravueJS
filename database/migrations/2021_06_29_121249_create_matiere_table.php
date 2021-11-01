<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatiereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matiere', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classe_id')->constrained()->default('0')->onDelete('cascade');
            $table->foreignId('enseignant_id')->constrained()->default('0')->onDelete('cascade');
            $table->string('libelle')->default("NULL");
            $table->string('codeEtab')->default("NULL");
            $table->string('session')->default("0");
            $table->float('coef')->default("0");
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
        Schema::dropIfExists('matiere');
    }
}
