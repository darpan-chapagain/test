<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRequest extends Model
{
    use HasFactory;

    protected $primaryKey = 'job_employement_id';

    protected $fillable = ['employee_id','job_id', 'status'];

    public function employees(){
        return $this->belongsTo(Emmployee::class, 'employee_id', 'employee_id');
    }
    public function jobs(){
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }
}
