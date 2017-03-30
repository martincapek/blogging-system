<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['content', 'author_id', 'post_id', 'allowed'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User', 'author_id');
    }

    /**
     * @return mixed
     */
    public function getAllowedComments() {
        return $this->where('allowed', 1)->get();
    }

    /**
     * @return bool
     */
    public function allow() {
        if ($this->update(['allowed' => 1])) {
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function scopeAllowed() {
        return $this->where('allowed', 1);
    }

}
