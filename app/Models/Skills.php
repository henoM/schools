<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $fillable = [
        'skills'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

}
