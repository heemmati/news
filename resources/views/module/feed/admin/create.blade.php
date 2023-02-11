@extends ('admin.layout.master2')


@section('content')
    <div class="row">
        <form method="POST" action="{{ route('feeds.store') }}" enctype="multipart/form-data">
            @csrf


            <br>



            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 class="card-title">@lang('site.create_new_feed')</h5>

                            </div>

                            <div class="col-12 col-md-6">

                                <div class="btn-group">
                                <button type="submit"  name="redirect" value="3"   class="btn btn-danger">@lang('site.store_and_create')</button>


                                </div>
                            </div>

                        </div>

                        @include('error.forms')

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <x-form.text name="title" namefa="{{ __('site.title') }}" type="{{ __('routes.feeds__singular') }}" require="1"></x-form.text>
                            </div>

                            <div class="col-12 col-md-6">
                                <x-form.text name="link" namefa="{{ __('site.link') }}" type="{{ __('routes.feeds__singular') }}" require="0"></x-form.text>
                            </div>


                            <div class="col-12 col-md-6">
                                <x-form.text name="link_pattern" namefa="{{ __('site.link_pattern') }}" type="{{ __('routes.feeds__singular') }}" require="0"></x-form.text>
                            </div>
                            
                            
                               <div class="col-12 col-md-6">
                                <x-form.text name="target_box" namefa="{{ __('site.target_box') }}" type="{{ __('routes.feeds__singular') }}" require="0"></x-form.text>
                            </div>
                            
                            
                            
                            

                            <div class="col-12 col-md-6">
                                <x-form.text name="title_class" namefa="{{ __('site.title_class') }}" type="{{ __('routes.feeds__singular') }}" require="0"></x-form.text>
                            </div>

                            <div class="col-12 col-md-6">
                                <x-form.text name="image_class" namefa="{{ __('site.image_class') }}" type="{{ __('routes.feeds__singular') }}" require="0"></x-form.text>
                            </div>
                            
                            <div class="col-12 col-md-6">
                                <x-form.textarea name="image_dom" namefa="{{ __('site.image_dom') }}" type="{{ __('routes.feeds__singular') }}" require="0"></x-form.textarea>
                            </div>
                            
                            
                            <div class="col-12 col-md-6">
                                <x-form.textarea name="deleting" namefa="{{ __('site.deleting') }}" type="{{ __('routes.feeds__singular') }}" require="0"></x-form.textarea>
                            </div>

 <div class="col-12 col-md-6">
                                <x-form.text name="striping" namefa="{{ __('site.striping') }}" type="{{ __('routes.feeds__singular') }}" require="0"></x-form.text>
                            </div>


                            <div class="col-12 col-md-6">
                                <x-form.text name="description_class" namefa="{{ __('site.description_class') }}" type="{{ __('routes.feeds__singular') }}" require="0"></x-form.text>
                            </div>

                            <div class="col-12 col-md-6">
                                <x-form.text name="body_class" namefa="{{ __('site.body_class') }}" type="{{ __('routes.feeds__singular') }}" require="0"></x-form.text>
                            </div>
                            <div class="col-12 col-md-6">
                                <x-form.utility name="type" namefa="{{ __('site.type_feed') }}"
                                                :items="App\Utility\Feed\Feed::items()" type="{{ __('routes.feeds__singular') }}"
                                                require="0" multiple="0"></x-form.utility>
                            </div>

                            <div class="col-12 col-md-6">
                            <x-form.select name="categories" namefa="{{ __('site.categories') }}" :items="$categories" type="{{ __('routes.articles_singular') }}"
                                           require="0" multiple="1"></x-form.select>

                                <x-form.select name="regions" namefa="{{ __('site.regions') }}" :items="$regions" type="{{ __('routes.articles_singular') }}"
                                               require="0" multiple="1"></x-form.select>
                            </div>

                        </div>



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
                                                :items="\App\Utility\Status::items()" type="{{ __('routes.feeds__singular') }}"
                                                require="0" multiple="0"></x-form.utility>




                            </div>
                        </div>
                    @endcan
                @endif


            </div>

        </form>



    </div>




@endsection

@section('scripts')

    <script>
        $("input.tagsinput-example").tagsinput('items');
    </script>



@endsection
