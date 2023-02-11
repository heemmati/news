@foreach($listables as $kelid => $field)
    @if( $kelid != 'haveItem')
        @switch($kelid)

            @case('status')
            @include('admin.common.list.table.status')
            @break
            @case('image')
            @include('admin.common.list.table.image')
            @break
            @case('parent_id')
            @include('admin.common.list.table.parent')
            @break
            @default
            @include('admin.common.list.table.default')

        @endswitch
    @endif
@endforeach
