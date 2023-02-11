@extends('admin.layout.master')


@section('content')
    <div class="content">


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-12">
                        <div class="card card-personal">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert text-center">
                                           @lang('site.site_name')
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="avatar_cart">

                                                @if(\App\Utility\Acl::isReal($user->id))
                                                    @if(isset($user->personal) && !empty($user->personal))
                                                        <img src="{{ Storage::url($user->avatar) }}"
                                                             class="rounded-circle"
                                                             alt="...">
                                                    @else
                                                        <img
                                                            src="{{ Storage::url($user->avatar) }}"
                                                            class="rounded-circle"
                                                            alt="...">
                                                    @endif
                                                @else
                                                    <img src="{{ Storage::url($user->avatar) }}"
                                                         class="rounded-circle"
                                                         alt="...">
                                                @endif

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <table class="table table-striped">
                                            <tr>
                                                <td>@lang('site.name_and_lastname')</td>
                                                <td>{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('site.melli_code')</td>
                                                <td>{{ $user->details->melli_code }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('site.marketing_code')</td>
                                                <td>{{ $user->details->presentation_code }}</td>
                                            </tr>
                                            <tr>
                                                <td>@lang('site.mobile_phone')</td>
                                                <td>{{ $user->mobile }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert text-center">
                                          @lang('site.personal_code_written_text')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert text-center">
                                           @lang('site.site_name')
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-12 col-md-12">
                                        <p>@lang('site.site_name')</p>
                                        <p class="card_paragraph">
                                            {{ $setting->getItem('behind')->html }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert text-center">
                                            @lang('site.personal_code_written_text')
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <a class="btn btn-success" href="javascript:window.print()">
                               @lang('site.cart_print')
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        $(document).on('click' , '.sa-warning' , function () {

            Swal.fire({
                title: "@lang('site.cutco_delete_message')",
                text: "@lang('site.i_am_sure_in_cutco')",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "@lang('site.yes')",
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
