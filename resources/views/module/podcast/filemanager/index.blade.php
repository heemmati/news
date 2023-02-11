@extends ('admin.layout.master_filemanager')


@section('content')
    <div class="content">


        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">@lang('site.dashboard')</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href=""> @lang('site.choose_a_podcast') </a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('site.upload_new_podcast') }}</h6>


                        <form method="POST" action="{{ route('podcasts.store') }}" enctype="multipart/form-data">
                            @csrf

                            @include('error.forms')

                            {{-- Title --}}
                            <x-form.text require="1" value="{{ old('title') }}" type="{{ __('site.podcasts_singular') }}" name="title" namefa="{{ __('site.title') }}"></x-form.text>


                            {{-- Title --}}
                            <x-form.text require="0" value="{{ old('entitle') }}" type="{{ __('site.podcasts_singular') }}" name="entitle" namefa="{{ __('site.entitle') }}"></x-form.text>




                            {{-- Alt --}}
                            <x-form.text require="1" value="{{ old('alt') }}" type="{{ __('site.podcasts_singular') }}" name="alt" namefa="{{ __('site.alt') }}"></x-form.text>


{{--                            <x-form.image require="1" value="{{ old('screenshot') }}"  type="{{ __('site.podcasts_singular') }}" name="screenshot" namefa="{{ __('site.screenshot') }}"></x-form.image>--}}

                            <x-form.video require="1" value="{{ old('src') }}"   type="{{ __('site.podcasts_singular') }}" name="src" namefa="{{ __('site.upload') }}"></x-form.video>


                            <button type="submit" class="btn btn-primary">{{ __('site.upload_new_podcast') }}</button>
                        </form>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('site.videos_search')</h6>
                        <form action="{{ route('podcast.filemanager') }}" method="GET">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <x-form.text name="title" namefa="{{ __('site.title') }}"
                                                 value="{{ !empty($filtered['title']) ? $filtered['title'] : '' }}"
                                                 type="{{ __('routes.podcasts_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <x-form.text name="etitle" namefa="{{ __('site.entitle') }}"
                                                 value="{{ !empty($filtered['entitle']) ? $filtered['entitle'] : '' }}"
                                                 type="{{ __('routes.podcasts_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <x-form.text name="alt" namefa="{{ __('site.alt') }}"
                                                 value="{{ !empty($filtered['alt']) ? $filtered['alt'] : '' }}"
                                                 type="{{ __('routes.podcasts_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <x-form.text name="start_date" kind="date" namefa="{{ __('site.start_date_upload') }}"
                                                 value="{{ !empty($filtered['start_date']) ? $filtered['start_date'] : '' }}"
                                                 type="{{ __('routes.podcasts_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <x-form.text name="end_date" kind="date" namefa="{{ __('site.end_date_upload') }}"
                                                 value="{{ !empty($filtered['end_date']) ? $filtered['end_date'] : '' }}"
                                                 type="{{ __('routes.podcasts_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <button type="submit" class="btn btn-danger">{{ __('routes.search') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @if(isset($podcasts) && !empty($podcasts))
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                @foreach($podcasts as $podcast)
                                    <div class="col-md-2">
                                        <div class="uploaded_podcast">


                                            <audio title="{{ $podcast->title }}" controls>
                                                <source src="{{ \Illuminate\Support\Facades\Storage::url($podcast->src) }}">
                                                {{ $podcast->alt }}
                                            </audio>



                                            <a class="choose_item" data-podcastid="{{ $podcast->id }}"
                                               href="javascript:void(0)"
                                               data-podcastname="{{ $podcast->title }}"
                                               data-podcastid="{{ $podcast->id }}"
                                            >
                                              انتخاب پادکست
                                            </a>

                                            <a href="javascript:void(0)" class="remove_podcast">
                                                <i class="far fa-times"></i>
                                            </a>

                                            <a href="{{ route('podcasts.edit' , $podcast->id) }}" class="edit_podcast">
                                                <i class="far fa-pencil"></i>
                                            </a>

                                            {{--Deleting Form--}}
                                            <form
                                                action="{{ route('podcasts.destroy' , $podcast->id) }}"
                                                method="POST" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-default"></button>
                                            </form>
                                            {{--Deleting Form--}}


                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <script>

        $(document).ready(function () {
            let podcastInput = window.opener.podcast;
            // let showImage = window.opener.showImage;

            //alert(podcastInput)
        });

        $('.choose_item').click(function () {

            let podcastId = $(this).data('podcastid');
            let podcastName = $(this).data('podcastname');




            window.opener.$('#input_podcast').val(podcastId);
            window.opener.$('#showing_podcast_name').text(podcastName);



            self.close();
        });

    </script>

    <script>
        $(document).on('click', '.remove_podcast', function () {

            Swal.fire({
                title: "@lang('site.delete_message')",
                text: "@lang('site.cant_return')",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "@lang('site.remove_it')",
                closeOnConfirm: false
            })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete.value) {
                        $(this).siblings('form').submit();

                    }
                });
        });
    </script>
@endsection
