<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('wallet_name');
            $table->string('wallet_type')->default(1)->comment('1 => moneybag|Cash, 2=> Bank, 3 => Mobile Banking');
			$table->decimal('amount',10,2);
            $table->integer('mobile_bank_id')->nullable();
            $table->integer('bank_id')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('wallets');
    }
}
