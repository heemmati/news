@extends ('admin.layout.master2')


@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5>@lang('site.show_category')</h5>



                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="image_card">
                                @if (isset($category->image) && !empty($category->image))
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($category->image) }}" alt="">
                                @endif

                            </div>
                        </div>

                        <div class="col-md-8">
                            <h3 class="news_title">{{ $category->title }}</h3>
                            <p class="description_new">
                                {{ $category->description }}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="news_body">
                                {!! $category->body !!}
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
