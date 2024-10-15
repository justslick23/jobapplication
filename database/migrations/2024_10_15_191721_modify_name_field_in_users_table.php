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
        Schema::table('users', function (Blueprint $table) {
            // Drop the existing name column
            $table->dropColumn('name');

            // Add first_name and last_name columns after the id column
            $table->string('first_name')->nullable()->after('id');
            $table->string('last_name')->nullable()->after('first_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Recreate the name column if rolled back
            $table->string('name')->nullable()->after('id');
            
            // Drop first_name and last_name columns
            $table->dropColumn(['first_name', 'last_name']);
        });
    }
};
