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
        Schema::table('applications', function (Blueprint $table) {
            $table->string('educational_transcript')->nullable()->after('resume'); // Adding the educational_transcript column
            $table->string('id_proof')->nullable()->after('educational_transcript'); // Adding the id_proof column
        });
    }

    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('educational_transcript'); // Drop the educational_transcript column
            $table->dropColumn('id_proof'); // Drop the id_proof column
        });
    }
};
