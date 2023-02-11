<?php

use App\Model\Permission;
use App\Model\Role;
use App\User;
use Illuminate\Database\Seeder;

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
        $dev_role = Role::where('slug','developer')->first();

        $manager_role = Role::where('slug', 'manager')->first();
        $dev_perm = Permission::where('slug','create-tasks')->first();
        $manager_perm = Permission::where('slug','edit-users')->first();

        $developer = new User();
        $developer->name = 'Alireza Hemmati';
        $developer->email = 'alirezahemmati76@gmail.com';
        $developer->phone = '09190590024';
        $developer->password = bcrypt('qwer4321');
        $developer->save();
        $developer->roles()->attach($manager_role);
        $developer->permissions()->attach($manager_perm);


        $manager = new User();
        $manager->name = 'Shahriyar Hosseinzadeh';
        $manager->email = 'hosseinzade@gmail.com';
        $manager->phone = '09385459548';
        $manager->password = bcrypt('secret');
        $manager->save();
        $manager->roles()->attach($dev_role);
        $manager->permissions()->attach($dev_perm);
    }
}
