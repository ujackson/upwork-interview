<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * create admin user
         * 
         */
        $admin_role = Role::where('name', 'admin')->first();

        $admin           = new User();
        $admin->name     = 'Web Admin';
        $admin->email    = 'webadmin@interview-test.com';
        $admin->password = Hash::make('secret');
        $admin->save();
        $admin->roles()->attach($admin_role);
    }
}
