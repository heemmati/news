

<a href="javascript:void(0)" class="admin_cart_a nav-link">
    <i class="far fa-shopping-cart"></i>
    <span class="count_badge badge badge-dark">{{  !empty($items) ? count($items) : 0 }}</span>
</a>


<div class="small__basket">
    <div class="small__basket__header">
        <h5>@lang('site.cart')</h5>
    </div>

    <div class="small__basket__body">
        @if(isset($items) && !empty($items))
            @foreach($items as $item)
                <div class="small__basket__body__item">
                    <a class="basket_trash" href="{{ route('basket.remove' , $item->sell->sellable) }}">
                        <i class="fas fa-trash"></i>
                    </a>
                    <div class="small__basket__body__item__image">
                        @if(!empty($item->sell->sellable->images[0]))
                        <a href="{{  !empty($item->sell->sellable->slug) ? $item->sell->sellable->path() : '#' }}">
                            <img src="{{  Storage::url($item->sell->sellable->images[0]->src) }}"
                                 alt="{{  $item->sell->sellable->title ? $item->sell->sellable->title : '#' }}">
                        </a>
                        @else
                        <a href="{{  !empty($item->sell->sellable->slug) ? $item->sell->sellable->path() : '#' }}">
                            <img src="{{ url('admin-theme') }}/assets/media/image/noimage.png"
                                 alt="{{  !empty($item->sell->sellable->title) ? $item->sell->sellable->title : '#' }}">
                        </a>
                        @endif

                    </div>
                    <div class="small__basket__body__item__desc">
                        <h6><a href="">
                            @if(!empty($item->sell->sellable->title))
                            {{  $item->sell->sellable->title }}
                            @endif

                            </a></h6>
                        <div class="qty">
                            {{ $item->finance->count }}
                            @lang('site.numbers')
                        </div>

                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="small__basket__footer">
        <div class="small__basket__footer__total">
            <p>
                @lang('site.total_amount') :
            </p>

            @if(isset($items) && !empty($items) && count($items) > 0)

                <p></p>

            @endif
        </div>
        <div class="small__basket__footer__link">
            <a href="{{ route('cart.index') }}">
                @lang('site.pay')
            </a>
        </div>
    </div>
</div>
