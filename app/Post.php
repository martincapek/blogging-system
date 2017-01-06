<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

class Post extends Model
{

    use SoftDeletes;
    use Sluggable;


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'perex',
        'content',
        'image',
        'views',
        'author',
        'created_at',
        'updated_at',
    ];

    /**
     * Return date like object Date.
     *
     * @param $date
     * @return Date
     */
    public function getCreatedAtAttribute($date)
    {

        return new Date($date);
    }


    /**
     * Allow use categories in posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
