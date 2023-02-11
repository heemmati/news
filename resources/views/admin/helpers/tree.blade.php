<ul>
    @foreach($users as $user)
        <li>

            <a href="{{ route('users.show' , $user->id ) }}">{{ $user->name }}</a>
            @if(isset($user->children) && !empty($user->children) )
                @include('admin.helpers.tree' , [ 'users' => $user->children ])
                @endif
        </li>
    @endforeach

</ul>
