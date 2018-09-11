<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Wilgucki\Csv\Traits\CsvExportable;

class User extends Authenticatable
{
    use Notifiable;
    use CsvExportable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','is_active','role_id','skills_id','passport','birth_day',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roles()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skills()
    {
        return $this->belongsTo('App\Models\Skills', 'skills_id');
    }

}
