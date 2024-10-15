<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('job_posts', function (Blueprint $table) {
            $table->string('job_type')->after('status'); // e.g., Full-time, Part-time
            $table->string('education')->after('job_type'); // e.g., Bachelor's Degree
            $table->string('experience')->after('education'); // e.g., 2 years of experience
            $table->text('skills')->nullable()->after('experience'); // Store as a JSON array or string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('job_posts', function (Blueprint $table) {
            $table->dropColumn(['job_type', 'education', 'experience', 'skills']);
        });
    }
};
