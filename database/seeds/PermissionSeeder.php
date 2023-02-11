<?php

use App\Model\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $routes = Route::getRoutes();

        foreach ($routes as $route) {
            $uriAdmin = explode('/' ,$route->uri );
            if($uriAdmin[0] == 'panel'){
                $Permission = new Permission();
                $Permission->slug = $route->getName();
                $Permission->name = $route->getName();
                $Permission->save();
            }



        }

    }
}
