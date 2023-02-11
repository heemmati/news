@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">


                                <h6>
                                                                        برای وارد کردن قیمت ها بصورت اکسل ، بتدا فایل اکسل آن را دانلود کنید، سپس فقط قیمت ها را تغییر بدهید
                                </h6>
                                <div class="row">

                                    <div class="col-6">
                                        <a class="btn btn-primary" href="{{ route('export.abstract.excel') }}">
                                            <i class="far fa-download"></i>
                                            خروجی همه محصولات موجود در سایت
                                        </a>


                                    </div>

                                    <div class="col-12">
                                        <form action="{{ route('import.abstract.excel') }}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">آپلود لیست محصولات</label>
                                                <input type="file" name="abstracts" >
                                            </div>


                                            <button type="submit" class="btn btn-danger">
                                                <i class="far fa-upload"></i>
                                            آپلود لیست محصولات
                                            </button>

                                        </form>
                                    </div>
                                </div>

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


