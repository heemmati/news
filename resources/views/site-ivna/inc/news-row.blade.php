<div class="news-items">
    <div class="row">
        <div class="col-md-3">
            <div class="news-image">
                <a href="{{ $new->path() }}">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($new->image) }}"  alt="{{ $new->title }}" height="120" width="180"/>
                </a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="news-caption">
                <div class="news-titr">
                    <p>
                        ایونا گزارش می دهد:
                    </p>
                </div>
                <div class="news-title">
                    <h2>
                        <a href="">
                            فوری: تاریخ دربی پایتخت مشخص شد
                        </a>
                    </h2>
                </div>
                <div class="news-desc">
                    <p>
                        بر اساس اعلام سازمان لیگ تیمهای پرسپولیس و استقلال روز 13 آذر به مصاف هم خواهند رفت.
                    </p>
                </div>
                <div class="comment">
                    <div class="idea">
                        <a href="#">
                            <i class="fa fa-comment-o"></i>
                        </a>
                        <a href="" class="set-comment">
                            نظر بدهید
                        </a>
                    </div>
                    <div class="idea-numbers">
                        <a href="" class="published-comment">
                            نظرات منتشر شده:
                            <span class="comment-numbers">3</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
