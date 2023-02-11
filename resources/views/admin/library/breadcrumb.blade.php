<div class="page-header">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.panel') }}">@lang('site.dashboard')</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route($route_name.'.index') }}">{{ __('routes.'.$route_name.'_plural') }}</a>
            </li>

        </ol>
    </nav>
    @can($route_name.'.create')
        @if( $insertable == true)
            <div class="page-header_actions">
                @if(isset($parent_id) && !empty($parent_id))
                    <a class="btn btn-primary" href="{{ route($route_name.'.create' ,['parent_id' => $parent_id]) }}">
                        @lang('site.create')
                        {{ __('routes.'.$route_name.'_singular') }}
                    </a>
                @else
                    <a class="btn btn-primary" href="{{ route($route_name.'.create') }}">
                        @lang('site.create') {{ __('routes.'.$route_name.'_singular') }}
                    </a>
                @endif
            </div>
        @endif
    @endcan
</div>
