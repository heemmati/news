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
                        <a href="{{ route('journals.index') }}">@lang('site.journals_management')</a>
                    </li>

                </ol>
            </nav>

            @can('journals.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('journals.create') }}">
                        @lang('site.create_new_journals')
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
                                @if(isset($journals) && !empty($journals))
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            {{-- <th>  <input type="checkbox" name="is_all" value="all"></th> --}}

                                            <th>@lang('site.journals_title')</th>
                                            <th>@lang('site.journals_image')</th>
                                            <th>@lang('site.journals_status')</th>

                                            <th>@lang('site.journals_created')</th>
                                            <th>@lang('site.operation')</th>

                                        </tr>
                                        </thead>
                                        <tbody>


                                        @foreach($journals as $journal)

                                            <tr>


                                                <td>
                                                    <a href="{{ $journal->path() }}">
                                                        {{ $journal->title }}
                                                    </a>

                                                </td>

                                                <td class="td-image">
                                                    @if(isset($journal->images) && !empty($journal->images) && !empty($journal->images[0]))
                                                        <img
                                                            src="{{ \Illuminate\Support\Facades\Storage::url($journal->images[0]->src) }}"
                                                            alt="">
                                                    @else
                                                        عکس ندارد
                                                    @endif
                                                </td>

                                                <td>

                                                    <x-status-show :status="$journal->status"
                                                                   :model="$journal"></x-status-show>

                                                </td>

                                                <td>
                                                    {{ $journal->timePersianCreated() }}
                                                </td>


                                                <td>

                                                    @can('journals.edit')
                                                        <a href="{{ route('journals.edit' , $journal->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan
{{--                                                    @can('journals.show')--}}
{{--                                                        <a href="{{ route('journals.show' , $journal->id ) }}">--}}
{{--                                                            <i class="fa fa-eye"></i>--}}
{{--                                                        </a>--}}
{{--                                                    @endcan--}}


                                                    @can('journals.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {{--Deleting Form--}}
                                                        <form
                                                            action="{{ route('journals.destroy' , $journal->id) }}"
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

                                            <th>@lang('site.journals_title')</th>
                                            <th>@lang('site.journals_image')</th>

                                            <th>@lang('site.journals_status')</th>
                                            <th>@lang('site.journals_created')</th>
                                            <th>@lang('site.operation')</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    {{-- </form> --}}
                                    <div class="pagination">
                                        {!! $journals->appends(request()->except('page'))->links() !!}
                                    </div>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        @lang('site.no_journals_found')
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

    </script>
@endsection
