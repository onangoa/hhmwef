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
        Schema::table('members', function (Blueprint $table) {
            $table->string('surname')->nullable()->after('last_name');
            $table->date('date_of_birth')->nullable()->after('surname');
            $table->string('birth_certificate_entry_no')->nullable()->after('date_of_birth');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['surname', 'date_of_birth', 'birth_certificate_entry_no']);
        });
    }
};
