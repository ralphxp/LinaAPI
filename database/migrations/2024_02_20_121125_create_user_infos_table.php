<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('bio')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('lookingFor')->nullable();
            $table->string('interestedIn')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_infos');
    }
};
