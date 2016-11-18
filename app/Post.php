<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

class Post extends Model
{

    use SoftDeletes;



    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'perex',
        'content',
        'views',
        'author',
        'created_at',
        'updated_at',
    ];



    public function getCreatedAtAttribute($date) {

        return new Date($date);
    }
}
