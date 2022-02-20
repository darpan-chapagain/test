<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['Role'];

    public function skilljob(){
        return $this->hasMany(PostSkill::class, 'skill', 'id');
    }
}
