@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title"> برای ایجاد یک محصول جدید مراحل زیر را کامل پر کنید</h6>
                                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="product-categories">
                                        @include('admin.forms.select' , [ 'type' => 'محصول' , 'field' => 'category_id' , 'fieldFa' => 'دسته بندی' , 'important' => '1' , 'items' => $categories])
                                    </div>
                                    <div class="product-brands">
                                        @include('admin.forms.select' , [ 'type' => 'محصول' , 'field' => 'brand_id' , 'fieldFa' => 'برند' , 'important' => '1'] )
                                    </div>


                                    <div class="row">
                                        <div class="col-12 col-6">
                                            @include('admin.forms.text' , ['input' => 'text' , 'type' => 'محصول' , 'field' => 'title' , 'fieldFa' => 'عنوان' , 'important' => '1'])

                                        </div>
                                        <div class="col-12 col-6">
                                            @include('admin.forms.text' , ['input' => 'text' , 'type' => 'محصول' , 'field' => 'entitle' , 'fieldFa' => 'عنوان انگلیسی'])

                                        </div>
                                    </div>
                                    @include('admin.forms.select' , [ 'type' => 'محصول' , 'field' => 'lang' , 'fieldFa' => 'زبان' , 'important' => '1' , 'utils' => \App\Utility\Lang::languages()])
                                    @include('admin.forms.textarea' , ['type' => 'محصول' , 'field' => 'description' , 'fieldFa' => 'توضیحات'])
                                    @include('admin.forms.textarea' , ['type' => 'محصول' , 'field' => 'body' , 'fieldFa' => 'بدنه'])


                                   <div class="attribtue_ajax">

                                    </div>

                                    @include('admin.forms.image' , [ 'type' => 'محصول'   , 'field' => 'image' , 'fieldFa' =>  'تصویر'  , 'important' => '1'])




                                    <button type="submit">ایجاد محصول</button>
                                </form>


                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>



@endsection

@section('scripts')
    <script src="{{ url('admin-theme') }}/assets/js/ckeditor/ckeditor.js"></script>
    <script>
        function getBrand(category_id){

            $.ajax({
                type: 'POST',
                url: "{{route('panel.products.brand')}}",
                data: {
                    "id": category_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                   $('.product-brands select').html(data.html);
                }
            });
        }
        function getAttr(category_id){

            $.ajax({
                type: 'POST',
                url: "{{route('panel.products.attr')}}",
                data: {
                    "id": category_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    $('.attribtue_ajax').html(data.html);
                }
            });
        }
        $(document).on('change' , '.product-categories select' , function () {

            getBrand($(this).val());
            getAttr($(this).val());

        });

        CKEDITOR.replace('body', {
            contentsLangDirection: 'rtl',

        });


        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }

    </script>
@endsection


