<?php


namespace App\services;


use App\User;

class Watch
{


    public static function set_new_array_object_to_watch($user_array, $object)
    {
        foreach ($user_array as $user) {
            self::set_new_object_to_watch($user, $object);
        }
    }

    public static function set_new_object_to_watch($user_id, $object)
    {
        $watch = \App\Model\Watch::create([
            'user_id' => $user_id,
            'watchable_id' => $object->id,
            'watchable_type' => get_class($object),
            'watched' => 0
        ]);
        if ($watch instanceof \App\Model\Watch) {
//            return $watch;
        } else {
//            return false;
        }
    }

    public static function find_users_to_watch($extera_users)
    {

        $manager_team = [\App\Utility\Acl::SUPER, \App\Utility\Acl::ADMIN];
        $user_ids = User::whereIn('role', $manager_team)->get()->pluck('id')->toArray();

        if (isset($extera_users) && !empty($extera_users) && count($extera_users) > 0){
            $users = array_merge($user_ids , $extera_users);
        }
        else{
            $users = $user_ids;
        }

        return $users;


    }

    public static function create_watches($is_admin , $extera , $object)
    {
        if ($is_admin == true){
            $users = self::find_users_to_watch($extera);
        }
        else{
            $users = $extera;
        }


        self::set_new_array_object_to_watch($users , $object);


    }

    public static function update_to_watched($user_id , $object)
    {
        $watched = \App\Model\Watch::where('user_id' , $user_id )->where('watchable_type' , $object)->get();
        if (isset($watched) && !empty($watched)){
            foreach ($watched as $item) {
                $item->update([
                    'watched' => 1
                ]);
                $item->save();
            }
        }
    }
}
