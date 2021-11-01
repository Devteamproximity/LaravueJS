<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrimestresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trimestres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')->constrained()->default('NULL')->onDelete('cascade');
            $table->string('libelle_semes')->default("NULL");
            $table->string('codeEta_semes')->default("NULL");
            $table->string('statut_semes')->default("NULL");
            $table->string('next_semes')->default("NULL");
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
        Schema::dropIfExists('trimestres');
    }
}
