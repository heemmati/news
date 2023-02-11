@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">@lang('site.create_many_setting')</h6>
            <form method="POST" action="{{ route('general-items.bunch.store') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <x-form.select type="{{ __('site.general_item__singular') }}" name="general_id" namefa="{{ __('site.general_group') }} " require="1"
                               :items="$generals"></x-form.select>


                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('site.general_items_title')</th>
                        <th>@lang('site.general_items_code')</th>
                        <th>@lang('site.general_items_input')</th>
                    </tr>

                    </thead>

                    <tbody>
                    @for($i = 0 ; $i <= 50 ; $i ++)
                        <tr>
                            <td>
                               {{ $i + 1  }}
                            </td>
                            <td>
                                <x-form.text type="{{ __('site.general_item__singular') }}" name="title[]" namefa="{{ __('site.title') }}" require="0"></x-form.text>
                            </td>
                            <td>
                                <x-form.text type="{{ __('site.general_item__singular') }}" name="code[]" namefa="{{ __('site.code') }}" require="0"></x-form.text>
                            </td>

                            <td>
                                <x-form.utility type="{{ __('site.general_item__singular') }}" name="general_type[]" namefa="{{ __('site.input_type') }}" require="0"
                                                :items="\App\Utility\Setting\GeneralType::types()"
                                                id="type_select"></x-form.utility>
                            </td>


                        </tr>
                    @endfor
                    </tbody>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>@lang('site.general_items_title')</th>
                        <th>@lang('site.general_items_code')</th>
                        <th>@lang('site.general_items_input')</th>
                    </tr>

                    </tfoot>
                </table>

                <button type="submit" class="btn btn-primary">@lang('site.create_many_setting')</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>


@endsection
