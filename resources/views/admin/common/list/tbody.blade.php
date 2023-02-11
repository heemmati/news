@foreach( $collection as $key => $item)
    <tr>
        <td>{{ $loop->iteration }}</td>


        @include('admin.common.list.table.tbody_td')

        <td>
            @include('admin.common.list.table.operations')
        </td>
    </tr>
@endforeach
