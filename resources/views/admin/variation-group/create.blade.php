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
                        <a href="{{ route('variationgroups.create') }}">ایجاد تنوع جدید</a>
                    </li>

                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">ایجاد تنوع جدید</h6>
                        <form method="POST" action="{{ route('variationgroups.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('admin.forms.text' , ['input' => 'text' , 'type' => 'تنوع' , 'field' => 'title' , 'fieldFa' => 'عنوان' , 'important' => '1'])
                            @include('admin.forms.text' , ['input' => 'text' , 'type' => 'تنوع' , 'field' => 'entitle' , 'fieldFa' => 'عنوان انگلیسی'])
                            @include('admin.forms.select' , [ 'type' => 'تنوع' , 'field' => 'category_id' , 'fieldFa' => 'دسته بندی' , 'important' => '1' , 'items' => $categories])

                            @include('admin.forms.select' , [ 'type' => 'تنوع' , 'field' => 'lang' , 'fieldFa' => 'زبان' , 'important' => '1' , 'utils' => \App\Utility\Lang::languages()])
                            @include('admin.forms.variations')



                            <button type="submit" class="btn btn-primary">ایجاد تنوع جدید</button>
                        </form>

                    </div>
                </div>



            </div>
        </div>


    </div>
@endsection
@section('scripts')
    <script>
        var i = 0;
        $(document).on('click' ,'.add-value',function () {
            $(this).parent().append('<div class="var-value-item">\n' +
                '            <div class="form-group">\n' +
                '    \n' +
                '    <label> عنوان  مقدار\n' +
                '                    <small class="text-danger">*</small>\n' +
                '            </label>\n' +
                '    <input type="text" name="value-title['+i+'][]" class="form-control" placeholder="عنوان  مقدار را وارد کنید">\n' +
                '    <small class="form-text text-muted">عنوان  مقدار را در اینجا وارد\n' +
                '        کنید</small>\n' +
                '</div>\n' +
                '            <div class="form-group">\n' +
                '    \n' +
                '    <label> عنوان انگلیسی  مقدار\n' +
                '            </label>\n' +
                '    <input type="text" name="value-entitle['+i+'][]" class="form-control" placeholder="عنوان انگلیسی  مقدار را وارد کنید">\n' +
                '    <small class="form-text text-muted">عنوان انگلیسی  مقدار را در اینجا وارد\n' +
                '        کنید</small>\n' +
                '</div>\n' +
                '            <div class="form-group">\n' +
                '    \n' +
                '    <label> رنگ  مقدار\n' +
                '            </label>\n' +
                '    <img style="min-width:16px;min-height:16px;box-sizing:unset;box-shadow:none;background:unset;padding:0 6px 0 0;cursor:pointer;" src="chrome-extension://ohcpnigalekghcmgcdcenkpelffpdolg/img/icon16.png" title="Select with ColorPick Eyedropper - See advanced option: &quot;Add ColorPick Eyedropper near input[type=color] fields on websites&quot;" class="colorpick-eyedropper-input-trigger"><input type="color" name="value-color['+i+'][]" class="form-control" placeholder="رنگ  مقدار را وارد کنید" colorpick-eyedropper-active="true">\n' +
                '    <small class="form-text text-muted">رنگ  مقدار را در اینجا وارد\n' +
                '        کنید</small>\n' +
                '</div>\n' +
                '            <a href="javascript:void(0)" class="btn btn-danger remove-value"><svg class="svg-inline--fa fa-minus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="minus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg><!-- <i class="fa fa-minus"></i> --></a>\n' +
                '            <hr>\n' +
                '        </div>');
        });
        $('.add-var').click(function () {
            i++;
            $(this).parent().append('<div class="row var-item">\n' +
                '\n' +
                '    <div class="col-6">\n' +
                '        <h5 class="text-right">تنوع را وارد کنید :</h5>\n' +
                '\n' +
                '        <div class="form-group">\n' +
                '    \n' +
                '    <label> عنوان  تنوع\n' +
                '                    <small class="text-danger">*</small>\n' +
                '            </label>\n' +
                '    <input type="text" name="var-title['+i+']" class="form-control" placeholder="عنوان  تنوع را وارد کنید">\n' +
                '    <small class="form-text text-muted">عنوان  تنوع را در اینجا وارد\n' +
                '        کنید</small>\n' +
                '</div>\n' +
                '        <div class="form-group">\n' +
                '    \n' +
                '    <label> عنوان انگلیسی  تنوع\n' +
                '            </label>\n' +
                '    <input type="text" name="var-entitle['+i+']" class="form-control" placeholder="عنوان انگلیسی  تنوع را وارد کنید">\n' +
                '    <small class="form-text text-muted">عنوان انگلیسی  تنوع را در اینجا وارد\n' +
                '        کنید</small>\n' +
                '</div>\n' +
                '        <div class="form-group">\n' +
                '    \n' +
                '    <label> توضیحات تنوع\n' +
                '            </label>\n' +
                '    <textarea name="var-description['+i+']" id="" class="form-control" cols="30" rows="5"></textarea>\n' +
                '    <small class="form-text text-muted">توضیحات تنوع را در اینجا وارد\n' +
                '        کنید</small>\n' +
                '</div>\n' +
                '        <div class="form-group">\n' +
                '    \n' +
                '    <label> آیکون  تنوع\n' +
                '            </label>\n' +
                '    <input type="text" name="var-icon['+i+']" class="form-control" placeholder="آیکون  تنوع را وارد کنید">\n' +
                '    <small class="form-text text-muted">آیکون  تنوع را در اینجا وارد\n' +
                '        کنید</small>\n' +
                '</div>\n' +
                '        <a href="javascript:void(0)" class="btn btn-danger remove-value"><svg class="svg-inline--fa fa-minus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="minus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg><!-- <i class="fa fa-minus"></i> --></a>\n' +
                '    </div>\n' +
                '    <div class="col-6 var-value-box">\n' +
                '        <h5 class="text-right">مقادیر برای این تنوع :</h5>\n' +
                '        <a class="btn btn-success add-value" href="javascript:void(0)">اضافه کردن یک مقدار جدید</a>\n' +
                '        <br>\n' +
                '        <div class="var-value-item">\n' +
                '            <div class="form-group">\n' +
                '    \n' +
                '    <label> عنوان  مقدار\n' +
                '                    <small class="text-danger">*</small>\n' +
                '            </label>\n' +
                '    <input type="text" name="value-title['+i+'][]" class="form-control" placeholder="عنوان  مقدار را وارد کنید">\n' +
                '    <small class="form-text text-muted">عنوان  مقدار را در اینجا وارد\n' +
                '        کنید</small>\n' +
                '</div>\n' +
                '            <div class="form-group">\n' +
                '    \n' +
                '    <label> عنوان انگلیسی  مقدار\n' +
                '            </label>\n' +
                '    <input type="text" name="value-entitle['+i+'][]" class="form-control" placeholder="عنوان انگلیسی  مقدار را وارد کنید">\n' +
                '    <small class="form-text text-muted">عنوان انگلیسی  مقدار را در اینجا وارد\n' +
                '        کنید</small>\n' +
                '</div>\n' +
                '            <div class="form-group">\n' +
                '    \n' +
                '    <label> رنگ  مقدار\n' +
                '            </label>\n' +
                '    <img style="min-width:16px;min-height:16px;box-sizing:unset;box-shadow:none;background:unset;padding:0 6px 0 0;cursor:pointer;" src="chrome-extension://ohcpnigalekghcmgcdcenkpelffpdolg/img/icon16.png" title="Select with ColorPick Eyedropper - See advanced option: &quot;Add ColorPick Eyedropper near input[type=color] fields on websites&quot;" class="colorpick-eyedropper-input-trigger"><input type="color" name="value-color['+i+'][]" class="form-control" placeholder="رنگ  مقدار را وارد کنید" colorpick-eyedropper-active="true">\n' +
                '    <small class="form-text text-muted">رنگ  مقدار را در اینجا وارد\n' +
                '        کنید</small>\n' +
                '</div>\n' +
                '            <a href="javascript:void(0)" class="btn btn-danger remove-value"><svg class="svg-inline--fa fa-minus fa-w-14" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="minus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg><!-- <i class="fa fa-minus"></i> --></a>\n' +
                '            <hr>\n' +
                '        </div>\n' +
                '\n' +
                '\n' +
                '\n' +
                '    </div>\n' +
                '    <hr>\n' +
                '</div>');
        });
    </script>

@endsection

