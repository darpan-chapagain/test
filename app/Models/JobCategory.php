<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_name'];

    public function employees(){
        return $this->hasMany(Employee::class, 'Job_Category_ID', 'job_category_id');
    }

}
