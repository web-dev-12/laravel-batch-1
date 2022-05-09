<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function studentclass(){
        return $this->hasOne(StudentClass::class,'id','class_id');
    }
}
