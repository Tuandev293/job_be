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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id('profile_id');
            $table->unsignedBigInteger('candidate_id')->unique();
            $table->string('avatar_url', 255)->nullable();
            $table->text('experience')->nullable();
            $table->text('education')->nullable();
            $table->text('skills')->nullable();
            $table->boolean('is_public')->default(true);
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            //foreign key
            $table->foreign('candidate_id')->references('candidate_id')->on('candidates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};