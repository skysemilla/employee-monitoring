<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_admin = new Role();
	    $role_admin->name = 'admin';
	    $role_admin->save();

	    $role_permanent = new Role();
	    $role_permanent->name = 'permanent';
	    $role_permanent->save();

	    $role_nonpermanent = new Role();
	    $role_nonpermanent->name = 'nonpermanent';
	    $role_nonpermanent->save();

	    $role_headofoffice = new Role();
	    $role_headofoffice->name = 'headofoffice';
	    $role_headofoffice->save();

	    $role_supervisor = new Role();
	    $role_supervisor->name = 'supervisor';
	    $role_supervisor->save();


	    
    }
}
