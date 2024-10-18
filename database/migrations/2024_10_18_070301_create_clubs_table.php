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
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo', 255)->nullable();
            $table->integer('total_members');
            $table->string('phone', 20)->nullable()->unique();
            $table->string('email')->nullable();
            $table->date('founding_date')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('coach_id');
            $table->unsignedBigInteger('manager_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
