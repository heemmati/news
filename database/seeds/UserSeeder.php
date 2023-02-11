<?php

use App\Model\Permission;
use App\Model\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
        $developer->mobile = '09190590024';
        $developer->role = 'super';
        $developer->password = Hash::make('qwer4321');
        $developer->save();
        $developer->roles()->attach($manager_role);
        $developer->permissions()->attach($manager_perm);



    }
}
