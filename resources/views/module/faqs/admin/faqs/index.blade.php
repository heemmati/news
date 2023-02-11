@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <div class="page-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('faqs.index') }}">مدیریت پرسش و پاسخ ها</a>
                    </li>

                </ol>
            </nav>

            @can('faqs.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('faqs.create') }}">
                        ایجاد پرسش و پاسخ جدید
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
                                @if(isset($faqs) && !empty($faqs))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان پرسش و پاسخ</th>
                                            <th>تصویر پرسش و پاسخ</th>
                                            <th>وضعیت پرسش و پاسخ</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>عملیات</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($faqs as $faq)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>
                                                    {{ $faq->title }}
                                                </td>

                                                <td class="td-image">
                                                    @if(isset($faq->images[0]) && !empty($faq->images[0]))
                                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($faq->images[0]->src) }}" alt="">
                                                    @endif
                                                </td>


                                                <td>
                                                    <x-status-show :status="$faq->status"></x-status-show>
                                                </td>

                                                <td>
                                                    {{ $faq->timeHandler() }}
                                                </td>


                                                <td>

                                                    @can('faqs.edit')
                                                        <a href="{{ route('faqs.edit' , $faq->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan
                                                    @can('faqs.show')
                                                        <a href="{{ route('faqs.show' , $faq->id ) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    @endcan


                                                    @can('faqs.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {{--Deleting Form--}}
                                                        <form
                                                            action="{{ route('faqs.destroy' , $faq->id) }}"
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
                                            <th>عنوان پرسش و پاسخ</th>
                                            <th>تصویر پرسش و پاسخ</th>
                                            <th>وضعیت پرسش و پاسخ</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ پرسش و پاسخی یافت نشد!
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
