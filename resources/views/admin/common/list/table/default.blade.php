@if(!empty($field[0]) && isset($field[0]) && !empty( $item[$field[0]]))

    <td>
        @if(isset($item[$field[0]]['title']) && !empty($item[$field[0]]['title']))
            {{ $item[$field[0]]['title'] }}
        @else
            {{ $item[$field[0]]['name'] }}
        @endif
        {{--                                            {{ !empty($item[$field[0]]['title']) == true ? $item[$field[0]]['title'] : $item[$field[0]]['name'] }}--}}
    </td>
@else
    @if($kelid !== 'slug')

        <td>
            @if($kelid == 'title')
                @if(array_key_exists('slug' , $listables))
                    <a href="{{ url($item->path()) }}">
                        {{  $item[$kelid] }}
                    </a>
                @else
                    {{  $item[$kelid] }}
                @endif
            @else
                {{  $item[$kelid] }}
            @endif
        </td>
    @endif
@endif
