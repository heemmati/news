@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <div class="page-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">@lang('site.dasboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('themes.index') }}">
                        @lang('site.theme_list')
                        </a>
                    </li>

                </ol>
            </nav>

            @can('themes.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('themes.create') }}">@lang('site.create_new_theme')</a>

                </div>
            @endcan

        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if(isset($themes) && !empty($themes))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                          <th>@lang('site.ID')</th>
                                          <th>@lang('site.theme_title')</th>
                                          <th>@lang('site.theme_path')</th>
                                          <th>@lang('site.theme_created')</th>
                                          <th>@lang('site.operations')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($themes as $theme)

                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>


                                                <td>
                                                    {{ $theme->title }}
                                                </td>

                                                <td>
                                                    {{ $theme->path }}
                                                </td>

                                                <td>
                                                    {{ $theme->timeHandler() }}
                                                </td>

                                                <td>

                                                    @can('themes.edit')
                                                        <a href="{{ route('themes.edit' , $theme->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan

                                                    @can('themes.show')
                                                        <a href="{{ route('themes.show' , $theme->id ) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    @endcan


                                                    @can('themes.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {{--Deleting Form--}}
                                                        <form
                                                            action="{{ route('themes.destroy' , $theme->id) }}"
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
                                            <th>@lang('site.ID')</th>
                                            <th>@lang('site.theme_title')</th>
                                            <th>@lang('site.theme_path')</th>
                                            <th>@lang('site.theme_created')</th>
                                            <th>@lang('site.operations')</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        @lang('site.no_theme_were_found')
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
