@extends('site.layout.master')



@section('seos')


<title>
    {{ $category->title }}
</title>
    <meta http-equiv="content-language" content="fa" />
    <meta name="dc.publisher" content="@lang('site.site_name')" />
    <meta name="dc.identifier" content="https://www.sahandpress.ir" />
    <meta name="copyright" content="©2021 Sahandpress Agency (www.sahandpress.ir)" />
    <meta itemprop="inLanguage" content="fa" />
    <meta itemprop="name" content="@lang('site.site_name')" />
    
    
    

    <meta itemprop="description" content="{{ $category->description }}" />

    

    <link rel="alternate" hreflang="fa" href="{{ $category->path() }}"/>
    <link rel="canonical" href="{{ $category->path() }}" >
    

    <meta property="og:title" itemprop="headline" content="{{ $category->title }}" />
    
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $category->path() }}" />
    <meta property="og:description" itemprop="description" content="{{ $category->description }}" />
    <meta property="og:site_name" content="@lang('site.site_name')" />
    <meta property="og:locale" content="fa_IR" />

    <!--<meta name="twitter:card" content="article" />-->
    <meta name="twitter:title" content="{{ $category->title }}" />
    <meta name="twitter:description" content="{{ $category->description }}"/>
  
    <meta name="description" content="{{ $category->description }}" />
    <meta name="dc.identifier"
          content="{{ $category->path() }}" />

@endsection




@section('content')



    <section id="navmain">
        <div class="container">
            @if (isset($iran_cat) && !empty($iran_cat) && !empty($regions) && isset($regions))

                            <div class="submenu row">
                                <div class="service-title col-xs-12 col-sm-3">
                                    <h3><a href="#">سرویس استان ها</a></h3>
                                </div>
                                <div class="service-menu col-xs-12 col-sm-9">
                                    <ul>
                                        @foreach ($regions as $region)
                                            <li class="">
                                                <a href="{{ $region->path() }}" target="_blank">{{ $region->title }}</a>
                                            </li>
                                        @endforeach

                                    </ul>



                                </div>

                            </div>
            @endif
        </div>
    </section>
  


    <section id="main0">
        <div class="container">
            <div class="row">
               
                 <div class="col-xs-12 col-sm-4">
                      <h3 class="title title-box">
                             <span>
                                 سرویس خبری 
                                 <b>{{$category->title}}</b>
                         </span>
                                    </h3> 
                <div class="category_box">
                    @if(isset($category->image) && !empty($category->image))
                    <div class="category_box_img">
                        <img src="{{ Storage::url($category->image)}}" title="{{ $category->title }}" alt="{{ $category->title }}">
                    </div>
                    @endif
                       <div class="category_box_img">
    <h1>{{ $category->title }}</h1>
    <p>
        {!! $category->body !!}
    </p>
    </div>
