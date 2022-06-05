<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creditor extends Model
{
    use HasFactory;
    public function peoples(){
        return $this->hasOne(People::class,'id','creditor_id');
    }
}
