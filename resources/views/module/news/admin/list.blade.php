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
                        <a href="{{ route('articles.index') }}">@lang('site.news_management')</a>
                    </li>

                </ol>
            </nav>

            @can('articles.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('articles.create') }}">
                        @lang('site.create_new_news')
                    </a>

                </div>
            @endcan

 @can('articles.deleteall')
 <div class="page-header_actions">
 <form method="POST" action="{{ route('articles.deleteall') }}" >
     @csrf
     <button class="btn btn-dribbble" type="submit">
                        @lang('site.delete_all_articles')
                    </button>
 </form>
                    

                </div>

                
            @endcan

        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('articles.index') }}" method="get">
                                <div class="filter_table_box">
                                    <div class="row">
                                        <div class="col-12">
                                            <h3>@lang('site.filter_title')</h3>
                                            <h4>@lang('site.all_view') : {{ $view }}</h4>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="filter_item">
                                                <x-form.text name="code" namefa="{{ __('site.code_filter') }}" type="{{ __('routes.articles_singular') }}" require="0"></x-form.text>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="filter_item">
                                                <x-form.text name="title" namefa="{{ __('site.title_filter') }}" type="{{ __('routes.articles_singular') }}" require="0"></x-form.text>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="filter_item">
                                                <x-form.utility name="status"
                                                               namefa="{{ __('site.status') }}" :items="\App\Utility\Status::items()"
                                                               type="{{ __('routes.articles_singular') }}"
                                                               require="0"></x-form.utility>
                                            </div>
                                        </div>


                                        <div class="col-12 col-md-3">
                                            <div class="filter_item">

                                                <div class="form-group">

                                                    <label for=""> @lang('site.created_from') </label>
                                                    <input class="form-control"  autocomplete="off" type="text" name="start" id="date2">
                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <div class="filter_item">

                                                <div class="form-group">

                                                    <label for=""> @lang('site.created_to') </label>
                                                    <input class="form-control"  autocomplete="off" type="text" name="end" id="date3">
                                                </div>


                                            </div>
                                        </div>


                                        <div class="col-12 col-md-3">
                                            <div class="filter_item">
                                                <x-form.select name="categories"
                                                               namefa="{{ __('site.categories') }}" :items="$categories"
                                                               type="{{ __('routes.articles_singular') }}"
                                                               require="0"></x-form.select>
                                            </div>
                                        </div>




                                        <div class="col-12 col-md-3">
                                            <div class="filter_item">
                                                <x-form.select name="regions"
                                                               namefa="{{ __('site.regions') }}" :items="$regions"
                                                               type="{{ __('routes.articles_singular') }}"
                                                               require="0"></x-form.select>                                            </div>
                                        </div>


                                        <div class="col-12 col-md-3">
                                            <div class="filter_item">

                                                <div class="form-group">

                                                    <label for=""> @lang('site.reporter_name') </label>
                                                    <input class="form-control"  autocomplete="off" type="text" name="reporter" >
                                                </div>


                                            </div>
                                        </div>




                                        <div class="col-12 col-md-3">
                                            <div class="filter_item">
                                                <button class="btn  btn-success">@lang('site.filter')</button>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                </form>
                                {{-- <form action="{{ route('articles.multijob') }}" method="POST">
                                    @csrf --}}
{{--
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">



                                                <select name="action_mode" class="form-control" id="">
                                                    <option value="">@lang('site.choose_action_mode')</option>
                                                    <option value="1">@lang('site.delete_all')</option>
                                                    <option value="2">@lang('site.change_to_published')</option>
                                                    <option value="3">@lang('site.change_to_failed')</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-12 col-md-6">

                                            <button class="btn btn-danger" type="submit">@lang('site.apply')</button>

                                        </div>
                                    </div> --}}


                                @if(isset($articles) && !empty($articles))
                                    <table  class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            {{-- <th>  <input type="checkbox" name="is_all" value="all"></th> --}}

                                            <th>@lang('site.news_code')</th>
                                    
                                            <th>@lang('site.news_title')</th>
                                            <th>@lang('site.news_image')</th>
                                            <th>@lang('site.news_category')</th>
                                            <th>@lang('site.news_src')</th>
                                            <th>@lang('site.news_status')</th>
                                            <th>@lang('site.news_created')</th>
                                            <th>@lang('site.operation')</th>

                                        </tr>
                                        </thead>
                                        <tbody>


                                            @foreach($articles as $article)

                                            <tr>
                                      
                                                <td>{{ $article->code }}</td>

                                      

                                                <td>
                                                    <a href="{{ $article->path() }}">
                                                        {{ $article->title }}
                                                    </a>

                                                </td>

                                                <td class="td-image">

                                                    @if(isset($article->image) && !empty($article->image))
                                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($article->image) }}" alt="">
                                                    @else
                                                                عکس ندارد
                                                    @endif
                                                </td>

                                                <td>

                                                    <x-category-td :categories="$article->categories"></x-category-td>
                                                </td>
                                                
                                                <td>
                                                    {{ $article->src }}
                                                </td>

                                               
                                                <td>

                                                    <x-status-show :status="$article->status" :model="$article"></x-status-show>

                                                </td>

                                                <td>
                                                    {{ $article->timeHandler() }}
                                                </td>


                                                <td>

                                                    @can('articles.edit')
                                                        <a href="{{ route('articles.edit' , $article->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan
                                                    @can('articles.show')
                                                        <a href="{{ route('articles.show' , $article->id ) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    @endcan


                                                    @can('articles.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {{--Deleting Form--}}
                                                        <form
                                                            action="{{ route('articles.destroy' , $article->id) }}"
                                                            method="POST" style="display: none">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-default"></button>
                                                        </form>
                                                        {{--Deleting Form--}}
                                                    @endcan

                                                </td>
                                            </tr>



                                        @endforeach


                                        </tbody>
                                        <tfoot>
                                        <tr>

                                            <th>@lang('site.news_code')</th>

                                            <th>@lang('site.news_title')</th>
                                            <th>@lang('site.news_image')</th>
                                            <th>@lang('site.news_category')</th>
                                            <th>@lang('site.news_src')</th>
                                            <th>@lang('site.news_status')</th>
                                            <th>@lang('site.news_created')</th>
                                            <th>@lang('site.operation')</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                {{-- </form> --}}
                                    <div class="pagination">
                                        {!! $articles->appends(request()->except('page'))->links() !!}
                                    </div>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        @lang('site.no_news_found')
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- DataTable -->


@endsection
@section('scripts')
    <script>

        $(document).on('click', '.sa-warning', function () {

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


        var customOptions = {
			placeholder: "روز / ماه / سال"
			, twodigit: true
			, closeAfterSelect: false
			, nextButtonIcon: "far fa-arrow-circle-right"
			, previousButtonIcon: "far fa-arrow-circle-left"
			, buttonsColor: "blue"
			, forceFarsiDigits: true
			, markToday: true
			, markHolidays: true
			, highlightSelectedDay: true
			, sync: true
			, gotoToday: true
		}
		kamaDatepicker('date2', customOptions);
        kamaDatepicker('date3', customOptions);


    </script>
@endsection
