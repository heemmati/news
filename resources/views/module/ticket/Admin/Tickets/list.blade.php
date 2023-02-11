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
                        <a href="{{ route('tickets.index') }}">لیست تیکت ها </a>
                    </li>

                </ol>
            </nav>

            @can('tickets.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('tickets.create') }}">ایجاد تیکت جدید</a>

                </div>
            @endcan

        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if(isset($tickets) && !empty($tickets))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>شماره تیکت</th>

                                            <th>عنوان</th>
                                            <th>ارسال کننده</th>
                                            <th>دپارتمان</th>

                                            <th>اولویت </th>
                                            <th> وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tickets as $ticket)

                                                <tr>
                                                    <td>DGA-{{ $ticket->code }}</td>
                                                    <td>
                                                        {{ $ticket->title }}
                                                    </td>
                                                    <td>{{ $ticket->FromMe->name }}</td>
                                                    <td>{{ $ticket->department->title }}</td>


                                                    <td>
                                                        <a href="javascript:void(0)" class="btn btn-sm {{ \Modules\Ticket\Utility\Ticket::get_priority_style($ticket->priority) }}">
                                                            {{ \Modules\Ticket\Utility\Ticket::get_priority($ticket->priority) }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)" class="btn btn-sm {{ \Modules\Ticket\Utility\Ticket::get_status_style($ticket->status) }}">
                                                            {{ \Modules\Ticket\Utility\Ticket::get_status($ticket->status) }}
                                                        </a>
                                                    </td>

                                                    <td>

                                                        @can('tickets.edit')
                                                            <a href="{{ route('tickets.edit' , $ticket->id) }}">
                                                                <i class="fa fa-pen"></i>
                                                            </a>
                                                        @endcan

                                                        @can('tickets.show')
                                                            <a href="{{ route('tickets.show' , $ticket->id ) }}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        @endcan


                                                        @can('tickets.destroy')
                                                            <a href="javascript:void(0)" class="sa-warning">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            {{--Deleting Form--}}
                                                            <form
                                                                action="{{ route('tickets.destroy' , $ticket->id) }}"
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
                                            <th>شماره تیکت</th>
                                            <th>ارسال کننده</th>
                                            <th>دپارتمان</th>
                                            <th>عنوان</th>
                                            <th>اولویت </th>
                                            <th> وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ تیکتی یافت نشد
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
