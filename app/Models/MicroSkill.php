<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicroSkill extends Model
{
    use HasFactory;

    protected $table = 'micro_skills';

    protected $fillable = [
        'judul_micro',
        'link_micro',
    ];
}
