<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNiveaudeclasseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveaudeclasse', function (Blueprint $table) {
            $table->id();
            $table->string('libelleNiveau')->default("NULL");
            $table->string('codeEtabNiveau')->default("NULL");
            $table->string('EtabNiveau')->default("NULL");
            $table->integer('statutNiveau')->default("0");
            $table->date('datecreaNiveau')->nullable();
            $table->integer('createbyNiveau')->default("0");
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
        Schema::dropIfExists('niveaudeclasse');
    }
}
