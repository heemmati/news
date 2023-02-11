@if(isset($categories)  && !empty($categories))
    @foreach($categories as $category)
        <span class="badge badge-dark">
                                                                {{ $category->title }}
                                                            </span>
    @endforeach
@else
    بدون دسته بندی
@endif

