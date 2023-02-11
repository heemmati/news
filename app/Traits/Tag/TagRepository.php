<?php


namespace App\Traits\Tag;



use Illuminate\Http\Request;
use App\Model\Tag\Tag;

trait TagRepository
{

    public function create_tag_via_raw($status): Tag
    {

        $data = $this->set_raw_tag_data($status);
        $tag = $this->tag_create($data);
        return $tag;

    }

    public function set_raw_tag_data($status): array
    {
        $data['status'] = $status;
        return $data;
    }

    public function tag_create(array $data): Tag
    {

        $tag = Tag::create([
            'status' => $data['status'],

        ]);

        if ($tag instanceof Tag) {
            return $tag;
        } else {
            return false;
        }


    }

    public function create_tag_via_request(Request $request): Tag
    {
        $data = $this->set_tag_data($request);
        $tag = $this->tag_create($data);

        return $tag;
    }

    public function set_tag_data(Request $request): array
    {
        $data['status'] = 1;
        return $data;

    }
}
