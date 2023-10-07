<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_role extends Model
{
    use HasFactory; 



    public function SupervisorProjects()
    {
        return $this->hasMany(Project::class, 'supervisor_id', 'user_id');
    }
    public function StudentProjects()
    {
        return $this->hasMany(Project::class, 'student_id', 'user_id');
    }

}
