@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <x-admin.partials.page-header :breadcrumbs="$breadcrumbs"></x-admin.partials.page-header>

        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">
                                @if(isset($socials) && !empty($socials))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>آیدی</th>
                                            <th>عنوان شبکه اجتماعی</th>
                                            <th>عنوان انگلیسی شبکه اجتماعی</th>
                                            <th>تصویر / آیکون شبکه اجتماعی</th>
                                            <th>رنگ شبکه اجتماعی</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $socials as $social)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $social->title }}</td>
                                                <td>{{ $social->entitle }}</td>

                                                @if(isset($social->images[0]) && !empty($social->images[0]))
                                                    <x-table.image :src="$social->images[0]"></x-table.image>
                                                @else
                                                    @if(isset($social->icons[0]) && !empty($social->icons[0]))
                                                        <i class="{{ $social->icons[0]->src  }}"></i>
                                                    @else
                                                        ندارد
                                                    @endif
                                                @endif

                                                <td>
                                                    @if(isset($social->color) && !empty($social->color))
                                                        <span class="social_color"
                                                              style="background-color: {{ $social->color }}"></span>
                                                    @else
                                                        ندارد
                                                    @endif
                                                </td>

                                                <td>
                                                    <x-status-show :status="$social->status"></x-status-show>

                                                </td>

                                                <td>

                                                    @can('socials.edit')
                                                        <a href="{{ route('socials.edit' , $social->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan

                                                    @can('socials.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>


                                                        {{--Deleting Form--}}
                                                        <form action="{{ route('socials.destroy' , $social->id) }}}"
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
                                            <th>آیدی</th>
                                            <th>عنوان شبکه اجتماعی</th>
                                            <th>عنوان انگلیسی شبکه اجتماعی</th>
                                            <th>تصویر / آیکون شبکه اجتماعی</th>
                                            <th>رنگ شبکه اجتماعی</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ شبکه اجتماعی ای یافت نشد!
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>

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
