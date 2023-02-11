@foreach($users as $user)

    <tr>
        <td>{{ $user->presentation_code }}</td>
        <td>{{ $user->name }}</td>
        <td>
            {{ \App\Utility\Acl::getRole($user->role) }}
        </td>
        <td>
            {{ $user->parent->name }}
        </td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->mobile }}</td>
        <td>

            {{ !empty($user->wallet) == true ? $user->wallet->rewards : 0 }}</td>
        <td>


            @can('users.show')
                <a href="{{ route('users.show' , $user->id ) }}">
                    <i class="fa fa-eye"></i>
                </a>
            @endcan


        </td>
    </tr>

    @if(isset($user->children) && !empty($user->children))
        @include('admin.helpers.marketer' , [ 'users' => $user->children ])
    @endif


@endforeach
