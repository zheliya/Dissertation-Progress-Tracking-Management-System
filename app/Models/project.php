<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
class project extends Model
{
    use HasFactory;

    protected $fillable = [
        'confirm_title',
        'title',
        'subtittle',
        'project_status'
    ];

    /**
     * Get all of the chapters for the project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chapters(): HasMany
    {
        return $this->hasMany(chapter::class, 'project_id');
    }


    /**
     * Get all of the tasks throgh chapter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function tasks(): HasManyThrough
    {
        return $this->hasManyThrough(task::class,chapter::class,'chapter_id','project_id',);
    }


    /**
     * Get project querey for project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project_query(): HasOne
    {
        return $this->hasOne(project_query::class,'project_id');
    }

    public function department():BelongsTo
    {
        return $this->belongsTo(department::class, 'department');
    }


}
