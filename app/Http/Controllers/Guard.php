<?php

namespace App\Http\Controllers;

use Auth;
use Config;
use Gate;
use Request;
use Session;

class Guard extends Controller
{  
    private $acl = [];
    
    public function __construct() {

        /*Gate::define('index', function ($user) {
            return true;
        });       

        if(empty(Auth::user()->usersGroup)){
            return false;
        }

        $this->acl = Config::get('acl');

        if(!empty(Auth::user()->usersGroup) && Auth::user()->usersGroup->access_level == 0){            
            $this->acl += Config::get('acl_sys');
            

            foreach($this->acl as $keyC => $controllers){
                if(count($controllers) > 0){
                    foreach($controllers['action'] as $actions){
                        if(count($actions) > 0){
                            foreach($actions['allow'] as $action){
                                Gate::define($keyC.'.'.$action, function ($user) {
                                    return true;
                                });
                            }
                        }
                    }                    
                }
            }
        }*/
       
        /*session(['admin.site_id' => Auth::guard('admin')->user()->sites_id]);
        session(['admin.access_level' => 1]);
        session(['admin.site' => Auth::guard('admin')->user()->site->toArray()]);
        $modules = Auth::guard('admin')->user()->usersGroup->modules;
        if(is_array($modules) && count($modules) > 0){               
            foreach($modules as $moduleName => $moduleVal){
                if(count($moduleVal) > 0){
                    foreach($moduleVal as $action){
                        $allow = $this->acl[$moduleName]['action'][$action]['allow'];
                        if(count($allow) > 0){
                            foreach($allow as $val){
                                Gate::define($moduleName.'.'.$val, function ($user) {
                                    return true;
                                });                                       
                            }
                        }                          
                    }
                }                  
            }
        }*/        

        $currentRouteName = \Request::route()->getName(); //$this->getRouter()->currentRouteName();
        $currentRouteName = preg_replace('/^manager./', '', $currentRouteName);

        /*if(Gate::denies($currentRouteName)){
           abort('403');
        }*/
    } 
    
    protected function setAlert($message) {
        Session::flash('alert', $message);
    }
}