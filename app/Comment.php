<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }
    /**
     * Get comment owner.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
