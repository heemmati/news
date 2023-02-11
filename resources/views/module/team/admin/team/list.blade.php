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
                                @if(isset($sliders) && !empty($sliders))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>آیدی</th>
                                            <th>عنوان اسلایدر</th>
                                            <th>تصویر اسلایدر</th>
                                            <th>لینک اسلایدر</th>
                                            <th>توضیحات اسلایدر</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $sliders as $slider)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $slider->title }}</td>

                                                @if(isset($slider->images[0]) && !empty($slider->images[0]))
                                                    <x-table.image :src="$slider->images[0]"></x-table.image>
                                                @else
                                                    <td>
                                                        ندارد
                                                    </td>

                                                @endif

                                                <td>
                                                    <a href="{{ $slider->link }}">
                                                        <i class="fas fa-link"></i>
                                                        مشاهده لینک
                                                    </a>
                                                </td>


                                                <td>
                                                    {{ $slider->description }}
                                                </td>

                                                <td>
                                                    <x-status-show :status="$slider->status"></x-status-show>

                                                </td>

                                                <td>

                                                    <a href="{{ route('sliders.edit' , $slider->id) }}">
                                                        <i class="fa fa-pen"></i>
                                                    </a>


                                                    <a href="javascript:void(0)" class="sa-warning">
                                                        <i class="fa fa-trash"></i>
                                                    </a>

                                                    {{--Deleting Form--}}
                                                    <form action="{{ route('sliders.destroy' , $slider->id) }}}"
                                                          method="POST" style="display: none">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-default"></button>
                                                    </form>
                                                    {{--Deleting Form--}}

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>آیدی</th>
                                            <th>عنوان اسلایدر</th>
                                            <th>تصویر اسلایدر</th>
                                            <th>لینک اسلایدر</th>
                                            <th>توضیحات اسلایدر</th>

                                            <th>عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ اسلایدری یافت نشد!
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
