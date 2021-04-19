<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable()->default('no-avatar.jpg');
            $table->integer('experience')->default(0);
            $table->integer('sinf')->default(1);
            $table->text('about')->nullable();
            $table->text('networks')->nullable();
            $table->string('address')->nullable();
            $table->enum('gender', ['M', 'F'])->default('M');

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
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

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('profiles');

    }
}
