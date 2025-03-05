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
            $table->uuid('vacancy_id')->primary();
            $table->string('vacancy_title');
            $table->text('vacancy_description')->nullable();
            $table->uuid('company_id');
            $table->uuid('recruiter_id');
            $table->string('salary_range');
            $table->string('location');
            $table->bigInteger('job_type');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
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
