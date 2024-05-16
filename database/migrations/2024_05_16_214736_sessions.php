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
        Schema::create('user_sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('app_id')->nullable();
            $table->string('discord_name')->nullable();
            $table->tinyInteger('killed')->nullable();
            $table->tinyInteger('screenshot')->nullable();
            $table->tinyInteger('screenshot_accepted')->nullable();
            $table->dateTime('joined');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_sessions');
    }
};
