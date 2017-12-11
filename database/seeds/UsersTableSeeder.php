<?php

use Illuminate\Database\Seeder;

use App\User;
use App\UsersGroup;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('user_groups')->delete(); 
        
        UsersGroup::create([
            'id'     => 1,
            'access_level'  => UsersGroup::SYSTEM_ADMIN,
            'name' => 'Sysadmin group',
            'modules'  => "",
        ]);

        UsersGroup::create([
            'id'     => 2,
            'access_level'  => UsersGroup::ADMIN,
            'name' => 'Admin group',
            'modules'  => "",
        ]);

        UsersGroup::create([
            'id'     => 3,
            'access_level'  => UsersGroup::USER,
            'name' => 'User group',
            'modules'  => "",
        ]);
        DB::table('users')->delete();

        User::create([
            'group_id'  => 1,
            'email'     => 'sys-admin@manager.com',
            'password'  => bcrypt('123456'),
            'firstname' => 'Sys',
            'lastname'  => 'Admin'
        ]);

        User::create([
            'group_id'  => 2,
            'email'     => 'admin@manager.com',
            'password'  => bcrypt('123456'),
            'firstname' => 'Admin',
            'lastname'  => 'Manager'
        ]);

        User::create([
            'group_id'  => 3,
            'email'     => 'user@manager.com',
            'password'  => bcrypt('123456'),
            'firstname' => 'User',
            'lastname'  => 'Manager'
        ]);      
    }
}