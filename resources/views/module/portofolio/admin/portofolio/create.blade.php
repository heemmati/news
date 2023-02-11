@extends ('admin.layout.master2')


@section('content')


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('admin.portofolios_store')</h6>


                        <form method="POST" action="{{ route('portofolios.store') }}" enctype="multipart/form-data">
                            @csrf

                            @include('error.forms')

                            <div class="row">
                                <div class="col-12 col-md-6">

                                    <x-form.text name="title" namefa="عنوان" type="نمونه کار" require="1"></x-form.text>

                                    <x-form.text name="link" namefa="لینک خارجی" type="نمونه کار" require="0"></x-form.text>
                                    <x-form.select name="categories" namefa="دسته بندی" :items="$categories" type="نمونه کار" require="0" multiple="1"></x-form.select>


                                </div>

                                <div class="col-12 col-md-6">

                                    <x-form.text name="entitle" namefa="عنوان انگلیسی" type="نمونه کار" require="0"></x-form.text>


                                    <x-form.tag></x-form.tag>

                                    <x-form.textarea name="description" namefa="توضیحات کوتاه" type="مقاله" require="0"></x-form.textarea>



                                </div>


                            </div>


                            <x-form.textarea name="body" namefa="متن کامل" type="مقاله" require="0"></x-form.textarea>


                            <x-form.select name="positions" namefa="جایگاه ها" :items="$positions" type="نمونه کار" require="0" multiple="1"></x-form.select>

                            <x-form.select name="technologies" namefa="تکنولوژی های بکار رفته" :items="$technologies" type="نمونه کار" require="0" multiple="1"></x-form.select>

                            <x-form.select name="cases" namefa="موارد طراحی" :items="$cases" type="نمونه کار" require="0" multiple="1"></x-form.select>


                            <hr>
                            <h5>اطلاعات تکمیلی نمونه کار</h5>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <x-form.text name="length" namefa="طول مدت انجام" type="نمونه کار" require="0"></x-form.text>


                                </div>

                                <div class="col-12 col-md-4">

                                    <x-form.text name="customer_name" namefa="نام کارفرما" type="نمونه کار" require="0"></x-form.text>



                                </div>


                                <div class="col-12 col-md-4">

                                    <x-form.text name="customer_mobile" namefa="راه ارتباطی با کارفرما" type="نمونه کار" require="0"></x-form.text>


                                </div>

                                <div class="col-12 col-md-12">

                                    <x-form.textarea name="customer_comment" namefa="دیدگاه کارفرما درباره سیستم طراحی شده" type="مقاله" require="0"></x-form.textarea>


                                </div>

                                <div class="col-12 col-md-4">
                                    <x-form.text name="customer_rate" kind="number" namefa="امتیاز کارفرما به سایت از 5" type="نمونه کار" require="0"></x-form.text>


                                </div>

                                <div class="col-12 col-md-4">

                                    <x-form.text name="done_date" kind="date" namefa="تاریخ اتمام" type="نمونه کار" require="0"></x-form.text>

                                </div>

                                <div class="col-12 col-md-4">

                                    <x-form.text name="workerCount" kind="number" namefa="تعداد نیروی کار" type="نمونه کار" require="0"></x-form.text>


                                </div>


                            </div>
                            <hr>



                            <x-form.filemanager.filemanager></x-form.filemanager.filemanager>

                            <div class="row">
                                <div class="col-12 col-md-12">

                                    <x-form.text name="created_at" kind="date" namefa="تاریخ انتشار" type="نمونه کار" require="0"></x-form.text>


                                </div>
                            </div>


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




                            <button type="submit" class="btn btn-primary">ایجاد نمونه کار جدید</button>
                        </form>

                    </div>
                </div>



@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
