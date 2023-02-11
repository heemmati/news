@if(isset($news) && !empty($news))
    <div class="row mb-40">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="section-title">
                <h2 class="h6 header-color inline-block uppercase">آخرین اخبار</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="zm-posts">
                @foreach($news as $new)
                    <x-site.news.horiz-new :new="$new"></x-site.news.horiz-new>
                @endforeach
            </div>
        </div>
    </div>
@endif
