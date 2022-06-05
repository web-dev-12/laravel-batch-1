<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\carbon;

class CreateMobileBankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_bankings', function (Blueprint $table) {
            $table->id();
            $table->string('mbk_name');
            $table->tinyInteger('status')->default(1)->comment("1 => active, 0 => inactive ");
            $table->timestamps();
        });

        DB::table('mobile_bankings')->insert([
            [
            'mbk_name'      => 'Bkash',
            'created_at'    =>  carbon::now()
            ],
            [
            'mbk_name'      => 'Rocket',
            'created_at'    =>  carbon::now()
            ],
            [
            'mbk_name'      => 'Nagad',
            'created_at'    =>  carbon::now()
            ],     
            [
            'mbk_name'      => 'Mcash',
            'created_at'    =>  carbon::now()
            ],     
            [
            'mbk_name'      => 'Sure Cash',
            'created_at'    =>  carbon::now()
            ],     
            [
            'mbk_name'      => 'Trust Axiata Pay',
            'created_at'    =>  carbon::now()
            ],     
            [
            'mbk_name'      => 'Upay',
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
        Schema::dropIfExists('mobile_bankings');
    }
}
