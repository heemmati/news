@extends ('admin.layout.master2')


@section('content')
    <div class="row">
        <form method="POST" action="{{ route('articles.update' , $article->id ) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')


            <br>


            <div class="col-md-9">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 class="card-title">@lang('site.basic_inforamtion')</h5>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary btn-sm">@lang('site.news_update')</button>
                                    @if ($article->status == \App\Utility\Status::CONFIRMED)
                                        <a href="{{ $article->path() }}" class="btn btn-danger btn-sm">@lang('site.news_main_show')</a>
                                    @endif

                                    <a href="{{ route('articles.show' , $article->id ) }}" class="btn btn-success btn-sm">@lang('site.news_draft_show')</a>
                                </div>
                            </div>
                        </div>


                        @include('error.forms')

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <x-form.text name="title" :value="$article->title" namefa="{{ __('site.title') }}"
                                             type="{{ __('routes.articles_singular') }}" require="1"></x-form.text>
                                                                <x-form.text name="entitle" :value="$article->entitle"  namefa="{{ __('site.entitle') }}" type="{{ __('routes.articles_singular') }}"
                                                                             require="0"></x-form.text>

                                                                <x-form.text name="external_link" :value="$article->external_link" namefa="{{ __('site.external_link') }}" type="{{ __('routes.articles_singular') }}"
                                                                             require="0"></x-form.text>
                                <x-form.select name="categories" :value="$selected_categories"
                                               namefa="{{ __('site.categories') }}" :items="$categories"
                                               type="{{ __('routes.articles_singular') }}"
                                               require="0" multiple="1"></x-form.select>
                                {{--                                :value="$article->categories"--}}


                                <x-form.select name="regions" :value="$selected_regions"
                                               namefa="{{ __('site.regions') }}" :items="$regions"
                                               type="{{ __('routes.articles_singular') }}"
                                               require="0" multiple="1"></x-form.select>



                            </div>
                            <div class="col-12 col-md-6">

                                <x-form.text name="head_title" :value="$article->head_title"
                                             namefa="{{ __('site.head-title') }}"
                                             type="{{ __('routes.articles_singular') }}" require="0"></x-form.text>


                                <x-form.tag :tags="$article->tags"></x-form.tag>


                            </div>
                            <div class="col-12 col-md-12">
                                <x-form.textarea name="description" :value="$article->description"
                                                 namefa="{{ __('site.description') }}"
                                                 type="{{ __('routes.articles_singular') }}"
                                                 require="0"></x-form.textarea>
                            </div>
                        </div>

                        <x-form.textarea name="body" :value="$article->body" namefa="{{ __('site.body') }}"
                                         type="{{ __('routes.articles_singular') }}" require="0"></x-form.textarea>

                    </div>
                </div>


                                <div class="card">
                                    <div class="card-body">

                                        <h5 class="card-title">@lang('site.article_producer')</h5>

                                        <div class="row">

                                            <div class="col-12 col-md-6">
                                                <x-form.producer :value="$article->producer->company"  :value2="$article->producer->company_id" name="company" :items="$users" namefa="{{ __('site.company') }}" type="{{ __('routes.articles_singular') }}" require="0"></x-form.producer>

                                            </div>


                                            <div class="col-12 col-md-6">
                                                <x-form.producer :value="$article->producer->author"   :value2="$article->producer->author_id" name="author" :items="$users" namefa="{{ __('site.author') }}" type="{{ __('routes.articles_singular') }}" require="0"></x-form.producer>


                                            </div>


                                            <div class="col-12 col-md-6">
                                                <x-form.producer :value="$article->producer->reporter" :items="$users" :value2="$article->producer->reporter_id"  name="reporter" namefa="{{ __('site.reporter') }} " type="{{ __('routes.articles_singular') }}"
                                                                 require="0"></x-form.producer>

                                            </div>


                                            <div class="col-12 col-md-6">
                                                <x-form.producer :items="$users" :value="$article->producer->translator" :value2="$article->producer->translator_id"  name="translator" namefa="{{ __('site.translator') }}" type="{{ __('routes.articles_singular') }}"
                                                                 require="0"></x-form.producer>

                                            </div>


                                            <div class="col-12 col-md-6">
                                                <x-form.producer :items="$users"  :value="$article->producer->photographer" :value2="$article->producer->photographer_id"  name="photographer" namefa="{{ __('site.photographer') }}" type="{{ __('routes.articles_singular') }}"
                                                                 require="0"></x-form.producer>

                                            </div>

                                            <div class="col-12 col-md-6">
                                                <x-form.producer :items="$users" name="writer" :value="$article->producer->writer" :value2="$article->producer->writer_id"  namefa="{{ __('site.writer') }}" type="{{ __('routes.articles_singular') }}" require="0"></x-form.producer>

                                            </div>





                                        </div>
                                    </div>
                                </div>


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> @lang('site.types_of_news') </h5>


                        <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <x-form.select  :value="$article->type"   name="article_type" namefa="{{ __('site.article_type') }}" :items="$types" type="{{ __('routes.articles_singular') }}"
                                                                            require="0"></x-form.select>
                                                        </div>


                                                        <div class="col-12 col-md-6">
                                                            <x-form.utility :value="$article->origin_type" name="origin_type" namefa="{{ __('site.article_origin_type') }}"
                                                                            :items="\App\Utility\News\OriginType::get_items()" type="{{ __('routes.articles_singular') }}"
                                                                            require="0" multiple="0"></x-form.utility>


                                                        </div>


                                                        <div class="col-12 col-md-6">
                                                            <x-form.select  :value="$article->article_origin" name="article_origin" namefa="{{ __('site.article_origin') }}" :items="$origins" type="{{ __('routes.articles_singular') }}"
                                                                            require="0"></x-form.select>
                                                        </div>

                            <div class="col-12 col-md-12">
                                <x-form.select name="positions" :value="$selected_positions"
                                               namefa="{{ __('site.positions') }}" :items="$positions"
                                               type="{{ __('routes.articles_singular') }}"
                                               require="0" multiple="1"></x-form.select>
                            </div>

                                                        <div class="col-12 col-md-6">
                                                            <x-form.select name="connections" namefa="{{ __('site.connections') }}" :value="$selected_connections"  :items="$connections" type="{{ __('routes.articles_singular') }}"
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
                                                <x-form.checkbox name="comments"  namefa="{{ __('site.displa_comments') }}" type="{{ __('routes.articles_singular') }}" require="0"
                                                                 :value="$article->show_comments" ></x-form.checkbox>
                                            </div>


                                            <div class="col-12 col-md-3">
                                                <x-form.checkbox name="image_rss" namefa="{{ __('site.image_rss') }} " type="{{ __('routes.articles_singular') }}" require="0"
                                                                 value="0" :value="$article->image_rss" ></x-form.checkbox>
                                            </div>


                                            <div class="col-12 col-md-3">
                                                <x-form.checkbox name="most_comments" namefa="{{ __('site.display_most_comments') }}" type="{{ __('routes.articles_singular') }}"
                                                                 require="0" :value="$article->most_comments" ></x-form.checkbox>
                                            </div>


                                            <div class="col-12 col-md-3">
                                                <x-form.checkbox name="most_rated"
                                                                 namefa="{{ __('site.display_most_rated') }}" type="{{ __('routes.articles_singular') }}"
                                                                 require="0"
                                                                 :value="$article->most_rated" ></x-form.checkbox>
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <x-form.checkbox name="image_default"
                                                                 namefa="{{ __('site.image_default') }}" type="{{ __('routes.articles_singular') }}"
                                                                 require="0"  :value="$article->show_image" ></x-form.checkbox>
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <x-form.checkbox name="most_viewed"
                                                                 :value="$article->most_viewed"  namefa="{{ __('site.display_most_viewed') }}" type="{{ __('routes.articles_singular') }}"
                                                                 require="0" ></x-form.checkbox>
                                            </div>


                                            <div class="col-12 col-md-3">
                                                <x-form.checkbox name="view_count"
                                                                 :value="$article->view_count"
                                                                 namefa="{{ __('site.display_view_count') }}"
                                                                 type="{{ __('routes.articles_singular') }}" require="0"
                                                ></x-form.checkbox>
                                            </div>



                                            <div class="col-12 col-md-3">
                                                <x-form.checkbox name="social"
                                                                 :value="$article->show_social"
                                                                 namefa="{{ __('site.display_social') }}"
                                                                 type="{{ __('routes.articles_singular') }}"
                                                                 require="0" ></x-form.checkbox>

                                            </div>


                                            <div class="col-12 col-md-3">
                                                <x-form.checkbox name="rss"   :value="$article->show_rss"
                                                                 namefa="{{ __('site.display_rss') }}"
                                                                 type="{{ __('routes.articles_singular') }}"
                                                                 require="0"
                                                ></x-form.checkbox>
                                            </div>



                                        </div>

                                    </div>
                                </div>


                @if(\App\Utility\Acl::isManager(auth()->id()))
                    @can('panel.change.status')
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ __('site.display_setting_new') }}
                                </h5>


                                <x-form.utility name="status" namefa="{{ __('site.status') }}"
                                                :items="\App\Utility\Status::items()" :value="$article->status"
                                                type="{{ __('routes.articles_singular') }}"
                                                require="0" multiple="0"></x-form.utility>


                            </div>
                        </div>
                    @endcan
                @endif


            </div>
            <div class="col-md-3">

                <x-form.filemanager.image name="image2" second="2" namefa="{{ __('site.main_image') }}"
                                          :value="$article->image2"></x-form.filemanager.image>



                <x-form.filemanager.filemanager :object="$article"></x-form.filemanager.filemanager>


            </div>
        </form>


    </div>




@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');
        $('#img_lfm2').filemanager('image');

    </script>

@endsection
