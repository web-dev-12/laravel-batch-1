<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\carbon;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->tinyInteger('status')->default(1)->comment("1 => active, 0 => inactive ");
            $table->timestamps();
        });

        DB::table('banks')->insert([
            [
            'bank_name'      => 'Bank Asia',
            'created_at'    =>  carbon::now()
            ],
            [
            'bank_name'      => 'DBBL',
            'created_at'    =>  carbon::now()
            ],
            [
            'bank_name'      => 'EBL',
            'created_at'    =>  carbon::now()
            ],     
            [
            'bank_name'      => 'Standard Chatered',
            'created_at'    =>  carbon::now()
            ],     
            [
            'bank_name'      => 'IFIC',
            'created_at'    =>  carbon::now()
            ],     
            [
            'bank_name'      => 'AB Bank',
            'created_at'    =>  carbon::now()
            ],     
            [
            'bank_name'      => 'Premier Bank',
            'created_at'    =>  carbon::now()
            ],     
            [
            'bank_name'      => 'UCBL',
            'created_at'    =>  carbon::now()
            ],     
            [
            'bank_name'      => 'City Bank',
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
        Schema::dropIfExists('banks');
    }
}
