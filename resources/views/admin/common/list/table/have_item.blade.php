@foreach($listables as $kelid => $field)
    @if( $kelid == 'haveItem')

        @foreach($field as $sub)
            @can($sub . '.index')
                <a class="btn btn-sm"
                   href="{{ route($sub . '.index' , ['parent_id' => $item->id]) }}">
                    @lang('site.list')
                    {{ __('routes.'.$sub.'_plural') }}
                </a>
            @endcan
        @endforeach
    @endif

@endforeach
