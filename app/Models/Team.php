<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name'];

    public function mentors()
    {
        return $this->hasMany(Mentor::class);
    }

    public function interns()
    {
        return $this->hasMany(Intern::class);
    }
}
