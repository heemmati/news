@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">@lang('site.words_group_store')</h6>
            <form method="POST" action="{{ route('words.group.store') }}" enctype="multipart/form-data">
                @csrf
                @include('error.forms')

                @if(isset($word_groups) && !empty($word_groups))
                    <select name="word_group" class="form-control select_js">
                        @foreach($word_groups as $word_group)
                            <option value="{{ $word_group->id }}">{{ $word_group->title }}</option>
                        @endforeach
                    </select>
                @endif


                <table class="table table-striped">

                    <thead>
                    <th>#</th>
                    <th>@lang('site.words_title')</th>
                    <th>@lang('site.words_code')</th>
                    </thead>

                    <tbody>

                    @for($count = 1 ; $count < 20; $count ++)
                        <tr>

                            <td>{{ $count }}</td>

                            <td>
                                <input type="text" class="form-control" name="word[]"
                                       placeholder="@lang('site.words_title')">
                            </td>

                            <td>
                                <input type="text" class="form-control" name="code[]"
                                       placeholder="@lang('site.words_code')">
                            </td>

                        </tr>
                    @endfor


                    </tbody>

                    <tfoot>
                    <th>#</th>
                    <th>@lang('site.words_title')</th>
                    <th>@lang('site.words_code')</th>
                    </tfoot>

                </table>

                <button type="submit" class="btn btn-primary">@lang('site.words_group_store')</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
