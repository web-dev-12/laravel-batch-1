<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('debitors', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('d_name');
        //     $table->string('phone')->nullable();
        //     $table->string('note')->nullable();
        //     $table->double('due_amount');
        //     $table->double('amount_to_be_updated');
        //     $table->double('amount_after_update');
        //     $table->bigInteger('user_id');
        //     $table->bigInteger('p_id');
        //     $table->tinyInteger('type')->comment('1 =>debitors, 2=> creditors');
        //     $table->tinyInteger('status')->default(1)->comment('1 =>active, 2=> inactive');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debitors');
    }
}
