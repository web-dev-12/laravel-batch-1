<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\carbon;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('type',20)->unique();
            $table->string('identity',30)->unique();
            $table->timestamps();
        });

        /*Default Role To Insert */
        DB::table('roles')->insert([
            [
                'type'          =>'Superadmin',
                'identity'      =>'superadmin',
                'created_at'    => carbon::now()   
            ],
            [
                'type'          =>'User',
                'identity'      =>'user',
                'created_at'    => carbon::now()   
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
