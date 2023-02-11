@extends ('admin.layout.master2')


@section('content')


    <div class="card">
        <div class="card-body">
            <h6 class="card-title">@lang('admin.pages_update')</h6>


            <form method="POST" action="{{ route('pages.update' , $page->id) }}" enc:type="multipart/form-data">
                @csrf
                @method('PATCH')

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">

                        <x-form.text name="title" :namefa="__('site.title')" :type="__('site.pages__singular')"
                                     require="1" :value="$page->title"></x-form.text>

                        <x-form.text name="entitle" :namefa="__('site.entitle')" :type="__('site.pages__singular')"
                                     require="0" :value="$page->entitle"></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">


                        <x-form.tag :tags="$page->tags"></x-form.tag>

                        <x-form.textarea name="description" :namefa="__('site.description')"
                                         :type="__('site.pages__singular')" require="0"
                                         :value="$page->description"></x-form.textarea>


                    </div>


                </div>


                <x-form.textarea name="body" :namefa="__('site.body')" :type="__('site.pages__singular')" require="0"
                                 :value="$page->body"></x-form.textarea>


                <x-form.select name="positions" :namefa="__('site.positions')" :items="$positions"
                               :type="__('site.pages__singular')" require="0" multiple="1"
                               :value="$selected_positions"></x-form.select>


{{--                <div class="form-group">--}}
{{--                    <label for="">@lang('site.positions')</label>--}}
{{--                    <select type="text" name="positions" class="form-control">--}}
{{--                        @foreach($positions as $position)--}}
{{--                            <option value="{{ $position->id }}"> {{ $position->title }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}


                <x-form.filemanager.filemanager :object="$page"></x-form.filemanager.filemanager>

                <div class="row">
                    <div class="col-12 col-md-12">

                        <x-form.text name="created_at" kind="date" :namefa="__('site.creation_date')"
                                     :type="__('site.pages__singular')" require="0"></x-form.text>

                    </div>
                </div>

                @if(\App\Utility\Acl::isManager(auth()->id()))
                    @can('panel.change.status')
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ __('site.status_change') }}
                                </h5>


                                <x-form.utility name="status" namefa="{{ __('site.status') }}"
                                                :items="\App\Utility\Status::items()" :value="$page->status"
                                                type="{{ __('site.pages__singular') }}"
                                                require="0" multiple="0"></x-form.utility>


                            </div>
                        </div>
                    @endcan
                @endif


                <button :type="submit" class="btn btn-primary">@lang('site.page_update')</button>
            </form>

        </div>
    </div>



@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
