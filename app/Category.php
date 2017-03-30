<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

class Category extends Model
{

    use Sluggable;
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        'slug'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }


    public function getCreatedAtAttribute($date)
    {

        return new Date($date);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
