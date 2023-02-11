<div class="card">
    <div class="card-body">


        @if(isset($object) && !empty($object))
            <h6 class="card-title">
                @lang('site.update')
                {{ __('routes.'.$route_name.'_singular') }} </h6>
            <form method="POST" action="{{ route($route_name.'.update' , $object->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                @else
                    <h6 class="card-title"> @lang('site.create')
                        {{ __('routes.'.$route_name.'_singular') }}

                    </h6>
                    <form method="POST" action="{{ route($route_name.'.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @endif

                        @include('admin.library.inputs')

                        @if(isset($object) && !empty($object))
                            <button type="submit" class="btn btn-primary">
                                @lang('site.update')
                                 {{ __('routes.'.$route_name.'_singular') }}
                            </button>
                        @else
                            <button type="submit" class="btn btn-primary">
                                @lang('site.create')
                                 {{ __('routes.'.$route_name.'_singular') }}

                            </button>
                        @endif
                    </form>

    </div>
</div>
