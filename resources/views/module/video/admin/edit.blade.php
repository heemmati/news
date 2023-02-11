@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">@lang('site.dashboard')</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="">@lang('site.videos_management')  </a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"> @lang('site.video_update') </h6>


                        <form method="POST" action="{{ route('videos.update' , $video->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            @include('error.forms')

                            {{-- Title --}}
                            <x-form.text require="1" type="{{ __('routes.videos_singular') }}" name="title" namefa="{{ __('site.title') }}" :value="$video->title"></x-form.text>

                            {{-- Title --}}
                            <x-form.text require="0" type="{{ __('routes.videos_singular') }}" name="entitle" namefa="{{ __('site.entitle') }}" :value="$video->entitle"></x-form.text>

                            <x-form.text require="1" type="{{ __('routes.videos_singular') }}" name="alt" namefa="{{ __('site.alt') }}" :value="$video->alt"></x-form.text>


                            <div class="video_single_show">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($video->src) }}">


                                    <video title="{{ $video->title }}" controls>
                                        <source src="{{ \Illuminate\Support\Facades\Storage::url($video->src) }}"  >

                                        {{  $video->alt  }}
                                    </video>
                                </a>
                            </div>


                            <button type="submit" class="btn btn-primary">@lang('site.video_update')</button>
                        </form>

                    </div>
                </div>



            </div>
        </div>


    </div>
@endsection

@section('scripts')

@endsection
