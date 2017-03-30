<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Jrean\UserVerification\Traits\UserVerification;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use DB;

class User extends Authenticatable
{
    use Notifiable;
    use UserVerification;
    use HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute() {
        return $this->name;
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'author_id');
    }


    public function role() {
        $role_id = DB::table('assigned_roles')->where('entity_id', $this->id)->first()->role_id;
        return  DB::table('roles')->where('id', $role_id)->first()->name;
    }

}
