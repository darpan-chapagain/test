<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['user_id','title', 'description', 'size', 'time', 'experience', 'salary_offered', 'job_category_id', 'status'];

    public function jobskill(){
        return $this->hasMany(PostSkill::class, 'job', 'id');
    }

    public function requestJob(){
        // dd($this->hasMany(JobRequest::class, 'job_id'));
        return $this->hasMany(JobRequest::class, 'job_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
