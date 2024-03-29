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
	  /*  $admin->email = 'admin1@gmail.com';*/
	    $admin->type = 'admin';
	    $admin->functional_unit="NULL";
	    $admin->status="active";
	    $admin->password = bcrypt('admin123');
	    $admin->save();
	    $admin->roles()->attach($role_admin);

	    /*$user = new User();
	    $user->name = 'Admin';
	    $user->email = 'admin1@gmail.com';
	    $user->type = 1;
	    $user->password = bcrypt('admin123');
	    $user->save();*/
	    $role_supervisor = Role::where('name', 'supervisor')->first();

        $supervisor = new User();
	    $supervisor->name = 'Supervisor 1';
	    $supervisor->username ="supervisor1";
	    /*$supervisor->email = 'supervisor1@gmail.com';*/
	    $supervisor->type = 'supervisor';
	    $supervisor->functional_unit="Research Division";
	    $supervisor->status="active";
	    $supervisor->hasActiveReport=false;
	    $supervisor->supervisor_id=6;
	    $supervisor->password = bcrypt('user123');
	    $supervisor->save();
	    $supervisor->roles()->attach($role_supervisor);

	    $supervisor = new User();
	    $supervisor->name = 'Supervisor 2';
	    $supervisor->username ="supervisor2";
	 /*   $supervisor->email = 'supervisor2@gmail.com';*/
	    $supervisor->type = 'supervisor';
	    $supervisor->functional_unit="Human Resource Division";
	    $supervisor->status="active";
	    $supervisor->hasActiveReport=false;
	    $supervisor->supervisor_id=6;
	    $supervisor->password = bcrypt('user123');
	    $supervisor->save();
	    $supervisor->roles()->attach($role_supervisor);

	    $role_permanent = Role::where('name', 'permanent')->first();

        $permanent = new User();
	    $permanent->name = 'Employee 1';
	    $permanent->username ="employee1";
	 /*   $permanent->email = 'employee1@gmail.com';*/
	    $permanent->type = 'permanent';
	    $permanent->functional_unit="Research Division";
	    $permanent->status="active";
	    $permanent->password = bcrypt('user123');
	    $permanent->supervisor_id=2;
	    $permanent->hasActiveReport=false;
	    $permanent->latestReportId =0;
	    $permanent->save();
	    $permanent->roles()->attach($role_permanent);

	    $permanent = new User();
	    $permanent->name = 'Employee 2';
	    $permanent->username ="employee2";
	/*    $permanent->email = 'employee2@gmail.com';*/
	    $permanent->type = 'permanent';
	    $permanent->functional_unit="Human Resource Division";
	    $permanent->status="active";
	    $permanent->password = bcrypt('user123');
	    $permanent->hasActiveReport=false;
	    $permanent->supervisor_id=3;
	    $permanent->latestReportId =0;
	    $permanent->save();
	    $permanent->roles()->attach($role_permanent);

	    $role_headofoffice = Role::where('name', 'headofoffice')->first();

	    $headofoffice = new User();
	    $headofoffice->name = 'Alexander R. Madrigal';
	    $headofoffice->username ="alexandermadrigal";
	 /*   $headofoffice->email = 'alexandermadrigal@gmail.com';*/
	    $headofoffice->type = 'headofoffice';
	    $headofoffice->status="active";
	    $headofoffice->password = bcrypt('user123');
	 
	    $headofoffice->save();
	    $headofoffice->roles()->attach($role_headofoffice); 

    }
}
