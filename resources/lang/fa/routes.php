<?php



use Illuminate\Support\Facades\Cache;
$farsi = [];


$fa = Cache::remember('fas', 2000000, function () {
    return \App\Model\Language\Lang::where('code' , 'fa')->first();
});


$faWords = Cache::remember('faWords', 2000000, function () use ($fa) {
    return \App\Model\Language\Translate::where('lang_id' , $fa->id)->get();
});

$farsi = Cache::remember('farsi', 2000000, function () use ($faWords) {

    foreach ($faWords as $word){
        $farsi[$word->word->code] = $word->title;
    }
    return $farsi;
});


return $farsi;


?>
