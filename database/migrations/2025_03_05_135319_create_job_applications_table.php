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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id('application_id');
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('cv_id')->nullable();
            $table->text('cover_letter')->nullable();
            $table->enum('status', ['Pending', 'Viewed', 'Accepted', 'Rejected'])->default('Pending');
            $table->timestamp('applied_at')->useCurrent();

            // foreign key
            $table->foreign('candidate_id')->references('candidate_id')->on('candidates')->onDelete('cascade');
            $table->foreign('job_id')->references('job_id')->on('job_postings')->onDelete('cascade');
            $table->foreign('cv_id')->references('cv_id')->on('uploaded_cvs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};