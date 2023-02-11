@if($item['parent_id'] == 0)
    <td>@lang('site.mother')</td>
@else
    <td>
        {{ !empty($item->parent->title)  }}</td>
@endif
