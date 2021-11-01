<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->default('NULL')->onDelete('cascade');
            $table->string('nomParent')->default("NULL");
            $table->string('prenomParent')->default("NULL");
            $table->integer('telParent')->default("0");
            $table->string('professionParent')->default("NULL");
            $table->string('cniParent')->default("NULL");
            $table->string('emailParent')->default("NULL");
            $table->string('sexeParent')->default("NULL");
            $table->integer('statutParent')->default("1");
            $table->string('nationaliteParent')->default("NULL");
            $table->string('addressParent')->default("NULL");
            $table->string('codeEtab')->default("NULL");
            $table->string('session')->default("NULL");
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
        Schema::dropIfExists('parents');
    }
}
