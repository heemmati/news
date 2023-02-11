<td class="td-image">
    @if(isset($src) && !empty($src))
        <a href="{{ \Illuminate\Support\Facades\Storage::url($src->src) }}">
            <img src="{{ \Illuminate\Support\Facades\Storage::url($src->src) }}" alt="">
        </a>
    @else
        ندارد
    @endif
</td>
