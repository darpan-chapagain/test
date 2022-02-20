<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';

    protected $fillable = ['user_id','qualification', 'hourly_rate', 'rating', 'experience', 'skills', 'employee_type', 'Job_Category_ID'];


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
