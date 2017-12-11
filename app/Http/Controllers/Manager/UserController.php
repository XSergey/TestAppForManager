<?php
namespace App\Http\Controllers\Manager;

use App\User;
use App\UsersGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Guard;

class UserController extends Guard {
    
    public function index() {
        return view('manager.users', [
            'users' => User::getAllUsers()
        ]);
    }

    public function ajaxGetAddUserForm(Request $request) {
        return view('manager.user_add', [
            'userGroups' => UsersGroup::pluck('name', 'id')
        ]);
    }

    public function ajaxGetEditUserForm(Request $request, $id) {
        $user = User::findOrFail($id);
        return view('manager.user_edit', [
            'user' => $user,
            'userGroups' => UsersGroup::pluck('name', 'id')
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->group_id = empty($request->group_id)? 0: $request->group_id;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return [
            'status' => true
        ];
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->group_id = empty($request->group_id)? 0: $request->group_id;   
        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return [
            'status' => true
        ];
    }

    public function destroy(Request $request, $id) {
        $ser = User::destroy($id);
        return [
            'status' => true
        ];
    }
}