@include('admin.inc.head')
@include('admin.layout.sidebar')

<!-- begin::main -->
<div class="layout-wrapper">
    @include('admin.inc.header')


    <div class="content-wrapper">

       @include('admin.inc.navigation')
        <div class="content-body">
            @yield('content')
        </div>


    </div>

</div>
<!-- end::main -->

@include('admin.layout.footer')

