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
        Schema::create('portfolio_experiences', function (Blueprint $table) {
            $table->id();

            $table->string('company', 100);
            $table->string('position', 100)->nullable();
            $table->string('type', 50)->nullable(); // Full-time, Internship, Freelance
            $table->text('description')->nullable();

            $table->year('start_year')->nullable();
            $table->year('end_year')->nullable();
            $table->boolean('is_current')->default(false);

            $table->integer('order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_experiences');
    }
};
