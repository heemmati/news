@extends ('admin.layout.master2')


@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5>@lang('site.show_page')</h5>



                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="image_card">
                                @if (isset($page->image) && !empty($page->image))
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($page->image) }}" alt="">
                                @endif

                            </div>
                        </div>

                        <div class="col-md-8">
                            <h3 class="news_title">{{ $page->title }}</h3>
                            <p class="description_new">
                                {{ $page->description }}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="news_body">
                                {!! $page->body !!}
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>





    </div>




@endsection

@section('scripts')

    <script>
        $("input.tagsinput-example").tagsinput('items');
    </script>



@endsection
