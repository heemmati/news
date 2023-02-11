@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">@lang('site.create_many_setting')</h6>
            <form method="POST" action="{{ route('general-items.bunch.update') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <x-form.select type="{{ __('site.general_item__singular') }}" name="general_id"
                               namefa="{{ __('site.general_group') }} " require="1"
                               :items="$generals"></x-form.select>


                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('site.general_items_title')</th>
                        <th>@lang('site.general_items_value')</th>
                    </tr>

                    </thead>

                    <tbody>
                    @foreach($general_items as $key => $item)
                        <tr>
                            <td>
                                {{ $item->title }}
                            </td>

                            <td>

                                @if($item->type == \App\Utility\Setting\GeneralType::TEXT)
                                    <x-form.text type="{{ __('site.general_item__singular') }}" name="value[]" namefa="{{ __('site.text') }}" require="0"></x-form.text>
                                @endif

                                @if($item->type == \App\Utility\Setting\GeneralType::HTML)
                                        <x-form.textarea type="{{ __('site.general_item__singular') }}" name="value[]" namefa="{{ __('site.html') }}" require="0"></x-form.textarea>
                                @endif

                                @if($item->type == \App\Utility\Setting\GeneralType::IMAGE)

                                <x-form.filemanager.image type="{{ __('site.general_item__singular') }}" name="value[]" namefa="{{ __('site.image') }}" require="0"></x-form.filemanager.image>

                                    @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>@lang('site.general_items_title')</th>
                        <th>@lang('site.general_items_value')</th>
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
