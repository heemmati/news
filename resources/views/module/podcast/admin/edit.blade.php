@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">@lang('site.dashboard')</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href=""> @lang('site.podcasts_management') </a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('site.podcast_update')</h6>


                        <form method="POST" action="{{ route('podcasts.update' , $podcast->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            @include('error.forms')

                            {{-- Title --}}
                            <x-form.text require="1" type="{{ __('site.podcasts_singular') }}" name="title" namefa="عنوان" :value="$podcast->title"></x-form.text>


                            {{-- Title --}}
                            <x-form.text require="1" type="{{ __('site.podcasts_singular') }}" name="entitle" namefa="عنوان انگلیسی" :value="$podcast->entitle"></x-form.text>




                            {{-- Alt --}}
                            <x-form.text require="1" type="{{ __('site.podcasts_singular') }}" name="alt" namefa="نوشته جایگزین" :value="$podcast->alt"></x-form.text>


                        <div class="podcast_single_show">
                            <audio title="{{ $podcast->title }}" controls>
                                <source src="{{ \Illuminate\Support\Facades\Storage::url($podcast->src) }}">
                                {{ $podcast->alt }}
                            </audio>

                        </div>

                            <button type="submit" class="btn btn-primary">@lang('site.podcast_update') </button>
                        </form>

                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <script>
        $("input.tagsinput-example").tagsinput('items');


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


    <script>
        function getStates(country_id) {

            $.ajax({
                type: 'POST',
                url: "{{route('auth.register.state')}}",
                data: {
                    "id": country_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    $('#state_id').html(data.html);
                }
            });
        }

        function getCity(state_id) {

            $.ajax({
                type: 'POST',
                url: "{{route('auth.register.city')}}",
                data: {
                    "id": state_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    $('#city_id').html(data.html);
                }
            });
        }

        $(document).on('change', '#country_id', function () {

            getStates($(this).val());

        });

        $(document).ready(function () {

            getStates($('#country_id').val());
            getCity($('#state_id').val());


        });


        $(document).on('change', '#state_id', function () {

            getCity($(this).val());

        });


        var map = L.map('mapid', {
            center: [35.6881932, 51.39287],
            zoom: 13,
            doubleClickZoom: true,
        });

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiaGVlbW1hdGkiLCJhIjoiY2tidjQ1aWN1MDJkYzJ3dGI5YzhpZ3ZjdiJ9.sh34Ce17akhCN5aDKXPV5Q', {
            attribution: 'دیجی آفاق',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiaGVlbW1hdGkiLCJhIjoiY2tidjQ1aWN1MDJkYzJ3dGI5YzhpZ3ZjdiJ9.sh34Ce17akhCN5aDKXPV5Q'
        }).addTo(map);

        var marker = L.marker([35.6881932, 51.39287]).addTo(map);

        function onMapClick(e) {
            lat = e.latlng.lat;
            lon = e.latlng.lng;

            $('#long').val(lon);
            $('#lat').val(lat);
            //Clear existing marker,

            if (marker != undefined) {
                map.removeLayer(marker);
            }
            ;

            //Add a marker to show where you clicked.
            marker = L.marker([lat, lon]).addTo(map);
        }

        map.on('click', onMapClick);


    </script>


    <script>
        $(document).on('change', '#person_select', function () {
            var type = $(this).val();
            if (type == {{ \App\Utility\Acl::REAL }}) {
                $('#real_inputs').show();
                $('#legal_inputs').hide();

            } else {
                $('#real_inputs').hide();
                $('#legal_inputs').show();
            }
        })


    </script>
@endsection
