<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSkill extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    
    public $timestamps = false;

    protected $fillable = ['skill'];

    public function jobskill(){
        return $this->belongsTo(Skill::class, 'skill');
    }
    public function skilljob(){
        return $this->belongsTo(Job::class, 'job');
    }
}
