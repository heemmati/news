@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">@lang('site.rewords_group_store')</h6>
            <form method="POST" action="{{ route('rewords.group.store') }}" enctype="multipart/form-data">
                @csrf
                @include('error.forms')

               


                <table class="table table-striped">

                    <thead>
                    <th>#</th>
                    <th>@lang('site.rewords_title')</th>
                    <th>@lang('site.rewords_code')</th>
                    </thead>

                    <tbody>

                    @for($count = 1 ; $count < 20; $count ++)
                        <tr>

                            <td>{{ $count }}</td>

                            <td>
                                <input type="text" class="form-control" name="word[]"
                                       placeholder="@lang('site.rewords_title')">
                            </td>

                            <td>
                                <input type="text" class="form-control" name="tran[]"
                                       placeholder="@lang('site.rewords_code')">
                            </td>

                        </tr>
                    @endfor


                    </tbody>

                    <tfoot>
                    <th>#</th>
                    <th>@lang('site.rewords_title')</th>
                    <th>@lang('site.rewords_code')</th>
                    </tfoot>

                </table>

                <button type="submit" class="btn btn-primary">@lang('site.rewords_group_store')</button>
            </form>
        </div>
    </div>
@endsection

