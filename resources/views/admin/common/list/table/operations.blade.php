@include('admin.common.list.table.have_item')

@can($route_name.'.show')
    <a href="{{  route($route_name.'.show' , $item->id) }}">
        <i class="fa fa-eye"></i>
    </a>
@endcan
@can($route_name.'.edit')
    <a href="{{ route($route_name.'.edit' , $item->id) }}">
        <i class="fa fa-pen"></i>
    </a>
@endcan
@can($route_name.'.destroy')
    <a href="javascript:void(0)" class="sa-warning">
        <i class="fa fa-trash"></i>
    </a>
    {{--Deleting Form--}}
    <form action="{{ route($route_name.'.destroy' , $item->id) }}"
          method="POST" style="display: none">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-default"></button>
    </form>
    {{--Deleting Form--}}
@endcan
