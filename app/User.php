<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Auth;
use UsersGroup;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id', 'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function usersGroup() {
        return $this->hasOne('App\UsersGroup', 'id', 'group_id');
    }

    public static function getAllUsers() {
        return self::with('usersGroup')->paginate();
    }
    
    public static function getOneUser($id) {
        return DB::table('users as u')
            ->select('u.id', 'u.firstname', 'u.lastname', 'u.email', 'u.created_at', 'ug.name as ug_name', 'ug.access_level')
            ->join('user_groups as ug', 'u.group_id', '=', 'ug.id')
            //->where('ug.access_level', '>=', Auth::user()->usersGroup->access_level)
            ->where('u.id', '=', $id)
            ->first();
    }
}
