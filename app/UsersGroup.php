<?php

namespace App;

use Auth;
use Config;
use Illuminate\Database\Eloquent\Model;

class UsersGroup extends Model
{
    protected $table = 'user_groups';
    
    private $itemsPerPage = 10;

    const SYSTEM_ADMIN  = 1;    
    const ADMIN         = 2;    
    const USER          = 3;
    
    public static $accessLevelsName = [
        self::SYSTEM_ADMIN  => 'System Administrator',
        self::ADMIN         => 'Administrator',
        self::USER          => 'User',
    ];
    
    protected $fillable = [
        'access_level', 'name', 'modules'
    ];    

    public function users() {
        return $this->hasMany('App\User', 'group_id', 'id');
    }   

    public function getAccessLevelName(){
        return self::$accessLevelsName[$this->access_level];
    }

    public static function getAllGroups(){
        return self::where('access_level', '>=', Auth::user()->usersGroup->access_level)->paginate();
    }

    public static function getAccessModules() {
        $accessModules = Config::get('acl');
        foreach($accessModules as $moduleKey => $modules){
            foreach($modules['action'] as $key => $action){
                $modules['action'][$key] = $action['name'];
            }
            $accessModules[$moduleKey] = $modules;
        }
        return $accessModules;
    }
    
    public function getModulesAttribute($value)
    {
        return json_decode($value, true);
    }
    
    public function setModulesAttribute($value)
    {
        $this->attributes['modules'] = json_encode($value);
    }    
    
    public function getAllUsersGroup() {
        return $this->where('access_level', '!=', self::SYSTEM_ADMIN)->paginate($this->itemsPerPage);
    }
}