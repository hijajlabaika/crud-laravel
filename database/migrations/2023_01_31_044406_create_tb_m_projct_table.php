<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMProjctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_projct', function (Blueprint $table) {
            $table->id();
            $table->string('project_name', 100);
            $table->date('project_start');
            $table->date('project_end');
            $table->char('project_status', 15);
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('tb_m_client');
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
        Schema::dropIfExists('tb_m_projct');
    }
}
