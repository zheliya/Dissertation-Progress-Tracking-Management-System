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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapter_id');
            $table->string('title');
            $table->string('submition')->nullable();
            $table->timestamp('submition_date')->nullable()->useCurrentOnUpdate();
            $table->string('template')->nullable();
            $table->string('guidline')->nullable();
            $table->text('student_statement')->nullable();
            $table->text('supervisor_statement')->nullable();
            $table->TINYINT('chapter_status')->default(0);
            $table->timestamp('deadline')->default(DB::raw('DATE_ADD(current_timestamp(), INTERVAL 2 WEEK)'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
