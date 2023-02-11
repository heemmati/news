
@if($type_en == 'mypanel')

    @can('users.show')
        <li>

            <a href="{{ route('users.show' , auth()->id()) }}"> @lang('site.profile')</a></li>
    @endcan

    @can('users.change-password')
        <li>

            <a href="{{ route('users.change-password' , auth()->id()) }}"> @lang('site.change_pass')</a></li>
    @endcan


@endif




        </ul>
        </div>
