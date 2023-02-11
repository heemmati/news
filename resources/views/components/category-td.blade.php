@if(isset($categories)  && !empty($categories) && count($categories) > 0)
    @foreach($categories as $category)
        <a href="{{ $category->path() }}" class="badge badge-dark">
                                                                {{ $category->title }}
                                                            </a>
    @endforeach
@else
    <span class="badge badge-danger">
                                                  بدون دسته بندی
                                                            </span>

@endif

