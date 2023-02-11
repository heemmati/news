<div class="card">
    <div class="card-body">
        @if(isset($collection) && !empty($collection))
            <table id="example1" class="table table-striped table-bordered">
                <thead>
                @include('admin.common.list.thead')
                </thead>
                <tbody>
                @include('admin.common.list.tbody' )
                </tbody>
                <tfoot>
                @include('admin.common.list.thead')
                </tfoot>
                {{--                {!! $collection->render()  !!}--}}
            </table>
        @else
            <div class="alert alert-secondary" role="alert">
                {{ __('routes.'.$route_name.'_singular') }}

                @lang('site.not_found')
                <p>

                    @lang('site.for_creation')
                    {{ $singular }}
                    <a href="{{route($route_name.'.create')}}">@lang('site.here')</a>
                    @lang('site.click_here')
                </p>
            </div>
        @endif
    </div>
</div>
