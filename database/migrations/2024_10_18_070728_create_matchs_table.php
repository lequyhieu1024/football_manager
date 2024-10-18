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
        Schema::create('matchs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->unsignedBigInteger('club1_id');
            $table->integer('banner_club1')->nullable();
            $table->unsignedBigInteger('club2_id');
            $table->integer('banner_club2')->nullable();
            $table->enum('match_type', [7,9,11]);
            $table->date('at_day');
            $table->time('at_time');
            $table->integer('match_duration');
            $table->enum('status', ['not_started', 'in_progress', 'completed'])->default('not_started');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('yard_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matchs');
    }
};
