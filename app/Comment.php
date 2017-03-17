<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Comment extends Model
{

    use NodeTrait;
    protected $fillable = ['content', 'author_id', 'post_id'];


    public function user() {
        return $this->belongsTo('App\User', 'author_id');
    }
}
