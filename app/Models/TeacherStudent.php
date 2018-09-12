<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherStudent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teacher_id',
        'student_id',
    ];

    public function students()
    {
        return $this->hasMany('App\User', 'id', 'student_id');
    }
}
