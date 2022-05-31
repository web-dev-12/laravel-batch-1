<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function banks(){
        return $this->hasOne(Bank::class,'id','source_cat_id');
    }
    public function mobilebankings(){
        return $this->hasOne(MobileBanking::class,'id','source_cat_id');
    }
    public function peoples(){
        return $this->hasOne(People::class,'id','people_id');
    }
    public function incomes(){
        return $this->hasOne(IncomeCategory::class,'id','in_cat');
    }
    public function expenses(){
        return $this->hasOne(ExpenseCategory::class,'id','exp_cat');
    }


}
