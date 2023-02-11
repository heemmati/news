<div class="row">
    <div class="col-12 col-md-12">

        @if(isset($object->image) && !empty($object->image) )

            <x-form.filemanager.image name="image" namefa="{{ __('site.default_image') }}"
                                      :value="$object->image"></x-form.filemanager.image>

        @else
            <x-form.filemanager.image name="image" namefa="{{ __('site.default_image') }}"
            ></x-form.filemanager.image>
        @endif
    </div>

    <div class="col-12 col-md-12">
        @if(isset($object->videos) && !empty($object->videos) && count($object->videos) > 0)
            <x-form.filemanager.video name="video" namefa="{{ __('site.default_video') }}"
                                      :value="$object->videos"></x-form.filemanager.video>

        @else
            <x-form.filemanager.video name="video" namefa="{{ __('site.default_video') }}"
                                  ></x-form.filemanager.video>
        @endif

    </div>


    <div class="col-12 col-md-12">
        @if(isset($object->podcasts) && !empty($object->podcasts) && count($object->podcasts) > 0)
        <x-form.filemanager.podcast name="podcast" namefa="{{ __('site.default_podcast') }}"
                                    :value="$object->podcasts"></x-form.filemanager.podcast>

        @else
            <x-form.filemanager.podcast name="podcast" namefa="{{ __('site.default_podcast') }}"
                             ></x-form.filemanager.podcast>
        @endif
    </div>


    <div class="col-12 col-md-12">
        @if(isset($object->files) && !empty($object->files) && count($object->files) > 0)
        <x-form.filemanager.file name="file" namefa="{{ __('site.default_file') }}"
                                 :value="$object->files"></x-form.filemanager.file>
        @else
            <x-form.filemanager.file name="file" namefa="{{ __('site.default_file') }}"></x-form.filemanager.file>

        @endif
    </div>


    <div class="col-12 col-md-12">
        @if(isset($object->galleries) && !empty($object->galleries) && count($object->galleries) > 0)
        <x-form.filemanager.gallery name="gallery" namefa="{{ __('site.default_galleries') }}"
                                    :value="$object->galleries"></x-form.filemanager.gallery>
        @else
            <x-form.filemanager.gallery name="gallery" namefa="{{ __('site.default_galleries') }}"
                                      ></x-form.filemanager.gallery>
        @endif
    </div>

    <div class="col-12 col-md-12">
        @if(isset($object->icons) && !empty($object->icons) && count($object->icons) > 0)
        <x-form.filemanager.icon name="icon" namefa="{{ __('site.default_icons') }}"
                                 :value="$object->icons"></x-form.filemanager.icon>
        @else
            <x-form.filemanager.icon name="icon" namefa="{{ __('site.default_icons') }}"></x-form.filemanager.icon>

        @endif
    </div>


</div>
