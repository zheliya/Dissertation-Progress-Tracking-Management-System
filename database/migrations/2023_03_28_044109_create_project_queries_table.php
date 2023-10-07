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
        Schema::create('project_queries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->unique();
            $table->string('title');
            $table->string('template')->nullable();
            $table->string('guidline')->nullable();
            $table->timestamp('deadline')->default(DB::raw('DATE_ADD(current_timestamp(), INTERVAL 40 WEEK)'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_queries');
    }
};
