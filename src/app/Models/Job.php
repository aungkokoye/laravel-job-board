<?php

namespace App\Models;

use Database\Factories\JobFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public static array $categories = ['IT', 'Finance', 'Sales', 'Marketing', 'Other'];
    public static array $experiences = ['entry', 'intermediate', 'expert'];

    protected $table = 'job_listings';

    protected $fillable = ['title', 'description', 'salary', 'category', 'experience'];

    /** @use HasFactory<JobFactory> */
    use HasFactory;
}
