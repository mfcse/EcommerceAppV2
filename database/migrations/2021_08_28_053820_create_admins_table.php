<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type', 32);
            $table->string('mobile', 32)->unique();
            $table->string('email')->unique();
            $table->string('email_verification_token', 80)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('email_verified')->default(0);
            $table->string('password');
            $table->string('image');
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}