\<script src="{{ Url('admin-theme') }}/vendors/bundle.js"></script>
<!-- Plugin scripts -->
<script src="{{ Url('admin-theme') }}/vendors/charts/morsis/morris.min.js"></script>
<script src="{{ Url('admin-theme') }}/assets/js/examples/charts/morsis.js"></script>



<!-- Apex chart -->
<script src="{{ Url('admin-theme') }}/assets/js/irregular-data-series.js"></script>
<script src="{{ Url('admin-theme') }}/vendors/charts/apex/apexcharts.min.js"></script>

<!-- Daterangepicker -->
<script src="{{ Url('admin-theme') }}/vendors/datepicker/daterangepicker.js"></script>

<!-- DataTable -->
<script src="{{ Url('admin-theme') }}/vendors/dataTable/datatables.min.js"></script>

<!-- Dashboard scripts -->
<script src="{{ Url('admin-theme') }}/assets/js/examples/dashboard.js"></script>

<script src="{{ Url('admin-theme') }}/vendors/slick/slick.min.js"></script>
<script src="{{ Url('admin-theme') }}/assets/js/examples/pages/product-detail.js"></script>
<script src="{{ Url('admin-theme') }}/vendors/vmap/jquery.vmap.min.js"></script>
<script src="{{ Url('admin-theme') }}/vendors/vmap/maps/jquery.vmap.usa.js"></script>
<script src="{{ Url('admin-theme') }}/assets/js/examples/vmap.js"></script>
<script src="{{ Url('admin-theme') }}/vendors/select2/js/select2.min.js"></script>
{{--<script src="{{ Url('admin-theme') }}/assets/js/examples/charts/apex.js"></script>--}}
{{--<!-- Style -->--}}


<!-- Javascript -->
<script src="{{ Url('admin-theme') }}/vendors/tagsinput/bootstrap-tagsinput.js"></script>


<script src="{{ Url('admin-theme') }}/assets/js/examples/pages/ecommerce-dashboard.js"></script>



<!-- App scripts -->
<script src="{{ Url('admin-theme') }}/vendors/charts/morsis/raphael-2.1.4.min.js"></script>


<script src="{{ Url('admin-theme') }}/assets/js/app.min.js"></script>
<script src="{{ Url('admin-theme') }}/assets/js/all.min.js"></script>
<script src="{{ Url('admin-theme') }}/vendors/dataTable/datatables.min.js"></script>
<script src="{{ Url('admin-theme') }}/assets/js/examples/datatable.js"></script>
<script src="{{ Url('admin-theme') }}/assets/js/examples/sweet-alert.js"></script>
<script src="{{ Url('admin-theme') }}/vendors/form-wizard/jquery.steps.min.js"></script>

<script src="{{ Url('admin-theme') }}/vendors/prism/prism.js"></script>
{{--<script src="{{ url('vendor/file-manager/js/file-manager.js') }}"></script>--}}
<script src="{{ Url('admin-theme') }}/assets/js/leaflet.js"></script>

<script src="{{ Url('admin-theme') }}/assets/js/hemmat.js"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ url('admin-theme') }}/assets/js/ckeditor/ckeditor.js"></script>
<script src="{{ url('admin-theme') }}/assets/js/kamadatepicker.min.js"></script>
<script src="{{ url('admin-theme') }}/assets/js/kamadatepicker.holidays.js"></script>
<script src="{{ url('admin-theme') }}/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script>

    CKEDITOR.replace('body', {
        contentsLangDirection: 'rtl',
        filebrowserUploadMethod: 'form' ,

        filebrowserUploadUrl : "{{ route('admin.panel.uploadimage' , ['_token' => csrf_token() ]) }}",
        filebrowserImageUploadUrl : "{{ route('admin.panel.uploadimage' , ['_token' => csrf_token() ]) }}",
    });


    $(document).ready(function() {
        $('.select_js').select2();
        let target_link = $(".navigation-menu-body a[href$='{{ url()->current() }}']");
        target_link.addClass('active');
        let opened_nav = target_link.closest('.navigation-menu-group > div');
        opened_nav.addClass('open');
        let  opened_nav_id = opened_nav.attr('id');
        $(".navigation-menu-tab").find('a').removeClass('active');
        $(".navigation-menu-tab").find("a[data-nav-target='#"+opened_nav_id+"']").addClass('active');
        target_link.closest('ul').show();
        $('.form-control').keydown(function () {
            var html = $(this).val().length + ' حرف ';
            $(this).siblings('small').html(html);
        });
    });



    $(document).on('click', '.admin_cart > a', function () {


        var smallBox = $('.admin_cart');
        var dropDown = smallBox.find('.small__basket');

        dropDown.slideToggle(300);
    });

    $('.faq-toggler').click(function (){

        let target = $(this).parent().find('.question-content');
        target.slideToggle();

    });







    $(document).on('click' , '#image_button' , function () {
        let image = {
            imageInput : '#input_image' ,
            showImage : '#showing_image' ,

        };

        let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
        width=500px,height=500px,left=-1000,top=-1000`;
        let filemanager = window.open('{{ route('image.filemanager') }}' , null , params);

        filemanager.image = image;
    });




    $(document).on('click' , '#image_button' , function () {
        let image = {
            imageInput : '#input_image' ,
            showImage : '#showing_image' ,

        };

        let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
        width=500px,height=500px,left=-1000,top=-1000`;
        let filemanager = window.open('{{ route('image.filemanager') }}' , null , params);

        filemanager.image = image;
    });


    $(document).on('click' , '#file_button' , function () {
        let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
        width=500px,height=500px,left=-1000,top=-1000`;
        filemanager = window.open('{{ route('file.filemanager') }}' , null , params);
    });




    $('#gallery_button').click(function () {


        let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
        width=500px,height=500px,left=-1000,top=-1000`;
        filemanager = window.open('{{ route('gallery.filemanager') }}' , null , params);


    });




    $('#icon_button').click(function () {


        let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
        width=500px,height=500px,left=-1000,top=-1000`;
        filemanager = window.open('{{ route('icon.filemanager') }}' , null , params);


    });




    $('#video_button').click(function () {


        let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
        width=500px,height=500px,left=-1000,top=-1000`;
        filemanager = window.open('{{ route('video.filemanager') }}' , null , params);


    });




    $('#podcast_button').click(function () {


        let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
        width=500px,height=500px,left=-1000,top=-1000`;
        filemanager = window.open('{{ route('podcast.filemanager') }}' , null , params);


    });

    $('#img_lfm').filemanager('image');

    remove_choosed_image('#remove_default_image' , '#showing_image' , '#input_image');
    remove_choosed_file('#remove_default_video' , '#showing_video_name' , '#input_video');
    remove_choosed_file('#remove_default_podcast' , '#showing_podcast_name' , '#input_podcast');
    remove_choosed_file('#remove_default_icon' , '#showing_icon_name' , '#input_icon');
    remove_choosed_file('#remove_default_gallery' , '#showing_gallery_name' , '#input_gallery');
    remove_choosed_file('#remove_default_file' , '#showing_file_name' , '#input_file');

    $('a.admin_cart_a').click(function () {
        let small = $(this).parent().find('.small__basket');
        small.toggle();

    })

</script>




@include('sweetalert::alert');

@yield('extera_js')

@yield('scripts')


</body>


</html>
