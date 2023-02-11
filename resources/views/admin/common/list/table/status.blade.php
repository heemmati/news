<td>
    @can('panel.change.status')
        <a href="{{ route('panel.change.status' , ['id' => $item->id , 'model' => get_class($item)]) }}"
           class="btn btn-xs  {{  \App\Utility\Status::get_status_class($item->status) }}">
            {{  \App\Utility\Status::get_status($item->status) }}
        </a>
    @endcan
    @cannot('panel.change.status')
        <a href="javascript:void(0)"
           class="btn btn-xs  {{  \App\Utility\Status::get_status_class($item->status) }}">
            {{  \App\Utility\Status::get_status($item->status) }}
        </a>
    @endcannot

</td>
