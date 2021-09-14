<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypedeclasseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typedeclasse', function (Blueprint $table) {
            $table->id();
            $table->string('libelleType')->default("NULL");
            $table->string('codeEtabType')->default("NULL");
            $table->string('EtabType')->default("NULL");
            $table->integer('statutType')->default("0");
            $table->date('datecreaType')->nullable();
            $table->integer('createbyType')->default("0");
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
        Schema::dropIfExists('typedeclasse');
    }
}
