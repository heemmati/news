<?php


namespace App\Traits\Region;


use App\Model\Region\Region;

trait RegionHelper
{

    public function user_to_regions($user)
    {

        $roles = $user->roles()->get()->pluck('id')->toArray();

        $regions = Region::whereHas('roles', function ($q) use ($roles) {
            $q->whereIn('roles.id', $roles);
        })->where('status', 1)->get();

        return $regions;

    }


    public function set_regions_request($object, $request)
    {
        $region_array = $request->input('regions');

        if (isset($region_array) && !empty($region_array) && count($region_array) > 0){
            $object->regions()->sync($region_array);
        }

    }

    public function set_regions_array($object, $region_array)
    {


        if (isset($region_array) && !empty($region_array) && count($region_array) > 0){
            $object->regions()->sync($region_array);
        }

    }

}
