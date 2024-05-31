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
            $table->uuid("id")->primary();
            $table->uuid("user_id");
            $table->text("personal_summmary")->nullable();
            $table->text("recent_education")->nullable();
            $table->text("recent_work")->nullable();
            $table->text("skills")->nullable();
            $table->text("languages")->nullable();
            $table->text("hobbies")->nullable();
            $table->boolean("is_visible")->default(true);
            $table->boolean("avaliable")->default(true);
            $table->string("resume")->nullable();
            $table->string("cover_letter")->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
