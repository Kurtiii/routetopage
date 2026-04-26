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
        Schema::table('users', function (Blueprint $table) {
            $table->string('github_id')->after('id');
            $table->string('github_username')->after('github_id')->nullable();

            // remove unused column
            $table->dropColumn('password');
            $table->dropColumn('email_verified_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('github_id');
            $table->dropColumn('github_username');

            // add back removed columns
            $table->string('password')->after('github_username');
            $table->timestamp('email_verified_at')->nullable()->after('password');
        });
    }
};
