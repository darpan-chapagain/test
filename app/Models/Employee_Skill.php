<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_Skill extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['id','skill_id', 'employee_id'];
}
