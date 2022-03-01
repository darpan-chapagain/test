<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRequest extends Model
{
    use HasFactory;

    protected $primaryKey = 'job_employement_id';

    protected $fillable = ['employee_id','job_id', 'status'];

    public function reqEmployee(){
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
    public function detailJob(){
        // dd('test');
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }
}
