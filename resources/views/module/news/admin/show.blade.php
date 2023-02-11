@extends ('admin.layout.master2')


@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5>@lang('site.news_draft_show')</h5>



                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="image_card">
                                @if (isset($article->images[0]) && !empty($article->images[0]))
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($article->images[0]->src) }}" alt="">
                                @endif

                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3 class="news_title">{{ $article->title }}</h3>
                            <p class="description_new">
                                {{ $article->description }}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="news_body">
                                {!! $article->body !!}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>





    </div>




@endsection
