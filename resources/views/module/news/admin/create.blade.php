@extends ('admin.layout.master2')


@section('content')
    <div class="row">
        <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 class="card-title">@lang('site.basic_inforamtion')</h5>

                            </div>

                            <div class="col-12 col-md-6">

                                <div class="btn-group">
                                    <button type="submit" name="redirect" value="1" class="btn btn-sm btn-primary">@lang('site.store_and_update')</button>
                                    <button type="submit"   name="redirect" value="2"  class="btn btn-sm btn-success">@lang('site.store_and_index')</button>
                                    <button type="submit"  name="redirect" value="3"   class="btn btn-sm btn-danger">@lang('site.store_and_create')</button>
                                </div>
                            </div>

                        </div>

                        @include('error.forms')

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <x-form.text name="title" namefa="{{ __('site.title') }}" type="{{ __('routes.articles_singular') }}" require="1"></x-form.text>
                            </div>
                            <div class="col-12 col-md-6">
                            <x-form.text name="head_title" namefa="{{ __('site.head_title') }}" type="{{ __('routes.articles_singular') }}" require="0"></x-form.text>
                            </div>
                            <div class="col-12 col-md-6">
                                <x-form.text name="entitle" namefa="{{ __('site.entitle') }}" type="{{ __('routes.articles_singular') }}"
                                             require="0"></x-form.text>
                            </div>
                            <div class="col-12 col-md-6">
                                <x-form.text name="external_link" namefa="{{ __('site.external_link') }}" type="{{ __('routes.articles_singular') }}"
                                             require="0"></x-form.text>
                            </div>
                            <div class="col-12 col-md-6">
                                <x-form.select name="categories" namefa="{{ __('site.categories') }}" :items="$categories" type="{{ __('routes.articles_singular') }}"
                                               require="0" multiple="1"></x-form.select>
                            </div>
                            <div class="col-12 col-md-6">
                                <x-form.select name="regions" namefa="{{ __('site.regions') }}" :items="$regions" type="{{ __('routes.articles_singular') }}"
                                               require="0" multiple="1"></x-form.select>
                            </div>
                            <div class="col-12 col-md-6">
                            <x-form.tag ></x-form.tag>
                            </div>
                            <div class="col-12 col-md-12">




                                <x-form.textarea name="description" namefa="{{ __('site.description') }}" type="{{ __('routes.articles_singular') }}"
                                                 require="0"></x-form.textarea>

                            </div>
                        </div>

                        <x-form.textarea name="body" namefa="{{ __('site.body') }}" type="{{ __('routes.articles_singular') }}" require="0"></x-form.textarea>

                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">@lang('site.article_producer')</h5>

                        <div class="row">


                            <div class="col-12 col-md-6">
                                <x-form.producer name="company" :items="$users" namefa="{{ __('site.company') }}" type="{{ __('routes.articles_singular') }}" require="0"></x-form.producer>

                            </div>


                            <div class="col-12 col-md-6">
                                <x-form.producer name="author" :items="$users" namefa="{{ __('site.author') }}" type="{{ __('routes.articles_singular') }}" require="0"></x-form.producer>


                                            </div>


                            <div class="col-12 col-md-6">
                                <x-form.producer :items="$users" name="reporter" namefa="{{ __('site.reporter') }} " type="{{ __('routes.articles_singular') }}"
                                             require="0"></x-form.producer>

                            </div>


                            <div class="col-12 col-md-6">
                                <x-form.producer :items="$users" name="translator" namefa="{{ __('site.translator') }}" type="{{ __('routes.articles_singular') }}"
                                             require="0"></x-form.producer>

                            </div>


                            <div class="col-12 col-md-6">
                                <x-form.producer :items="$users" name="photographer" namefa="{{ __('site.photographer') }}" type="{{ __('routes.articles_singular') }}"
                                             require="0"></x-form.producer>

                            </div>

                            <div class="col-12 col-md-6">
                                <x-form.producer :items="$users" name="writer" namefa="{{ __('site.writer') }}" type="{{ __('routes.articles_singular') }}" require="0"></x-form.producer>

                            </div>


                        </div>
                    </div>
                    </div>


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> @lang('site.types_of_news') </h5>


                        <div class="row">
                            <div class="col-12 col-md-4">
                                <x-form.select name="article_type" namefa="{{ __('site.article_type') }}" :items="$types" type="{{ __('routes.articles_singular') }}"
                                               require="0"></x-form.select>
                            </div>


                            <div class="col-12 col-md-4">
                                <x-form.utility name="origin_type" namefa="{{ __('site.article_origin_type') }}"
                                                :items="\App\Utility\News\OriginType::get_items()" type="{{ __('routes.articles_singular') }}"
                                                require="0" multiple="0"></x-form.utility>


                            </div>



                            <div class="col-12 col-md-4">
                                <x-form.select name="article_origin" namefa="{{ __('site.article_origin') }}" :items="$origins" type="{{ __('routes.articles_singular') }}"
                                               require="0"></x-form.select>
                            </div>

                            <div class="col-12 col-md-12">
                                <x-form.select name="positions" namefa="{{ __('site.positions') }}" :items="$positions" type="{{ __('routes.articles_singular') }}"
                                               require="0" multiple="1"></x-form.select>
                            </div>


                            <div class="col-12 col-md-6">
                                <x-form.select name="connections" namefa="{{ __('site.connections') }}" :items="$connections" type="{{ __('routes.articles_singular') }}"
                                               require="0" multiple="1"></x-form.select>
                            </div>



                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ __('site.display_setting_new') }}
                        </h5>

                        <div class="row">
                            <div class="col-12 col-md-3">
                                <x-form.checkbox name="comments" namefa="{{ __('site.displa_comments') }}" type="{{ __('routes.articles_singular') }}" require="0"
                                                 value="1"></x-form.checkbox>
                            </div>


                            <div class="col-12 col-md-3">
                                <x-form.checkbox name="image_rss" namefa="{{ __('site.image_rss') }} " type="{{ __('routes.articles_singular') }}" require="0"
                                                 value="0"></x-form.checkbox>
                            </div>


                            <div class="col-12 col-md-3">
                                <x-form.checkbox name="most_comments" namefa="{{ __('site.display_most_comments') }}" type="{{ __('routes.articles_singular') }}"
                                                 require="0" value="0"></x-form.checkbox>
                            </div>


                            <div class="col-12 col-md-3">
                                <x-form.checkbox name="most_rated" namefa="{{ __('site.display_most_rated') }}" type="{{ __('routes.articles_singular') }}"
                                                 require="0" value="0"></x-form.checkbox>
                            </div>

                            <div class="col-12 col-md-3">
                                <x-form.checkbox name="image_default" namefa="{{ __('site.image_default') }}" type="{{ __('routes.articles_singular') }}"
                                                 require="0" value="0"></x-form.checkbox>
                            </div>

                            <div class="col-12 col-md-3">
                                <x-form.checkbox name="most_viewed" namefa="{{ __('site.display_most_viewed') }}" type="{{ __('routes.articles_singular') }}"
                                                 require="0" value="0"></x-form.checkbox>
                            </div>


                            <div class="col-12 col-md-3">
                                <x-form.checkbox name="view_count" namefa="{{ __('site.display_view_count') }}" type="{{ __('routes.articles_singular') }}" require="0"
                                                 value="0"></x-form.checkbox>
                            </div>


                            <div class="col-12 col-md-3">
                                <x-form.checkbox name="social" namefa="{{ __('site.display_social') }} " type="{{ __('routes.articles_singular') }}"
                                                 require="0" value="1"></x-form.checkbox>

                            </div>


                            <div class="col-12 col-md-3">
                                <x-form.checkbox name="rss" namefa="{{ __('site.display_rss') }} " type="{{ __('routes.articles_singular') }}" require="0"
                                                 value="1"></x-form.checkbox>
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
                        :items="\App\Utility\Status::items()" type="{{ __('routes.articles_singular') }}"
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif


            </div>
            <div class="col-md-3">
                <x-form.filemanager.image name="image2"  second="2" namefa="{{ __('site.main_image') }}"
                                         ></x-form.filemanager.image>

                <x-form.filemanager.filemanager></x-form.filemanager.filemanager>
            </div>
        </form>



    </div>




@endsection

@section('scripts')
    <script>
        $('#img_lfm2').filemanager('image');
        $("input.tagsinput-example").tagsinput('items');
    </script>



@endsection
