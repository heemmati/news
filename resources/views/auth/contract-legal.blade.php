@extends('auth.layout.master2')

@section('content')


    <div class="form-wrapper form-wrapper2">
        <!-- logo -->
        <div id="logo">
            <img class="logo" style="width: 100%" src="{{ Storage::url( $main_setting->getItem('logo')->image) }}" alt="">
            <img class="logo-dark" style="width: 100%" src="{{ Storage::url( $main_setting->getItem('logo')->image) }}" alt="">
        </div>

        <h5>@lang('site.agreement')</h5>
        <form action="{{ route('auth.register.agreement') }}" method="POST">
            @csrf

            <h1>
                {{
                $contract->getItem('title')->text
                }}
                {{ $user->name }}
            </h1>
            @if($user->account_type == \App\Utility\Acl::SELLER)
                <p>
                    {{ $contract->getItem('legal_seller')->html }}
                </p>
            @elseif($user->account_type == \App\Utility\Acl::MARKETER)
                <p>
                    {{ $contract->getItem('legal_marketer')->html }}
                </p>

            @elseif($user->account_type == \App\Utility\Acl::USER)
                <p>
                    {{ $contract->getItem('legal_buyer')->html }}
                </p>
            @else
                <p>
                    {{ $contract->getItem('legal_buyer')->html }}
                </p>
            @endif

            <button type="submit" class="btn btn-primary btn-block">@lang('site.i_have_read_sign')</button>

        </form>



    </div>

@endsection

@section('scripts')

    <!-- Plugin scripts -->
    <script src="{{ url('admin-theme') }}/vendors/bundle.js"></script>

    <!-- App scripts -->
    <script src="{{ url('admin-theme') }}/assets/js/app.min.js"></script>

    <script src="{{ url('vendor/file-manager/js/file-manager.js') }}"></script>
    @include('sweetalert::alert');

    <script>
        /* Image File Manager */
        var purpose;
        $(document).on('click', '.button-image', function () {
            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            purpose = $(this);
        });

        // set file link
        function fmSetLink($url) {
            purpose.parent().parent().find('.image_label').val($url);
        }

    </script>
@endsection
