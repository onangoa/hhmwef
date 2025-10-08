<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();

        $table->string('first_name');
        $table->string('middle_name')->nullable();
        $table->string('last_name');
        $table->string('phone_number');
        $table->string('email');
        $table->string('id_number');
        $table->string('payroll_number')->nullable();
        $table->string('institution')->nullable();
        $table->string('workstation')->nullable();
        $table->string('department')->nullable();
        $table->string('nextofkin_name')->nullable();
        $table->string('nextofkin_phone_number')->nullable();
        $table->string('nextofkin_id_number')->nullable();
        $table->string('nextofkin_email')->nullable();
        $table->string('nextofkin_address')->nullable();
        $table->string('nextofkin_Relationship')->nullable();
        $table->string('nextofkin_name_alt')->nullable();
        $table->string('nextofkin_phone_number_alt')->nullable();
        $table->string('nextofkin_Relationship_alt')->nullable();
        $table->string('spouse_name')->nullable();
        $table->string('spouse_phone_number')->nullable();
        $table->string('spouse_id_number')->nullable();
        $table->string('spouse_email')->nullable();
        $table->string('spouse_address')->nullable();
        $table->json('child_name')->nullable();
        $table->json('child_age')->nullable();
        $table->json('child_phone_number')->nullable();
        $table->json('parent_name')->nullable();
        $table->json('parent_relationship')->nullable();

            
            $table->bigInteger('branch_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('country_code', 10)->nullable();
            $table->string('mobile', 50)->nullable();
            $table->string('business_name', 100)->nullable();
            $table->string('member_no', 50)->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('city', 191)->nullable();
            $table->string('state', 191)->nullable();
            $table->string('zip', 50)->nullable();
            $table->text('address')->nullable();
            $table->string('credit_source', 191)->nullable();
            $table->string('photo', 191)->nullable();
            $table->text('custom_fields')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
