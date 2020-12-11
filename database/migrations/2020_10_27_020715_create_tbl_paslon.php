<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPaslon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_paslon', function (Blueprint $table) {
            $table->bigIncrements('id_paslon');
            $table->string('ketua_paslon');
            $table->string('wakil_paslon');
            $table->text('visi_misi_paslon');
            $table->text('slogan_paslon');
            $table->string('img_ketua');
            $table->string('img_wakil');
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
        Schema::dropIfExists('tbl_paslon');
    }
}
