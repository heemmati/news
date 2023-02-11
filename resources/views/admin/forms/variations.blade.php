<div class="var-box">
    <h6>برای این گروه تنوع اضافه کنید!</h6>
    <a class="btn btn-success add-var" href="javascript:void(0)">اضافه کردن یک تنوع جدید</a>
    <br>
    <div class="row var-item">

        <div class="col-6">
            <h5 class="text-right">تنوع را وارد کنید :</h5>

            @include('admin.forms.text' , ['input' => 'text' , 'type' => ' تنوع' , 'field' => 'var-title[0]' , 'fieldFa' => 'عنوان' , 'important' => '1'])
            @include('admin.forms.text' , ['input' => 'text' , 'type' => ' تنوع' , 'field' => 'var-entitle[0]' , 'fieldFa' => 'عنوان انگلیسی'])
            @include('admin.forms.textarea' , ['type' => 'تنوع' , 'field' => 'var-description[0]' , 'fieldFa' => 'توضیحات'])
            @include('admin.forms.text' , ['input' => 'text' , 'type' => ' تنوع' , 'field' => 'var-icon[0]' , 'fieldFa' => 'آیکون' ])
            <a href="javascript:void(0)" class="btn btn-danger remove-value"><i class="fa fa-minus"></i></a>
        </div>
        <div class="col-6 var-value-box">
            <h5 class="text-right">مقادیر برای این تنوع :</h5>
            <a class="btn btn-success add-value" href="javascript:void(0)">اضافه کردن یک مقدار جدید</a>
            <br>
            <div class="var-value-item">
                @include('admin.forms.text' , ['input' => 'text' , 'type' => ' مقدار' , 'field' => 'value-title[0][]' , 'fieldFa' => 'عنوان' , 'important' => '1'])
                @include('admin.forms.text' , ['input' => 'text' , 'type' => ' مقدار' , 'field' => 'value-entitle[0][]' , 'fieldFa' => 'عنوان انگلیسی'])
                @include('admin.forms.text' , ['input' => 'color' , 'type' => ' مقدار' , 'field' => 'value-color[0][]' , 'fieldFa' => 'رنگ'])
                <a href="javascript:void(0)" class="btn btn-danger remove-value"><i class="fa fa-minus"></i></a>
                <hr>
            </div>



        </div>
        <hr>
    </div>




</div>





