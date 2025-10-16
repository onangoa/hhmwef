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
            $table->renameColumn('phone_number', 'phone_numbers');
            $table->renameColumn('workstation', 'work_station');
            $table->string('state_department')->after('department');
            $table->string('postal_address')->after('phone_numbers');
            $table->boolean('declaration_agree')->default(false)->after('postal_address');
            $table->string('payroll_number')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->renameColumn('phone_numbers', 'phone_number');
            $table->renameColumn('work_station', 'workstation');
            $table->dropColumn('state_department');
            $table->dropColumn('postal_address');
            $table->dropColumn('declaration_agree');
            $table->string('payroll_number')->nullable()->change();
        });
    }
};
