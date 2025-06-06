<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\TaskStatus;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'is_urgent',
        'date',
        'category_id',
    ];

    protected $casts = [
        'status' => TaskStatus::class,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
