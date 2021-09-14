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
            $table->string('libelleMat')->default("NULL");
            $table->string('codeEtabMat')->default("NULL");
            $table->string('sessionMat')->default("0");
            $table->float('coefMat')->default("0");
            $table->integer('classeMat')->default("0");
            $table->integer('teatcherMat')->default("0");
            $table->string('langueMat')->default("NULL");
            $table->string('competenceMat')->default("NULL");
            $table->string('niveauMat')->default("NULL");
            $table->string('cycleMat')->default("NULL");
            $table->string('facultatifMat')->default("NULL");
            $table->date('datecreaMat')->nullable();
            $table->integer('createbyMat')->default("0");
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
