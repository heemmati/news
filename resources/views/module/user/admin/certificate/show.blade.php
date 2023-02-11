@extends('admin.layout.master')


@section('content')
    <div class="content">


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-4">

                        <div class="card">

                            <div class="card-body">
                                @if(\App\Utility\Acl::isLegal($user->id))
                                    @if(isset($user->details->certificate))
                                        <h6>گواهینامه شرکت</h6>
                                        <div class="certificate_img">
                                            <img src="{{ Storage::url($user->details->certificate) }}" alt="">
                                        </div>
                                    @endif

                                    @if(isset($user->details->newspaper))
                                        <h6>روزنامه رسمی شرکت</h6>
                                        <div class="certificate_img">
                                            <img src="{{ Storage::url($user->details->newspaper) }}" alt="">
                                        </div>
                                    @endif

                                    @if(isset($user->details->statute))
                                        <h6>اساسنامه شرکت</h6>
                                        <div class="certificate_img">
                                            <img src="{{ Storage::url($user->details->statute) }}" alt="">
                                        </div>
                                    @endif
                                @else
                                    @if(isset($user->details->melli_card))
                                        <h6>کارت ملی کاربر</h6>
                                        <div class="certificate_img">
                                            <img src="{{ Storage::url($user->details->melli_card) }}" alt="">
                                        </div>
                                    @endif
                                    @if(isset($user->details->personal))
                                        <h6>عکس 3*4 کاربر</h6>
                                        <div class="certificate_img">
                                            <img src="{{ Storage::url($user->details->personal) }}" alt="">
                                        </div>
                                    @endif
                                @endif
                            </div>

                        </div>


                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title d-flex justify-content-between align-items-center">
                                    مشخصات

                                </h6>
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">نام و نام خانوادگی / نام شرکت</div>
                                    <div class="col-6">{{ $user->name }}</div>
                                </div>

                                @if(isset($user->presentation_code) && !empty($user->presentation_code))
                                    <div class="row mb-2">
                                        <div class="col-6 text-muted">کد بازاریابی</div>
                                        <div class="col-6">{{ $user->presentation_code }}</div>
                                    </div>
                                @endif

                                <div class="row mb-2">
                                    <div class="col-6 text-muted">ایمیل</div>
                                    <div class="col-6">{{ $user->email }}</div>
                                </div>

                                @if(isset( $user->details->melli_code))
                                    <div class="row mb-2">
                                        <div class="col-6 text-muted">شماره ملی / کد ملی</div>
                                        <div class="col-6">{{ $user->details->melli_code }}</div>
                                    </div>
                                @endif

                                @if(\App\Utility\Acl::isLegal($user->id))
                                    <div class="row mb-2">
                                        <div class="col-6 text-muted">شماره ثبت</div>
                                        <div class="col-6">{{ $user->details->register_number  }}</div>
                                    </div>
                                @else
                                    @if(isset($user->details->heir_name))
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">نام وارث</div>
                                            <div class="col-6">{{ $user->details->heir_name }}</div>
                                        </div>
                                    @endif
                                    @if(isset($user->details->heir_melli_code))
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">کد ملی وارث</div>
                                            <div class="col-6">{{ $user->details->heir_melli_code  }}</div>
                                        </div>
                                    @endif
                                @endif


                                <div class="row mb-2">
                                    <div class="col-6 text-muted">شماره همراه</div>
                                    <div class="col-6">{{ $user->mobile }}</div>
                                </div>


                                <div class="row mb-2">
                                    <div class="col-6 text-muted">سمت</div>
                                    <div class="col-6">{{ \App\Utility\Acl::getRole($user->role) }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 text-muted">وضعیت تاییدیه ایمیل</div>
                                    <div
                                        class="col-6">{{ !empty($user->account_verification) == true ? 'تایید شده' : 'تایید نشده' }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 text-muted">وضعیت قرار داد</div>
                                    <div
                                        class="col-6">{{ !empty($user->contract_verification) == true ? 'بسته شده' : 'قرار داد بسته نشده' }}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6 text-muted">وضعیت تاییدیه مدارک</div>
                                    <div
                                        class="col-6">{{ !empty($user->certificate_verification) == true ? 'تایید شده' : 'تایید نشده' }}</div>
                                </div>


                                @can('certificates.confirm')

                                    <div class="certificate_form">
                                        <h6> ارزیابی مدارک آپلود شده</h6>
                                        <form action="{{ route('certificates.confirm') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="certificate_id" value="{{ $certificate->id }}">
                                            <div class="form-group">
                                                <label for="">وضعیت ارزیابی</label>
                                                <select class="form-control" name="status" id="">
                                                    <option value="0">رد کردن</option>
                                                    <option value="1">تایید کردن</option>
                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <label for="">دلیل خود را بنویسید</label>
                                                <textarea class="form-control" name="message"
                                                          placeholder="دلیل خود را بنویسید" id="" cols="30"
                                                          rows="10"></textarea>

                                            </div>

                                            <button class="btn btn-sm btn-success">تعیین وضعیت</button>


                                        </form>
                                    </div>
                                @endcan


                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

