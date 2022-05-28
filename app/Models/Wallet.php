<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    public function banks(){
        return $this->hasOne(Bank::class,'id','bank_id');
    }
    public function mobilebankings(){
        return $this->hasOne(MobileBanking::class,'id','mobile_bank_id');
    }
}
