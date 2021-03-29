<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMMTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mmts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mmt_fan_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('cluster_id');
            $table->enum('component', ['A', 'B', 'C']);
            $table->timestamps();
            $table->foreign('mmt_fan_id')->references('id')->on('mmt_fans')->cascadeOnDelete();
            $table->foreign('cluster_id')->references('id')->on('clusters')->cascadeOnDelete();
            $table->foreign('subject_id')->references('id')->on('subjects')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mmts');
    }
}
