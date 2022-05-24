<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\carbon;

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

        DB::table('users')->insert([
            [
            'name'      => 'Superadmin',
            'username'  => 'superadmin',
            'email'     => 'superadmin@gmail.com',
            'mobileNumber'  => '123456789',
            'password'      => md5('superadmin'),
            'status'        =>  1,
            'roleId'        => 1,
            'created_at'    =>  carbon::now()
            ],
            [
                'name'      => 'user',
                'username'  => 'user',
                'email'     => 'user@gmail.com',
                'mobileNumber'  => '12345678',
                'password'      => md5('user'),
                'status'        =>  1,
                'roleId'        => 2,
                'created_at'    =>  carbon::now()
            ]     
        ]);
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