</div>
</div>
                <div class="col-xs-12 col-sm-8">
                    <h3 class="title title-box">
                             <span>
                                    سرتیتر اخبار
                         </span>
                                    </h3>
                                    
                    <div id="blog-item">
                        @if(isset($bignews) && !empty($bignews))
                            <div class="large-12 columns">
                                <div class="owl-carousel owl-theme row-item85 ">
                                    @foreach($bignews as $key => $new)
                                        <div class="item col">
                                            <div class="item1">
                                                <div class="post-img">


                                                    <x-site.tools.image :image="$new"
                                                                        class="bg-movei-lnk"></x-site.tools.image>
                                                </div>
                                                <div class="des1-item">
                                                    <h3>
                                                        <a href="{{  $new->path() }}">{{ $new->title }}</a>
                                                    </h3>
                                                    
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>





                        @endif


                    </div>


                </div>

                

            </div>


        </div>
    </section>


    <section class="main1 main1-category">

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-9 col3i">

                    <div class="row">


                                <div class="col-xs-12 col-sm-6">
                            @if(isset($specifics) && !empty($specifics))

                                <div class="box1">
                                    <h3 class="title title-box">
                             <span>


                     سوال و جواب
                        </span>
                                    </h3>
                                    <div class="item-box1 item-category">


                                        <div class="">
                                            @foreach($specifics as $key => $new)


                                                <div class="item3">
                                                    <div class="item-image">
                                                        <x-site.tools.image :image="$new"
                                                                            class="bg-movei-lnk"></x-site.tools.image>
                                                    </div>
                                                    <div class="description3">
                                                     <div class="title">
                                                            <h4>
                                                                <a href="{{ $new->path() }}">
                                                                     {{ $new->title }}
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div class="desc">
                                                            <p>
                                                                <a href="{{ $new->path() }}">
                                                                {{ \Illuminate\Support\Str::limit($new->description , 200 )  }}
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>

                                            <div class="all-div">
                                                <a href="{{ route('site.blog') }}" class="all-btn">
                                                    آرشیو
                                                </a>
                                            </div>


                                        </div>

                                    </div>

                                    @endif


                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    @if(isset($reports) && !empty($reports) && count($reports) > 0)
                                        <div class="box2">
                                            <h3 class="title title-box">
                              <span>
                            تحلیل و گزارش
                          </span>
                                            </h3>


                                            <div class="item-box1 item-category">
                                                @foreach ($reports as $key => $new )

                                                    <div class="item3 {{  $key == count($reports) - 1 ? 'endl' : '' }}">
                                                        <div class="item-image">
                                                            <x-site.tools.image :image="$new"></x-site.tools.image>
                                                        </div>
                                                        <div class="description3">
                                                            <div class="title">
                                                            <h4>
                                                                <a href="{{ $new->path() }}">
                                                                     {{ $new->title }}
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div class="desc">
                                                            <p>
                                                                <a href="{{ $new->path() }}">
                                                                {{ \Illuminate\Support\Str::limit($new->description , 200 )  }}
                                                                </a>
                                                            </p>
                                                        </div>
                                                        </div>
                                                    </div>

                                                @endforeach


                                                <div class="all-div"><a href="{{ route('site.blog') }}" class="all-btn">
                                                        آرشیو
                                                    </a></div>


                                            </div>


                                        </div>
                                    @endif


                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    @if(isset($bottoms) && !empty($bottoms))
                                        <div class="box5">
                                            <h3 class="title title-box">
                             <span>


                         اخبار روز

                         </span>
                                            </h3>
                                            <div>


                                                <div class="item-box1">

                                                    @foreach ($bottoms as $new)
                                                        <div class="item3 end1">
                                                            <div class="item-image">
                                                                <x-site.tools.image :image="$new"></x-site.tools.image>
                                                            </div>
                                                            <div class="description3">
                                                                <div class="title">
                                                                    <h4>
                                                                        <a href="{{ $new->path() }}">
                                                                            {{  $new->title }}
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div class="desc">
                                                                    <p>
                                                                {{ \Illuminate\Support\Str::limit($new->description , 300 )  }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endforeach

                                                    <div class="all-div"><a href="{{ route('site.blog') }}" class="all-btn">
                                                            آرشیو
                                                        </a></div>

                                                </div>

                                            </div>


                                        </div>
                                    @endif
                                </div>

                        </div>


                    </div>


                    <div class="col-xs-12 col-sm-3">

                        @if (isset($latests) && !empty($latests) )
                            <div class="box3">

                                <h3 class="title title-box">
                          <span>
                       آخرین اخبار
                      </span>
                                </h3>


                                <div class="item-box1">
                                    @foreach($latests as $new)
                                        <div class="item4">
                                            <div class="title1">
                                                <h5><a href="{{ $new->path() }}"> <i
                                                            class="fas fa-caret-left"></i><span>
                                                        {{ $new->title }}
                                                        </span></a>
                                                </h5>

                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="all-div"><a href="{{ route('site.blog') }}" class="all-btn">
                                            آرشیو
                                        </a></div>

                                </div>


                            </div>
                        @endif


                    </div>

                </div>
            </div>
    </section>

@endsection
