<tr>

    <th>@lang('site.ids')</th>

    @foreach($listables as $key => $field)
        @if($key !== 'slug' && $key !== 'haveItem')
            <th> {{ __('admin.'.$key) }} {{ __('routes.'.$route_name.'_singular') }}</th>
        @endif
    @endforeach

    <th>@lang('site.operations')</th>

</tr>
