
@if(isset($details) && !empty($details))
    <aside class="zm-post-lay-e-area col-sm-6 col-md-12 col-lg-12 mt-70 pull-right">
        <div class="row mb-40">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-title">
                    <h2 class="h6 header-color inline-block"> پربحث ترین اخبار </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="zm-posts">
                    @foreach($details as $detail)
                        <x-site.news.news-item-t3 :new="$detail->article"></x-site.news.news-item-t3>
                    @endforeach

                </div>
            </div>
        </div>
    </aside>
@endif

