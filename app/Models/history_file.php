<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class history_file extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_adress',
        'file_id',
        'created_at'

    ];



    /**
     * Get the chapters that owns the task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chapter(): BelongsTo
    {
        return $this->belongsTo(chapter::class);
    }

    /**
     * Get the chapters that owns the task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(task::class);
    }
}
