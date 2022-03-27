<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_JobCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['id','job_category_id', 'employee_id'];

    // public function employee(){
    //     return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    // }

    // public function categories(){
    //     return $this->belongsTo(JobCategory::class, 'job_category_id', 'job_category_id');
    // }

}
