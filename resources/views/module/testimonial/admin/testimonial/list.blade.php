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
                                @if(isset($testimonials) && !empty($testimonials))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>آیدی</th>
                                            <th>نام مشتری</th>
                                            <th>تصویر آواتار مشتری</th>
                                            <th>پست / سمت دیدگاه مشتری</th>
                                            <th> دیدگاه مشتری</th>
                                            <th>
                                                وضعیت
                                            </th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $testimonials as $testimonial)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $testimonial->title }}</td>

                                                @if(isset($testimonial->images[0]) && !empty($testimonial->images[0]))
                                                    <x-table.image :src="$testimonial->images[0]"></x-table.image>
                                                @else
                                                    <td>
                                                        ندارد
                                                    </td>

                                                @endif

                                                <td>
                                                    {{ $testimonial->post }}
                                                </td>


                                                <td>
                                                    {{ $testimonial->description }}
                                                </td>

                                                <td>
                                                    <x-status-show :status="$testimonial->status"></x-status-show>

                                                </td>

                                                <td>

                                                    @can('testimonials.edit')
                                                        <a href="{{ route('testimonials.edit' , $testimonial->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan

                                                    @can('testimonials.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>

                                                        {{--Deleting Form--}}
                                                        <form
                                                            action="{{ route('testimonials.destroy' , $testimonial->id) }}}"
                                                            method="POST" style="display: none">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-default"></button>
                                                        </form>

                                                    @endcan

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>آیدی</th>
                                            <th>نام مشتری</th>
                                            <th>تصویر آواتار مشتری</th>
                                            <th>پست / سمت دیدگاه مشتری</th>
                                            <th> دیدگاه مشتری</th>
                                            <th>
                                                وضعیت
                                            </th>
                                            <th>عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ دیدگاه مشتری ای یافت نشد!
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
