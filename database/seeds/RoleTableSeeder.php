<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create roles
         */
        $admin_role              = new Role();
        $admin_role->name        = 'admin';
        $admin_role->description = 'Custodian of the system';
        $admin_role->save();

        $user_role              = new Role();
        $user_role->name        = 'user';
        $user_role->description = 'Readers and commenters';
        $user_role->save();

    }
}
