<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
    protected $dates = ['created_at', 'updated_at'];
    
	/**
	 * [users description]
	 * @return object
	 */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
