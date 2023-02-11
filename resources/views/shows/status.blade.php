<div class="col-md-6">

    @include('shows.small')
<a  href="javascript:void(0)"
   class="btn btn-xs show-status  {{  \App\Utility\Status::get_status_class($object->status) }}">
    {{  \App\Utility\Status::get_status($object->status) }}
</a>
</div>
