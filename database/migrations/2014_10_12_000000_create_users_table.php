<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->unique();
            $table->string('user_type', 255)->nullable();
            $table->string('contact_number', 255)->nullable();
            $table->string('otp', 5)->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('provider_id')->nullable();
            $table->string('address')->nullable();
            $table->enum('gender',['male','female','others'])->nullable();
            $table->integer ('age')->nullable();
            $table->string('total_experiance')->nullable()->default('0');
            $table->json('available_hours')->nullable(); //array
            $table->json('available_days')->nullable(); //array
            // $table->json('skills')->nullable(); //array
            $table->string('preferred_work_location')->nullable();
            $table->string('preferred_work_type')->nullable();
            $table->string('emergency_number',255)->nullable();
            $table->string('emergency_contact_person',255)->nullable();
            $table->string('health_issues')->nullable();
            $table->string('aadhar_card_image')->nullable();
            $table->string('local_address_proof')->nullable();
            $table->string('self_photo')->nullable();
            $table->string('player_id')->nullable();
            $table->tinyInteger('status')->nullable()->default('1');
            $table->string('display_name')->nullable();
            $table->unsignedBigInteger('providertype_id')->nullable();
            $table->tinyInteger('is_featured')->nullable()->default('0');
            $table->string('time_zone')->default('UTC');
            $table->timestamp('last_notification_seen')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
