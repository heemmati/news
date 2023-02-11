@extends ('admin.layout.master')


@section('content')
    <div class="content-body">

        <div class="content">


            <div class="row no-gutters chat-block">


                <!-- begin::chat content -->
                <div class="col-lg-12 chat-content">

                    <!-- begin::chat header -->
                    <div class="chat-header border-bottom">
                        <div class="d-flex align-items-center">
                            <div class="pl-3">

                            </div>
                            <div>
                                @if(auth()->id() == $ticket->from_id)
                                    <p class="mb-0">کارمند
                                        {{ $ticket->department->title }}
                                    </p>
                                    <div class="m-0 small text-success"> پاسخگوی شما</div>
                                @else
                                    <p class="mb-0">{{ $ticket->FromMe->name }}</p>
                                    <div class="m-0 small text-success"> سوال داره</div>
                                @endif

                            </div>
                            <div class="mr-auto">
                                <h3>{{$ticket->title}}</h3>
                                <h6>
                                    <span>شماره تیکت :</span>
                                    {{$ticket->code_print()}}
                                </h6>
                            </div>

                        </div>
                    </div>
                    <!-- end::chat header -->

                    <!-- begin::messages -->
                    <div class="messages">
                        @foreach($ticket_items as $item)
                            @if($item->from_id != auth()->id())
                                <div class="message-item me">
                                    <div class="message-item-content">
                                        {{ $item->body }}
                                    </div>
                                    <span class="time small text-muted font-italic"> {{ $ticket->created_at }}</span>
                                </div>
                                @if(isset($item->image) && !empty($item->image))
                                    <div class="message-item me message-media">
                                        <a href="{{ Storage::url($item->image) }}" target="_blank">
                                            <img src="{{ Storage::url($item->image) }}" alt="image">
                                        </a>

                                        <span
                                            class="time small text-muted font-italic"> {{ $ticket->created_at }}</span>
                                    </div>
                                @endif

                                @if(isset($item->file) && !empty($item->file))
                                    <div class="message-item me message-media">
                                        <a class="btn btn-primary" href="{{ Storage::url($item->file) }}"
                                           target="_blank">
                                            <i class="fal fa-paperclip"></i>
                                            دانلود فایل
                                        </a>

                                        <span
                                            class="time small text-muted font-italic"> {{ $ticket->created_at }}</span>
                                    </div>
                                @endif

                            @else
                                <div class="message-item">
                                    <div class="message-item-content">
                                        {{ $item->body }}
                                    </div>
                                    <span class="time small text-muted font-italic">{{ $ticket->created_at }}</span>
                                </div>
                            @endif


                        @endforeach


                    </div>
                    <!-- end::messages -->

                    <!-- begin::chat footer -->
                    <div class="chat-footer border-top">
                        <form method="POST" action="{{ route('tickets.make') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                            <div class="flex-grow-1">
                                <textarea
                                    class="form-control"
                                    name="body"
                                    placeholder="متن خود را بنویسید"
                                    required>

                                </textarea>
                            </div>
                            <div class="chat-footer-buttons d-flex">


                                <input
                                    type="hidden"
                                    id="image_label"
                                    class="form-control image_label" name="file"
                                    title="ضمیمه کردن فایل"
                                    aria-label="Image" aria-describedby="button-image" value="{{ old('file') }}">
                                <div class="input-group-append">
                                    <button class="button-image btn btn-outline-light" type="button" id="button-image">
                                        <i class="far fa-paperclip"></i>
                                    </button>
                                </div>

                                <input
                                    type="hidden"
                                    id="image_label"
                                    class="form-control image_label" name="image"
                                    title="آپلود تصویر"
                                    aria-label="Image" aria-describedby="button-image" value="{{ old('image') }}">
                                <div class="input-group-append">
                                    <button class="btn-primary button-image btn btn-outline-light" type="button" id="button-image">
                                        <i class="far fa-images"></i>
                                    </button>
                                </div>


                            </div>

                            <button class="btn btn-primary" type="submit">
                                <i data-feather="send" class="width-15 height-15"></i>
                            </button>
                        </form>
                    </div>
                    <!-- end::chat footer -->

                </div>
                <!-- begin::chat content -->

            </div>


        </div>


    </div>


@endsection

@section('scripts')
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
