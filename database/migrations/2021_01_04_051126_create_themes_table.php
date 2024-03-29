<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('user_id');
            $table->string('theme_num');
            $table->string('name');
            $table->text('introduction')->nullable();
            $table->string('video_src')->nullable();
            $table->string('pdf_src')->nullable();
            $table->longText('test')->nullable();
            $table->text('pdf_exercise')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('is_show')->default(0);
            $table->integer('view_count')->default(0);
            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('plans')->cascadeOnDelete();
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
        Schema::dropIfExists('themes');
    }
}
