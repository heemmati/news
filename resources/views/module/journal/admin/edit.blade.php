@extends ('admin.layout.master2')


@section('content')
    <div class="row">
        <form method="POST" action="{{ route('journals.update' , $journal->id ) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 class="card-title">@lang('site.basic_inforamtion')</h5>

                            </div>

                            <div class="col-12 col-md-6">

                                <div class="btn-group">
                                    <button type="submit" name="redirect" value="1"
                                            class="btn btn-sm btn-primary">@lang('site.store_and_update')</button>

                                </div>
                            </div>

                        </div>

                        @include('error.forms')

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <x-form.text name="title" namefa="{{ __('site.title') }}"
                                             type="{{ __('routes.journals_singular') }}" require="1" value="{{ $journal->title }}"></x-form.text>
                            </div>
                            <div class="col-12 col-md-6">
                                <x-form.text name="entitle" namefa="{{ __('site.entitle') }}"
                                             type="{{ __('routes.journals_singular') }}"
                                             value="{{ $journal->entitle }}"
                                             require="0"></x-form.text>
                            </div>


                            <div class="col-12 col-md-6">
                                <x-form.tag :tags="$journal->tags"></x-form.tag>
                            </div>


                            <div class="col-12 col-md-12">

                                <x-form.textarea name="description" namefa="{{ __('site.description') }}"
                                                 type="{{ __('routes.journals_singular') }}"
                                                 require="0">

                                    {{ $journal->description }}
                                </x-form.textarea>

                            </div>
                        </div>

                        <x-form.textarea name="body" namefa="{{ __('site.body') }}"
                                         type="{{ __('routes.journals_singular') }}" require="0">

                            {{ $journal->body }}
                        </x-form.textarea>

                    </div>
                </div>


                @if(\App\Utility\Acl::isManager(auth()->id()))
                    @can('panel.change.status')
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ __('site.status_change') }}
                                </h5>


                                <x-form.utility name="status" namefa="{{ __('site.status') }}"
                                                :items="\App\Utility\Status::items()"
                                                type="{{ __('routes.journals_singular') }}"
                                                require="0" multiple="0"></x-form.utility>


                            </div>
                        </div>
                    @endcan
                @endif


            </div>


            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">@lang('site.gallery_image')</h3>
                        <div class="form-group">

                            <div class="btn-group btn-group-sm">
                                <a href="javascript:void(0)" onClick="add_gallery()"  class="btn btn-success"> + </a>
                                <a href="javascript:void(0)" class="btn btn-danger"> - </a>
                            </div>

                            <br>

                            <div class="gallery_section">
                                @foreach ($journal->images  as $key => $item)
                                    <div class="gallery_item">
                                        <div class="input-group">
                               <span class="input-group-btn">
                                 <a id="img_lfm{{ $key + 5 }}" data-input="thumbnail{{ $key + 5 }}" data-preview="holder{{ $key + 5 }}"
                                    class="lfm btn btn-primary">
                                   <i class="fa fa-picture-o"></i>  انتخاب
                                 </a>
                               </span>

                                            <input id="thumbnail{{ $key + 5 }}" value="{{  $item->src }}" class="lfm form-control" type="text"
                                                   name="imagebox[]">

                                        </div>

                                        <img id="holder{{ $key + 5 }}" style="margin-top:15px;max-height:100px;" src="{{ \Illuminate\Support\Facades\Storage::url($item->src) }}">

                                    </div>

                                @endforeach

                            </div>



                        </div>

                    </div>
                </div>


            </div>
        </form>


    </div>




@endsection

@section('scripts')
    <script>
        $('#img_lfm2').filemanager('image');
        $("input.tagsinput-example").tagsinput('items');


        let k = 5 + {{ count($journal->images) }};

        $('#img_lfm'+ k ).filemanager('image');

        function add_gallery() {

            k = k + 1;

            /* Gallery Add Html */
            let html = ' <div class="gallery_item"> ' +
                '<div class="input-group">' +
                '<span class="input-group-btn">' +
                '<a id="img_lfm' + k + '" data-input="thumbnail' + k + '" data-preview="holder' + k + '" class="lfm btn btn-primary">' +
                ' <i class="fa fa-picture-o"></i>  انتخاب  </a>' +

                ' </span>' +

                '<input id="thumbnail' + k + '" value="" class="lfm form-control" type="text" name="imagebox[]">' +

                '</div>' +

                '<img id="holder' + k + '" style="margin-top:15px;max-height:100px;" src="">' +

                '</div>';

            /* Gallery Add Html */

            let gallery_section = $('.gallery_section');
            gallery_section.append(html);
            $('#img_lfm'+ k ).filemanager('image');








        }


    </script>







@endsection
