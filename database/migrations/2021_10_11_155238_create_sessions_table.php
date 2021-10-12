<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string('libelle_sess')->default("NULL");
            $table->string('codeEtab_sess')->default("NULL");
            $table->string('encours_sess')->default("NULL");
            $table->string('status_sess')->default("NULL");
            $table->string('type_sess')->default("NULL");
            $table->string('datedeb_sess')->default("NULL");
            $table->string('datefin_sess')->default("NULL");
            $table->string('celendar_sess')->default("NULL");
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
        Schema::dropIfExists('sessions');
    }
}
