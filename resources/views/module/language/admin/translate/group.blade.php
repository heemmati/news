@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">@lang('site.translates_group_edit')</h6>
            <form method="POST" action="{{ route('translates.group.update') }}" enctype="multipart/form-data">
                @csrf
                @include('error.forms')

                <button type="submit" class="btn btn-primary">@lang('site.translates_group_edit')</button>


                @if(isset($words) && !empty($words) && count($words) > 0)
                    <table class="table table-striped">

                        <thead>
                        <th>#</th>
                        <th>@lang('site.words__singular')</th>
                        <th>@lang('site.word_groups__singular')</th>
                        @foreach($langs as $lang)
                            <th>@lang('site.translate_to')
                                {{ $lang->title }}
                            </th>
                        @endforeach
                        </thead>


                        <tbody>
                        @foreach($words as $word)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ $word->title }} - {{ $word->code }}
                                </td>
                                <td>
                                    {{ $word->group->title }}
                                </td>
                                @foreach($langs as $lang)
                                    <td>
                                        <input type="text" class="form-control" value="{{ $word->interper($lang->id) }}" name="word[{{$word->id}}][{{ $lang->id }}]">
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>


                        <tfoot>
                        <th>#</th>
                        <th>@lang('site.words__singular')</th>
                        <th>@lang('site.word_groups__singular')</th>
                        @foreach($langs as $lang)
                            <th>@lang('site.translate_to')
                                {{ $lang->title }}
                            </th>
                        @endforeach
                        </tfoot>


                    </table>
                @endif


                <button type="submit" class="btn btn-primary">@lang('site.translates_group_edit')</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
