@extends ('admin.layout.master')


@section('content')
    <div class="content">


        @include('admin.library.breadcrumb')

        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">

                        @include('admin.library.table');

                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- DataTable -->


@endsection
@section('scripts')
    <script>
        // Deleting Warning and Confirm Needed


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
