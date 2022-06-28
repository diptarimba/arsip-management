<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetencyDevelopment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file',
        'code',
        'date'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
