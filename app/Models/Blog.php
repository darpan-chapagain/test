<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['user_id','title', 'thumb', 'full_img', 'time', 'detail', 'status'];

    public function comments(){
        // dd($this->hasMany(JobRequest::class, 'job_id'));
        return $this->hasMany(BlogComment::class, 'blog_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
