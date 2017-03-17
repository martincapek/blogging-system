<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{

    use SoftDeletes;
    use Sluggable;
    use SearchableTrait;


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'users.name' => 10,
            'posts.title' => 2,
            'posts.text' => 1,
        ],
        'joins' => [
            'users' => ['posts.author_id','users.id'],
        ],
    ];

    public $fillable = [
        'title',
        'perex',
        'text',
        'image',
        'views',
        'author_id',
        'category_id',
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



    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }


    public function comments() {
        return $this->hasMany('App\Comment', 'post_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'author_id');
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
