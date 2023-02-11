@extends ('admin.layout.master')


@section('content')
    <div class="content">
        @include('admin.library.breadcrumb')
        <div class="row">
            <div class="col-md-12">
                @include('admin.library.form')
            </div>
        </div>


    </div>
@endsection

@section('scripts')

    <script src="{{ url('admin-theme') }}/assets/js/ckeditor/ckeditor.js"></script>
{{--    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>--}}
    <script>
        $("input.tagsinput-example").tagsinput('items');

            @foreach($inputs as $key => $input)
            @if(isset($input[3]) && !empty($input[3]) && is_array($input[3]))

        var item_id = $('select[name="{{ $input[3][0] }}"]').val();
        var model = 'Modules\\Address\\Entities\\' + '{{$input[3][1]}}';
        get_ajax(item_id, '{{ $key }}', model, '{{$input[3][0]}}', '{{$input[1]}}');

        $(document).on('change', 'select[name="{{ $input[3][0] }}"]', function () {
            var item_id = $('select[name="{{ $input[3][0] }}"]').val();
            var model = 'Modules\\Address\\Entities\\' + '{{$input[3][1]}}';
            get_ajax(item_id, '{{ $key }}', model, '{{$input[3][0]}}', '{{$input[1]}}');
        });

        function get_ajax(item_id, name, model, goal_id, type) {
            $.ajax({
                type: 'POST',
                url: "{{route('panel.'.$route_name.'.get_ajax')}}",
                data: {
                    "id": item_id,
                    "model": model,
                    "goal_id": goal_id,
                    "type": type,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    $('select[name="' + name + '"]').html(data.html);
                }
            });


        }

        @endif

        @endforeach



        CKEDITOR.replace('body', {
            contentsLangDirection: 'rtl',
            filebrowserUploadMethod: 'form' ,

            filebrowserUploadUrl : "{{ route('admin.panel.uploadimage' , ['_token' => csrf_token() ]) }}",
            filebrowserImageUploadUrl : "{{ route('admin.panel.uploadimage' , ['_token' => csrf_token() ]) }}",
        });


        /* Image File Manager */
        var purpose;
        $(document).on('click', '.button-image', function () {
            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            purpose = $(this);
        });

        // set file link
        function fmSetLink($url) {
            purpose.parent().parent().find('.image_label').val($url);
        }

        /* Image File Manager */

        /* Gallery Adding */
        $(document).on('click', '.gallery-add', function () {
            var parent = $(this).parent().parent();
            var grand_parent = parent.parent();
            var html = parent[0].outerHTML;

            grand_parent.append(html);


        });

        /* Gallery Removing*/

        $(document).on('click', '.gallery-remove', function () {
            var parent = $(this).parent().parent();
            var grand_parent = parent.parent();
            parent.remove();


        });

        var cat_counter = $('#category_input > div').length;

        function get_children_cat(parent , counter , elem) {
            $.ajax({
                type: 'POST',
                url: "{{route('category.children.get')}}",
                data: {
                    "parent": parent,
                    "counter": counter,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {

                    if(data.html == null){

                        $('#category_value').val(data.parent);
                        $('.choose_cat').removeClass('choose_cat');
                        elem.addClass('choose_cat');
                    }
                    else{
                        cat_counter = counter ;
                        $('#category_input').append(data.html);
                    }

                }
            });


        }


        $(document).on('click' ,'.category_box li a' , function () {
            var parent = $(this).data('parent');
            var counter = $(this).data('counter');

            cat_counter ++;

            for( var i = counter + 1 ; i < cat_counter; i++){

                $('#category'+i).remove();
            }

            get_children_cat(parent , counter + 1 , $(this) );
        });


    </script>
    <script>

        {{--function get_sub_children(model, helper) {--}}
        {{--    $.ajax({--}}
        {{--        type: 'POST',--}}
        {{--        url: "{{route('panel.generalitems.get_sub_children')}}",--}}
        {{--        data: {--}}
        {{--            "class": model,--}}
        {{--            "helper": helper,--}}
        {{--            "_token": "{{ csrf_token() }}",--}}
        {{--        },--}}
        {{--        success: function (data) {--}}
        {{--            console.log(data);--}}
        {{--        }--}}
        {{--    });--}}


        {{--}--}}


        $(document).on('click', '.add-item', function () {
            let route = $(this).data('route');
            let helper = $(this).data('helper');
            get_sub_children(route, helper);
        });


        var map = L.map('mapid', {
            center: [35.6881932,51.39287],
            zoom: 13 ,
            doubleClickZoom : true ,
        });

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiaGVlbW1hdGkiLCJhIjoiY2tidjQ1aWN1MDJkYzJ3dGI5YzhpZ3ZjdiJ9.sh34Ce17akhCN5aDKXPV5Q', {
            attribution: '@lang('site.site_name')',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiaGVlbW1hdGkiLCJhIjoiY2tidjQ1aWN1MDJkYzJ3dGI5YzhpZ3ZjdiJ9.sh34Ce17akhCN5aDKXPV5Q'
        }).addTo(map);

        var marker = L.marker([35.6881932,51.39287]).addTo(map);

        function onMapClick(e) {
            lat = e.latlng.lat;
            lon = e.latlng.lng;

           $('#long').val(lon);
           $('#lat').val(lat);
            //Clear existing marker,

            if (marker != undefined) {
                map.removeLayer(marker);
            };

            //Add a marker to show where you clicked.
            marker = L.marker([lat,lon]).addTo(map);
        }

        map.on('click', onMapClick);


    </script>
@endsection


