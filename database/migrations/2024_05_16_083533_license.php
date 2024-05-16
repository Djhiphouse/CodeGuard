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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->string('app_id');
            $table->string('license_key');
            $table->string('hwid')->nullable();
            $table->string('discord_name')->nullable();
            $table->tinyInteger('state');
            $table->integer('duration');
            $table->dateTime('expires_at')->nullable();
            $table->dateTime('used_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
