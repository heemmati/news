{{ \App\Lubricator\ViewController::category_levels($category->id , $counter - 1 , $value) }}
<div class="col-3" id="category{{ $counter }}" >
    <div class="category_box">
        <ul>
            @if(isset($items) && !empty($items))
                @foreach($items as $item)
                    <li>
                        <a href="javascript:void(0)" class="{{ $value == $item->id ? 'choose_cat' : '' }}" data-parent="{{ $item->id }}" data-counter="{{ $counter }}">
                            {{ $item->title }}
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
