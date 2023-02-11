@extends('admin.layout.master')


@section('content')

    <div class="content">


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-4">

                        <div class="card stickian_profile">
                            <img src="{{ url('admin-theme') }}/assets/media/image/image1.jpg" class="card-img-top"
                                 alt="...">
                            <div class="card-body text-center m-t-70-minus">
                                <figure class="avatar avatar-xl m-b-20">
                                    @if(isset($user->avatar) && !empty($user->avatar))
                                        <img src="{{ Storage::url($user->avatar) }}"
                                             class="rounded-circle"
                                             alt="...">
                                    @else
                                        <img src="{{ url('admin-theme') }}/assets/media/image/user/women_avatar1.jpg"
                                             class="rounded-circle"
                                             alt="...">
                                    @endif
                                </figure>
                                <h5>{{ $user->name }}</h5>
                                <p class="text-muted"> {{ \App\Utility\Acl::getRole($user->role) }}</p>
                                @if(isset($user->details->bio))
                                 <p class="user_bio">
                                {{ $user->details->bio}}
                                </p>
                                @endif
                               
                                <p>
                                    @lang('site.edit_here_info')
                                </p>

                                @if(\App\Utility\Acl::canProfile( auth()->id() , $user->id))
                                    @can('users.edit')
                                        <a href="{{ route('users.edit' , $user->id) }}" class="btn btn-outline-primary btn-block">
                                            <i class="mr-2" data-feather="edit-2"></i>
                                            @lang('site.edit_profile')

                                        </a>
                                    @endcan


                                    <br>
                                    @can('users.change-password')
                                        <a class="btn btn-outline-whatsapp btn-block"
                                           href="{{ route('users.change-password' , $user->id ) }}">
                                            <i class="fa fa-key"></i>
                                            @lang('site.recovery_password')
                                        </a>
                                    @endcan
                                @endif
                            </div>
                            <hr class="m-0">
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-4 text-info">
                                        <h4 class="font-weight-bold"></h4>
                                        <span>
                                          </span>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-8">

                        <div class="card">
                            <div class="card-body">
                                @if(\App\Utility\Acl::canProfile( auth()->id() , $user->id))
                                    @if(isset($user->certificate) && $user->certificate->status == 2)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <p>
                                                @lang('site.certificate_failed_upload_again')
                                            </p>
                                            <p>{{ $user->certificate->message }}</p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                @endif
                                <h6 class="card-title d-flex justify-content-between align-items-center">
                                    @lang('site.information')

                                    @if(\App\Utility\Acl::canProfile( auth()->id() , $user->id))

                                        @can('users.edit')
                                            <a href="{{ route('users.edit' , $user->id) }}"
                                               class="btn btn-outline-light btn-sm">
                                                @lang('site.edit_profile')
                                            </a>
                                        @endcan

                                    @endif


                                </h6>
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">@lang('site.name_and_lastname') / @lang('site.company_name')
                                    </div>
                                    <div class="col-6">{{ $user->name }}</div>
                                </div>

                               
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">@lang('site.email')</div>
                                    <div class="col-6">{{ $user->email }}</div>
                                </div>

                                @if(isset($user->details) && !empty($user->details))

                                    @if(isset( $user->details->melli_code))
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">@lang('site.melli_code')</div>
                                            <div class="col-6">{{ $user->details->melli_code }}</div>
                                        </div>
                                    @endif


                                    <div class="row mb-2">
                                        <div class="col-6 text-muted">@lang('site.mobile_phone')</div>
                                        <div class="col-6">{{ $user->mobile }}</div>
                                    </div>


                                    <div class="row mb-2">
                                        <div class="col-6 text-muted">@lang('site.role')</div>
                                        <div class="col-6">{{ \App\Utility\Acl::getRole($user->role) }}</div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-6 text-muted">@lang('site.email_confirmation_status_status')</div>
                                        <div
                                            class="col-6">{{ !empty($user->account_verification) == true ? __('site.confirmed') : __('site.unconfirmed') }}</div>
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

