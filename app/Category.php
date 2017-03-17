<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Jenssegers\Date\Date;

class Category extends Model
{

    use Sluggable;
    use NodeTrait;

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
