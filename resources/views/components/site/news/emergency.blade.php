@if(isset($emergencies) && !empty($emergencies) && count($emergencies))
    <div class="breakingnews-wrapper hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                    <div class="breakingnews clearfix fix">
                        <div class="bn-title">
                            <h6> اخبار فوری </h6>
                        </div>
                        <div class="news-wrap">
                            <ul class="bkn clearfix" id="bkn">
                                @foreach($emergencies as $new)
                                <li>
                                    <a href="{{ $new->path() }}">
                                        {{ $new->title }}
                                    </a>
                                </li>
                               @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif
