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
        
        Schema::create('vacancy', function (Blueprint $table) {
            $table->id(); // This automatically creates an integer primary key autoincrement column named 'id'
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('salary_range');
            $table->string('location');
            $table->integer('job_type');
            $table->timestamps();
        
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancy');
    }
};
