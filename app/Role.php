<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const SECRETARY_ROLE = 'SecretaryRole';
    const ADMIN_ROLE = 'AdminRole';
    const TUTOR_ROLE = 'TutorRole';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Ahk\User')->withTimestamps();
    }
}
