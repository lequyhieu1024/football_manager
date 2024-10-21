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
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo', 255)->nullable();
            $table->string('phone', 30);
            $table->string('email')->nullable();
            $table->string('address_text');
            $table->text('address_embedded');
            $table->time('opening_hour')->nullable();
            $table->time('closing_hour')->nullable();
            $table->string('opening_day_id');
            $table->string('primary_color');
            $table->string('manager');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('systems');
    }
};
