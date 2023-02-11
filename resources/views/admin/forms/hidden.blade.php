@if(!isset($object) || empty($object))
    @if(isset($parent_id) && !empty($parent_id))
        <input type="hidden" name="{{ $field }}" value="{{ $parent_id }}">
    @endif
@endif
