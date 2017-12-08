<?php
namespace App\Http\Controllers\Manager;

use App\User;
use App\UsersGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersGroupController extends Controller {

    public function index() {
        return view('manager.user_groups', [
            'userGroups' => UsersGroup::getAllGroups()
        ]);
    }

    public function ajaxGetAddUserGroupForm(Request $request) {
        return view('manager.user_group_add', [
            'userGroups' => UsersGroup::pluck('name', 'id'),
            'accessModules' => UsersGroup::getAccessModules()
        ]);
    }

    public function ajaxGetEditUserGroupForm(Request $request, $id) {
        $group = UsersGroup::findOrFail($id);
        return view('manager.user_group_edit', [
            'usersGroup' => $group,
            'userGroups' => UsersGroup::pluck('name', 'id'),
            'accessModules' => UsersGroup::getAccessModules()
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            //'access_level' => 'required',
            'modules' => 'required',
        ]);

        $user = new UsersGroup();
        $user->name = $request->name;
        $user->access_level = empty($request->access_level)? UsersGroup::USER : $request->access_level;
        $user->modules = $this->getArrayModules($request);
        $user->save();

        return [
            'status' => true
        ];
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            //'access_level' => 'required',
            'modules' => 'required',
        ]);

        $user = new UsersGroup();
        $user->name = $request->name;
        $user->access_level = empty($request->access_level)? UsersGroup::USER : $request->access_level;
        $user->modules = $this->getArrayModules($request);
        $user->save();

        return [
            'status' => true
        ];
    }

    public function destroy(Request $request, $id) {
        $ser = UsersGroup::destroy($id);
        return [
            'status' => true
        ];
    }

    private function getArrayModules(Request $request) {
        $modules = [];
        if($request->modules){
            foreach($request->modules as $moduleKey => $moduleVal){
                if(array_key_exists($moduleKey, UsersGroup::getAccessModules())){
                    foreach($moduleVal as $actionKey => $actionVal){
                        if(array_key_exists($actionVal, UsersGroup::getAccessModules()[$moduleKey]['action'])){
                            $modules[$moduleKey][] = $actionVal;
                        }
                    }
                }
            }
        }
        return $modules;
    }
}