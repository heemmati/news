<?php


namespace App\Traits\Tag;


use Illuminate\Http\Request;
use App\Model\Base\Base;
use App\Traits\Base\BaseRepository;
use App\Model\Tag\Tag;

trait TagHelper
{

    use TagRepository;

    public function connect_object_tag_via_request($object, Request $request)
    {

        $tags = $request->input('tags');
        $tags_array = explode(",", $tags);
        $tags_ids =array();


        foreach ($tags_array as $tag){
            $tag_slug = str_replace(' ' , '-' , $tag);

            $tag_exist = Base::where('slug' , $tag_slug)->where('baseable_type' , Tag::class)->first();

            if (isset($tag_exist) && !empty($tag_exist)){

                array_push($tags_ids , $tag_exist->baseable->id);
            }
            else{
               $tag_insert = $this->create_tag_via_raw(1);

               if ($tag_insert){
                   $base = $this->base_create_via_raw($tag , $tag_insert);
                   array_push($tags_ids , $tag_insert->id);
               }
               else{

               }


            }

        }




        $tag_inserted = $this->connect_object_tag($object, $tags_ids);

        return $tag_inserted;
    }

    public function connect_object_tag($object, $tags): bool
    {

        $tag = $object->tags()->sync($tags);
        if ($tag) {
            return true;
        } else {
            return false;
        }
    }
}
