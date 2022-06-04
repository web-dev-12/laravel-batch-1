<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\carbon;

class CreateExpenseCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_categories', function (Blueprint $table) {
            $table->id();
            $table->string('expense_cat');
            $table->tinyInteger('status')->default(1)->comment("1 => active, 0 => inactive ");
            $table->timestamps();
        });

        DB::table('expense_categories')->insert([
            [
            'expense_cat'      => 'Home Rent',
            'created_at'    =>  carbon::now()
            ],
            [
            'expense_cat'      => 'Transport',
            'created_at'    =>  carbon::now()
            ],
            [
            'expense_cat'      => 'Medicine',
            'created_at'    =>  carbon::now()
            ],     
            [
            'expense_cat'      => 'Food',
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
        Schema::dropIfExists('expense_categories');
    }
}
