<?php


namespace App\Traits\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Category\Category;


trait CategoryRepository
{
    public function create_category_via_request(Request $request, $model): Category
    {
        $data = $this->set_category_data($request, $model);
        $category = $this->category_create($data);

        return $category;
    }

    public function set_category_data(Request $request, $model): array
    {
        $user_id = Auth::id();
        $data = [];


        if( !empty($request->input('status'))){

            $status = $request->input('status');
        }
        else{
            $status = 0;
        }



        $data['user_id'] = $user_id;
        $data['order'] = $request->input('order');
        $data['parent_id'] = $request->input('parent_id');
        $data['icon'] = $request->input('icon');
        $data['type'] = $model;
        $data['item_count'] = 0;
        $data['status'] = $status ;

        return $data;

    }

    public function category_create(array $data): Category
    {

        $category = Category::create([

            'user_id' => $data['user_id'],
            'order' => $data['order'],
            'parent_id' => $data['parent_id'],
            'icon' => $data['icon'],
            'type' => $data['type'],
            'item_count' => $data['item_count'],
            'status' => $data['status']
        ]);

        if ($category instanceof Category) {
            return $category;
        } else {
            return false;
        }


    }

}
