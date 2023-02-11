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
                        <a href="{{ route('article-categories.index') }}">@lang('site.category_management')</a>
                    </li>

                </ol>
            </nav>

            @can('articles.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('article-categories.create') }}">
                        @lang('site.create_new_category')
                    </a>

                </div>
            @endcan




        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if(isset($categories) && !empty($categories))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان دسته بندی</th>
                                            <th>تصویر دسته بندی</th>
                                            <th>دسته بندی والد</th>
                                            <th>وضعیت دسته بندی</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>عملیات</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>
                                                    {{ $category->title }}
                                                </td>


                                                <td class="td_image">
                                                    @if( isset($category->image)  && !empty($category->image) )

                                                        <img src="{{ Storage::url($category->image) }}" alt="{{ Storage::url($category->image) }}">
                                                    @else


                                                    @endif

                                                </td>


                                                <td>
                                                    @if(isset($category->father) && $category->father > 0)
                                                        {{ $category->father }}
                                                    @else
                                                        @lang('site.mother')
                                                    @endif
                                                </td>


                                                <td>
                                                    <x-status-show :status="$category->status" :model="$category"></x-status-show>

                                                </td>

                                                <td>
                                                    {{ $category->timeHandler() }}
                                                </td>


                                                <td>

                                                    @can('article-categories.edit')
                                                        <a href="{{ route('article-categories.edit' , $category->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan
                                                    @can('article-categories.show')
                                                        <a href="{{ route('article-categories.show' , $category->id ) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    @endcan


                                                    @can('article-categories.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {{--Deleting Form--}}
                                                        <form
                                                            action="{{ route('article-categories.destroy' , $category->id) }}"
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

                                            <th>#</th>
                                            <th>عنوان دسته بندی</th>
                                            <th>تصویر دسته بندی</th>
                                            <th>دسته بندی والد</th>
                                            <th>وضعیت دسته بندی</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>عملیات</th>

                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        @lang('site.no_user_found')
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

        $(document).on('click' , '.sa-warning' , function () {

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
