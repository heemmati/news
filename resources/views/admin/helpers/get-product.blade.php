
<div class="product_box_admin">
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="product_box_admin_image">
                <a href="{{ url($product->path()) }}">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="">
                </a>
            </div>
        </div>
        <div class="col-12 col-md-9">
                <div class="product_box_admin_desc">
                    <h5>
                        <a href="{{ url($product->path()) }}">
                            {{ $product->title }}
                        </a>
                    </h5>
                    <p>
                        کمیسیون این کالا
                        <span>
                            {{ $product->commission }}
                        </span>
                        %
                        است
                    </p>

                </div>
        </div>
    </div>
</div>
