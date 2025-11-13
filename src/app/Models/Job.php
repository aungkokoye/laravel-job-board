<?php

namespace App\Models;

use Database\Factories\JobFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * @method static filter(array $filters)
 */
class Job extends Model
{
    public static array $categories = ['IT', 'Finance', 'Sales', 'Marketing', 'Other'];
    public static array $experiences = ['entry', 'intermediate', 'expert'];

    protected $table = 'job_listings';

    protected $fillable = ['title', 'description', 'salary', 'category', 'experience'];

    /** @use HasFactory<JobFactory> */
    use HasFactory;

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function scopeFilter(EloquentBuilder| QueryBuilder $query, array $filters): EloquentBuilder | QueryBuilder
    {
        return
            $query->when($filters['search'] ?? null, function ($query, $search) {
            // where and or-where are grouped here to avoid logic issues
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('employer', function ($query) use ($search) {
                        $query->where('company_name', 'like', "%{$search}%");
                    });
            });
        })->when($filters['min-salary'] ?? null, function ($query, $salary) {
                $query->where('salary', '>=', $salary);
            })
            ->when($filters['mix-salary'] ?? null, function ($query, $salary) {
                $query->where('salary', '<=', $salary);
            })
            ->when($filters['experience'] ?? null, function ($query, $experience) {
                $query->where('experience', $experience);
            })
            ->when($filters['category'] ?? null, function ($query, $category) {
                $query->where('category', $category);
            });
    }
}
