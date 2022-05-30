<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->date('trans_date');
            $table->tinyInteger('trans_type')->comment('1 => income , 2 =>  expense');
            $table->integer('in_cat')->nullable();
            $table->integer('exp_cat')->nullable();
            $table->integer('source_id')->nullable();
            $table->integer('source_cat_id')->nullable();
            $table->integer('people_id')->nullable();
            $table->double('amount', 10, 2)->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
