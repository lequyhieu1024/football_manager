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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar', 255)->nullable();
            $table->string('phone', 20)->nullable()->unique();
            $table->string('email')->nullable();
            $table->boolean('gender');
            $table->integer('yob')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->string('position')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('club_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
