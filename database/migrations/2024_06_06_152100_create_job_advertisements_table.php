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
        Schema::create('job_advertisements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('admin_id'); // Admin who posted the job advertisement
            $table->uuid('company_id'); // Company related to the job
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->decimal('salary', 10, 2)->nullable();
            $table->string('type'); // Full-time, Part-time, etc.
            $table->timestamp('posted_at')->useCurrent();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_advertisements');
    }
};
