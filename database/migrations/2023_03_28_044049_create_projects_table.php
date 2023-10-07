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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->foreignId('supervisor_id');
            $table->foreignId('student_id')->unique();
            
            $table->boolean('confirm_title')->default(0);
            $table->string('title')->nullable();
            $table->string('subtittle')->nullable();
            $table->string('department');
            $table->decimal('project_status', 5, 2)->default(0);
            $table->timestamp('deadline')->default(DB::raw('DATE_ADD(current_timestamp(), INTERVAL 40 WEEK)'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
