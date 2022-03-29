<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';

    protected $fillable = ['user_id','qualification', 'hourly_rate', 'rating', 'experience', 'skills', 'employee_type', 'job_category_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jobRequests(){
        return $this->hasMany(JobRequest::class, 'employee_id', 'employee_id');
    }

    public function jobCategories(){
        return $this->hasOne(JobCategory::class, 'job_category_id', 'Job_Category_ID');
    }
}
