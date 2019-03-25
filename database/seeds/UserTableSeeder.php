<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_admin = Role::where('name', 'admin')->first();

        $admin = new User();
	    $admin->name = 'Admin';
	    $admin->username ="admin1";
	    $admin->email = 'admin1@gmail.com';
	    $admin->type = 'admin';
	    $admin->functional_unit="NULL";
	    $admin->status="NULL";
	    $admin->password = bcrypt('admin123');
	    $admin->save();
	    $admin->roles()->attach($role_admin);

	    /*$user = new User();
	    $user->name = 'Admin';
	    $user->email = 'admin1@gmail.com';
	    $user->type = 1;
	    $user->password = bcrypt('admin123');
	    $user->save();*/
    }
}
