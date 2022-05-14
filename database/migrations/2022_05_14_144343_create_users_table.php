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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('mobileNumber')->unique();
            $table->string('email_verified_at')->nullable();
            $table->boolean('status')->comment('0 => Inactive, 1=> Active, 2=> Pending, 3=> Block ');
            $table->unsignedTinyInteger('roleId');
            $table->foreign('roleId')->references('id')->on('roles')->onDelete('cascade');
            $table->string('password');
            $table->index(['username']);
            $table->index(['email']);
            $table->index(['mobileNumber']);
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
