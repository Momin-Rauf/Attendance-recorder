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
                $table->id('id');
                $table->string('fullname', 200);
                $table->string('email', 200);
                $table->string('class', 200);
                
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->enum('role', ['teacher', 'student'])->default('teacher');
                $table->rememberToken();
                $table->timestamps();
            });
        }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
