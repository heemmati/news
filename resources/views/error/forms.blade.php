@if ($errors->any())
    <div class="alert alert-danger">
        <ul>

            @foreach ($errors->all() as $error)
                <li>
                   @lang($error)
                </li>
            @endforeach
        </ul>
    </div>
@endif


@if(!empty(\Illuminate\Support\Facades\Session::get('error') ))
    <p class="alert alert-danger">
        {{ \Illuminate\Support\Facades\Session::get('error') }}
    </p>

@endif

{{ \Illuminate\Support\Facades\Session::forget('error') }}
