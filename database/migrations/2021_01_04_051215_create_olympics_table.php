<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOlympicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olympics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('sinf_id');
            $table->unsignedBigInteger('user_id');
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->text('introduction')->nullable();
            $table->longText('test')->nullable();
            $table->string('pdf_src')->nullable();
            $table->string('img_src')->nullable();
            $table->boolean('is_show');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('subject_id')->references('id')->on('subjects')->cascadeOnDelete();
            $table->foreign('sinf_id')->references('id')->on('sinfs')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olympics');
    }
}
