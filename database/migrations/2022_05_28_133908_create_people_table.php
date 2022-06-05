<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('p_name');
            $table->string('phone')->nullable();
            $table->string('note')->nullable();
            $table->double('initial_amount');
            $table->double('last_installment')->nullable();
            $table->double('current_due')->nullable();
            $table->bigInteger('user_id');
            $table->tinyInteger('type')->comment('1 =>debitors, 2=> creditors');
            $table->tinyInteger('status')->default(1)->comment('1 =>active, 2=> inactive');
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
        Schema::dropIfExists('people');
    }
}
