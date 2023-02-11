@extends('admin.layout.master')

@section('content')
    <div class="content-wrapper">


        <div class="content-body">

            <div class="content">

                <div class="row">
                    <div class="col-md-12">

                        @if(isset($helpers) && !empty($helpers))

                            <div class="row">


                                @foreach($helpers as $helper)
                                    <div class="col-xl-4 col-lg-6">
                                        <div class="card">
                                            <div class="card-body">

                                                <div class="helper__image">
                                                    <a href="{{ url($helper->path())  }}">
                                                        <img style="width: 100%; height: 200px; object-fit: cover" class="img-fluid mage-grayscale" src="{{ \Illuminate\Support\Facades\Storage::url($helper->image) }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="d-flex align-items-center" style="margin: 10px 0px">
                                                    <h5 class="mb-0">
                                                        <a href="{{ url($helper->path())  }}" class="link-2">

                                                            {{ $helper->title }}

                                                        </a>
                                                                                                     </h5>

                                                </div>


                                                <p>
                                                    {{ \Illuminate\Support\Str::limit($helper->description , 100) }}
                                                </p>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="text-muted mb-1 small">
                                                            @lang('site.published_at')
                                                        </div>
                                                        <div>
                                                            {{ $helper->timeHandler() }}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>


                        @endif


                    </div>
                </div>


            </div>


        </div>

    </div>

@endsection
