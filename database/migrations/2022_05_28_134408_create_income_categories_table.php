<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\carbon;

class CreateIncomeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('income_name');
            $table->tinyInteger('status')->default(1)->comment("1 => active, 0 => inactive ");
            $table->timestamps();
        });
        DB::table('income_categories')->insert([
            [
            'income_name'      => 'Sallary',
            'created_at'    =>  carbon::now()
            ],
            [
            'income_name'      => 'House Rent',
            'created_at'    =>  carbon::now()
            ],
            [
            'income_name'      => 'Shop Rent',
            'created_at'    =>  carbon::now()
            ],     
            [
            'income_name'      => 'FDR',
            'created_at'    =>  carbon::now()
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
        Schema::dropIfExists('income_categories');
    }
}
