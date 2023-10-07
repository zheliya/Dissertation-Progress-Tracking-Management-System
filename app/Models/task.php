<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class task extends Model
{
    use HasFactory;

    protected $fillable = [
        'chapter_id',
        'title',
        'submition',
        'submition_date',
        'template',
        'guidline',
        'student_statement',
        'supervisor_statement',
        'chapter_status'

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

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get all of the history files for the chapter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function task_history(): HasMany
    {
        return $this->hasMany(task_history::class, 'file_id');
    }





}
