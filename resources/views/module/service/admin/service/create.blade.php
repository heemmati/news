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
                        <a href="">ایجاد خدمات جدید</a>
                    </li>
                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">ایجاد خدمات جدید</h6>


                        <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
                            @csrf

                            @include('error.forms')

                            <div class="row">
                                <div class="col-12 col-md-6">


                                    {{--Title--}}
                                    <div class="form-group">
                                        @error('title')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">عنوان خدمات را وارد کنید</label>
                                        <input type="text" name="title" class="form-control"
                                               placeholder="عنوان خدمات را وارد کنید"
                                               required>
                                        <small class="counter_small"></small>

                                    </div>

                                    <div class="form-group">
                                        @error('manager_name')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">نام مدیر بخش را وارد کنید</label>
                                        <input type="text" name="manager_name" class="form-control"
                                               placeholder="نام مدیر بخش را وارد کنید"
                                               >
                                        <small class="counter_small"></small>

                                    </div>


                                    <div class="form-group">
                                        @error('internal_phone')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">تلفن داخلی بخش را وارد کنید</label>
                                        <input type="text" name="internal_phone" class="form-control"
                                               placeholder="تلفن داخلی بخش را وارد کنید"
                                        >
                                        <small class="counter_small"></small>

                                    </div>




                                    <div class="form-group">

                                        @error('categories')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">پدر خدمات را وارد کنید </label>
                                        @if(isset($services) && !empty($services))
                                            <select name="parent_id" id="" class="form-control select_js"                                                    required>
                                                <option value="0">
                                                    مادر
                                                </option>
                                                @foreach($services as $service)
                                                    <option value="{{ $service->id }}">
                                                        {{ $service->title }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        @else
                                            <p class="alert alert-warning">
                                                ابتدا دسته بندی برای خدمات وارد کنید!
                                            </p>
                                        @endif
                                    </div>


                                </div>

                                <div class="col-12 col-md-6">
                                    {{--En title--}}
                                    <div class="form-group">
                                        @error('entitle')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">عنوان انگلیسی خدمات را وارد کنید</label>
                                        <input type="text" name="entitle" class="form-control"
                                               placeholder="عنوان انگلیسی خدمات را وارد کنید"
                                               required>
                                        <small class="counter_small"></small>

                                    </div>


                                    <div class="form-group">
                                        @error('email')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">ایمیل بخش را وارد کنید</label>
                                        <input type="text" name="email" class="form-control"
                                               placeholder="ایمیل بخش را وارد کنید"
                                        >
                                        <small class="counter_small"></small>

                                    </div>


                                    <x-form.tag></x-form.tag>

                                    {{-- Description --}}
                                    <div class="form-group">
                                        @error('description')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for=""> توضیحات کوتاه خدمات را وارد کنید </label>

                                        <textarea class="form-control"
                                                  name="description"
                                                  id="" cols="30" rows="10"
                                                  placeholder="توضیحات کوتاه خدمات را وارد کنید"></textarea>
                                        <small class="counter_small"></small>
                                    </div>


                                </div>
                            </div>


                            {{-- Body --}}
                            <div class="form-group">
                                @error('body')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for=""> متن کامل خدمات را وارد کنید </label>

                                <textarea class="form-control body"

                                          name="body"
                                          id="" cols="30" rows="10"
                                          placeholder="متن کامل خدمات را وارد کنید"></textarea>
                                <small class="counter_small"></small>
                            </div>



                            <div class="form-group">

                                @error('positions')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for=""> جایگاه های خدمات را انتخاب کنید </label>
                                @if(isset($positions) && !empty($positions))
                                    <select name="positions[]" class="form-control select_js" id="" multiple>
                                        @foreach($positions as $position)
                                            <option value="{{ $position->id }}">
                                                {{ $position->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                @else
                                    <p class="alert alert-warning">
                                        ابتدا در قسمت تنظیمات ، جایگاه برای خدمات وارد کنید
                                    </p>
                                @endif

                            </div>

                            <x-form.filemanager.filemanager></x-form.filemanager.filemanager>

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




                            <button type="submit" class="btn btn-primary">ایجاد خدمات جدید</button>
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
