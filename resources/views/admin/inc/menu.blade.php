<li>


    <a href="#">
        @lang('site.manage')
        {{ __('routes.'.$route_name.'_plural') }}

        @if(isset($count) && !empty($count))
            @if($count > 0)
                <span class="badge badge-danger">
                    {{ $count }}
                </span>
            @endif
        @endif


    </a>


    <ul>

        @can($route_name.'.index')
            <li>

                <a href="{{ route($route_name.'.index') }}">
                    @lang('site.list') {{ __('routes.'.$route_name.'_plural') }}


                </a>


            </li>
        @endcan


    </ul>
</li>


