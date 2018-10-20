<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar',
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
     * The roles attached to a user
     * @return object
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * getAvatarAttribute
     * @param  string $value
     */
    public function getAvatarAttribute($value)
    {
        if ($value) {
            return Storage::disk('local')->url($value);
        } else {
            return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?s=80&d=mm";

        }
    }

    /**
     * Check user role
     * @param string $role
     */
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->first();
    }

}
