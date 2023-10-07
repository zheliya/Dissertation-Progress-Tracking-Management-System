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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('department');
            $table->string('major')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('users');
    }
};




/* 
	migrations	               1 done
    failed_jobs		           2 done
	password_resets	 	       3 done
	password_reset_tokens	   4 done
	personal_access_tokens	   5 done
	users                      6 done 1
    roles                      7 done 2
    user_roles                 8 done 3
    project_users              9 done 4
    project_queries	          10 done 5
    projects                  11 done 6
    chapters                  12 done 7
    tasks                     13 done 8
	history_files	          14 done 9

*/