<div class="page-header">

    @if(isset($breadcrumbs['links']) && !empty($breadcrumbs['links']))

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @foreach($breadcrumbs['links'] as $breadcrumb)
                    <li class="breadcrumb-item">

                        <a href="{{ $breadcrumb['route'] }}">{{ $breadcrumb['title'] }}</a>
                    </li>
                @endforeach
            </ol>
        </nav>
    @endif

    @if(isset($breadcrumbs['route']) && !empty($breadcrumbs['route']))


        <div class="btn btn-group">
            <a class="btn btn-skype" href="{{ route($breadcrumbs['route']['index']['route']) }}">

                <i class="ti-menu-alt"></i>

                {{ __('site.'.$breadcrumbs['route']['index']['name']) }}

            </a>
            <a class="btn btn-danger" href="{{ route($breadcrumbs['route']['create']['route']) }}">
                <i class="ti-plus"></i>
               {{ __('site.'.$breadcrumbs['route']['create']['name']) }}
            </a>
        </div>

        @endif

</div>
