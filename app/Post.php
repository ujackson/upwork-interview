<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug']  = str_slug($value);
    }


        /**
     * getPhotoAttribute
     * @param  string $value
     */
    public function getPhotoAttribute($value)
    {
        if ($value) {
            return Storage::disk('local')->url($value);
        } else {
            return "https://via.placeholder.com/350x150?text=".$this->title;

        }
    }

    /**
     * Scope query to only include published posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

     /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }


}
