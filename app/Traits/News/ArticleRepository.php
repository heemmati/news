<?php


namespace App\Traits\News;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\News\Article;

trait ArticleRepository
{

    public function set_article_data(Request $request): array
    {
        $user_id = Auth::id();
        $data = [];

        $data['head_title'] = $request->input('head_title');
        $data['footer_title'] = $request->input('footer_title');
        $data['origin_id'] = 1;
        $data['creator_id'] = $user_id;
        $data['updator_id'] = null;
        $data['type'] = $request->input('article_type');
        $data['origin_type'] = $request->input('origin_type');
        $data['external_link'] = $request->input('external_link');
        $data['status'] = 1;

        return $data;

    }

    public function article_create(array $data): Article
    {

        $article = Article::create([
            'head_title' => $data['head_title'],
            'footer_title' => $data['footer_title'],
            'creator_id' => $data['creator_id'],
            'updator_id' => $data['updator_id'],
            'origin_id' => $data['origin_id'],
            'type' => $data['type'],
            'origin_type' => $data['origin_type'],
            'external_link' => $data['external_link'],
            'status' => $data['status'],
        ]);

        if ($article instanceof Article) {
            return $article;
        } else {
            return false;
        }


    }

    public function create_article_via_request(Request $request): Article
    {
        $data = $this->set_article_data($request);
        $article = $this->article_create($data);

        return $article;
    }
}
