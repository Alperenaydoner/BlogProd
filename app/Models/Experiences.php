<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'organization',
        'job_start_date',
        'job_end_date',
        'job_description',
    ];


    protected $casts = [
    ];
}
