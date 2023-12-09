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
        Schema::create('sessions', function (Blueprint $table) {
            
                $table->unsignedBigInteger('studentid');
                $table->boolean('isPresent')->default(true);
                $table->string('comments', 200);
                $table->unsignedBigInteger('class_id');
                $table->date('date_marked_for')->nullable();
    
                // Define foreign key constraint
                $table->foreign('class_id')->references('id')->on('classes')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
