<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'user_id', 'content',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        if (is_admin()) {
            return $this->hasMany('App\Comment')->withTrashed();
        } else {
            return $this->hasMany('App\Comment');
        }
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

}
