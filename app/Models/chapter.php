<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
class chapter extends Model
{



    use HasFactory;

    protected $fillable = [
        'title',
        'submition',
        'template',
        'guidline',
        'student_statement',
        'supervisor_statement',
        'chapter_status'

    ];


    /**
     * Get all of the tasks for the chapter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(task::class, 'chapter_id');
    }

    /**
     * Get all of the history files for the chapter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chapter_history(): HasMany
    {
        return $this->hasMany(chapter_history::class, 'file_id');
    }


    /**
     * Get the projects that owns the chapter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(project::class);
    }


    public function hasActiveTask()
    {
        foreach ($this->tasks as $task) {
            // Implement your own logic to determine the active state of a task
            if ($task->isActive()) {
                return true;
            }
        }

        return false;
    }

}
