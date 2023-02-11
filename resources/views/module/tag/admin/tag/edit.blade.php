@extends ('admin.layout.master2')


@section('content')


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">

                            ویرایش تگ
                            {{ $tag->title }}

                        </h6>


                        <form method="POST" action="{{ route('tags.update' , $tag->id ) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            @include('error.forms')

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    {{--Title--}}
                                    <div class="form-group">
                                        @error('title')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">عنوان تگ را وارد کنید</label>
                                        <input type="text"
                                               name="title"
                                               class="form-control"
                                               placeholder="عنوان تگ را وارد کنید"
                                               value="{{ $tag->title }}"
                                               required>
                                        <small class="counter_small"></small>

                                    </div>


                                    {{--En title--}}
                                    <div class="form-group">
                                        @error('entitle')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">عنوان انگلیسی  تگ را وارد کنید</label>
                                        <input type="text"
                                               name="entitle"
                                               class="form-control"
                                               placeholder="عنوان انگلیسی تگ را وارد کنید"
                                               value="{{ $tag->entitle   }}"
                                        >
                                        <small class="counter_small"></small>

                                    </div>

                                </div>

                                <div class="col-12 col-md-6">
                                    {{-- Description --}}
                                    <div class="form-group">
                                        @error('description')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for=""> توضیحات کوتاه تگ را وارد کنید </label>

                                        <textarea class="form-control"
                                                  name="description"
                                                  id="" cols="30" rows="10"
                                                  placeholder="توضیحات کوتاه خبر را وارد کنید">
                                            {{ $tag->description }}
                                        </textarea>
                                        <small class="counter_small"></small>
                                    </div>

                                </div>
                            </div>

                            {{-- Body --}}
                            <div class="form-group">
                                @error('body')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for=""> متن کامل تگ را وارد کنید </label>

                                <textarea class="form-control body"

                                          name="body"
                                          id="" cols="30" rows="10"
                                          placeholder="متن کامل خبر را وارد کنید">

                                    {{ $tag->body }}
                                </textarea>
                                <small class="counter_small"></small>
                            </div>


                            @if(\App\Utility\Acl::isManager(auth()->id()))
                @can('panel.change.status')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ __('site.status_change') }}
                        </h5>


                        <x-form.utility name="status" namefa="{{ __('site.status') }}"
                        :items="\App\Utility\Status::items()" :value="$tag->status" type="{{ __('site.tags_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif





                            <button type="submit" class="btn btn-primary">ویرایش تگ</button>
                        </form>

                    </div>
                </div>


            </div>
        </div>

@endsection

