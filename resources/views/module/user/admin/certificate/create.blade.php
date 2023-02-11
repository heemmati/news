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
                        <a href="">آپلود مدارک</a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">آپلود مدارک</h6>

                        <form method="POST" action="{{ route('certificates.update' , $certificate->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            @if(\App\Utility\Acl::isReal(auth()->id()))
                                <div class="form-group input-group">
                                    <label>
                                        تصویر کارت ملی
                                    </label>
                                    <div class="form-group input-group">
                                        <input type="text" id="image_label" class="form-control image_label"
                                               name="melli_card"
                                               aria-label="Image" aria-describedby="button-image"
                                               value="{{ auth()->user()->details->melli_card  }}">
                                        <div class="input-group-append">
                                            <button class="button-image btn btn-primary" type="button"
                                                    id="button-image">انتخاب
                                            </button>
                                        </div>
                                    </div>
                                    @if(!empty(auth()->user()->details->melli_card))
                                        <div class="img_certif">
                                            <img src="{{ Storage::url(auth()->user()->details->melli_card) }}" alt="">
                                        </div>
                                    @endif
                                        <small class="form-text text-muted"> تصویر کارت ملی را وارد کنید</small>

                                </div>

                                <div class="form-group input-group">
                                    <label>
                                        تصویر 3*4
                                    </label>
                                    <div class="form-group input-group">
                                        <input type="text" id="image_label" class="form-control image_label"
                                               name="personal"
                                               aria-label="Image" aria-describedby="button-image"
                                               value="{{  auth()->user()->details->personal }}">
                                        <div class="input-group-append">
                                            <button class="button-image btn btn-primary" type="button"
                                                    id="button-image">انتخاب
                                            </button>
                                        </div>
                                    </div>
                                    @if(!empty(auth()->user()->details->personal))
                                        <div class="img_certif">
                                            <img src="{{ Storage::url(auth()->user()->details->personal) }}" alt="">
                                        </div>
                                    @endif
                                    <small class="form-text text-muted"> تصویر  3* 4را وارد کنید</small>

                                </div>


                            @else
                                <div class="form-group input-group">
                                    <label>
                                        تصویر روزنامه رسمی
                                    </label>
                                    <div class="form-group input-group">
                                        <input type="text" id="image_label" class="form-control image_label"
                                               name="newspaper"
                                               aria-label="Image" aria-describedby="button-image"
                                               value="{{ auth()->user()->details->statute }}">
                                        <div class="input-group-append">
                                            <button class="button-image btn btn-primary" type="button"
                                                    id="button-image">انتخاب
                                            </button>
                                        </div>
                                    </div>
                                    @if(!empty(auth()->user()->details->newspaper))
                                        <div class="img_certif">
                                            <img src="{{ Storage::url(auth()->user()->details->newspaper) }}" alt="">
                                        </div>
                                    @endif
                                    <small class="form-text text-muted"> تصویر روزنامه رسمی را وارد کنید</small>
                                </div>

                                <div class="form-group input-group">
                                    <label>
                                        تصویر اساسنامه
                                    </label>
                                    <div class="form-group input-group">
                                        <input type="text" id="image_label" class="form-control image_label"
                                               name="statute"
                                               aria-label="Image" aria-describedby="button-image"
                                               value="{{ auth()->user()->details->statute  }}">
                                        <div class="input-group-append">
                                            <button class="button-image btn btn-primary" type="button"
                                                    id="button-image">انتخاب
                                            </button>
                                        </div>
                                    </div>

                                    @if(!empty(auth()->user()->details->statute))
                                        <div class="img_certif">
                                            <img src="{{ Storage::url(auth()->user()->details->statute) }}" alt="">
                                        </div>
                                    @endif


                                    <small class="form-text text-muted"> تصویر اساسنامه را وارد کنید</small>
                                </div>

                                <div class="form-group input-group">
                                    <label>
                                        تصویر گواهینامه رسمی
                                    </label>
                                    <div class="form-group input-group">
                                        <input type="text" id="image_label" class="form-control image_label"
                                               name="certificate"
                                               aria-label="Image" aria-describedby="button-image"
                                               value="{{ auth()->user()->details->certificate }}">
                                        <div class="input-group-append">
                                            <button class="button-image btn btn-primary" type="button"
                                                    id="button-image">انتخاب
                                            </button>
                                        </div>
                                    </div>

                                    @if(!empty(auth()->user()->details->certificate))
                                        <div class="img_certif">
                                            <img src="{{ Storage::url(auth()->user()->details->certificate) }}" alt="">
                                        </div>
                                    @endif


                                    <small class="form-text text-muted"> تصویر گواهینامه رسمی را وارد کنید</small>
                                </div>
                            @endif


                            @if(\App\Utility\Acl::isManager(auth()->id()))
                            @can('panel.change.status')
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ __('site.status_change') }}
                                    </h5>


                                    <x-form.utility name="status" namefa="{{ __('site.status') }}"
                                    :items="\App\Utility\Status::items()" type="دسته بندی"
                                    require="0" multiple="0"></x-form.utility>




                                </div>
                            </div>
                            @endcan
                            @endif



                            <button type="submit" class="btn btn-primary">آپلود و بروزرسانی مدارک</button>
                        </form>

                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <script>
        var purpose;
        $(document).on('click', '.button-image', function () {
            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            purpose = $(this);
        });

        // set file link
        function fmSetLink($url) {
            purpose.parent().parent().find('.image_label').val($url);
        }

    </script>
@endsection
