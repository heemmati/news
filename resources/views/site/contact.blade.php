@extends('site.layout.master')


@section('seos')


    <title>{{ $contact['title']->print }}</title>
    <meta http-equiv="content-language" content="fa"/>
    <meta name="dc.publisher" content="@lang('site.seo_first_page')"/>
    <meta name="dc.identifier" content="https://www.techli.ir"/>
    <meta name="copyright" content="©2021 techli Agency (www.techli.ir)"/>
    <meta itemprop="inLanguage" content="fa"/>
    <meta itemprop="name" content="{{ $contact['title']->print }}"/>




    <meta itemprop="description" content="{{ $contact['description']->print }}"/>
    <meta itemprop="image" content="{{ $contact['image']->print }}"/>


    <link rel="alternate" hreflang="fa" href="{{ route('site.contact') }}"/>
    <link rel="canonical" href="{{ route('site.contact') }}">


    <meta property="og:title" itemprop="headline" content="{{ $contact['title']->print }}"/>

    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ route('site.contact') }}"/>
    <meta property="og:description" itemprop="description" content="{{ $contact['description']->print }}"/>
    <meta property="og:site_name" content="@lang('site.seo_first_page')"/>
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:article:author" content="@lang('site.seo_first_page')"/>
   
    <meta property="og:image" itemprop="image" content="{{ $contact['image']->print }}"/>

    <meta name="twitter:card" content="article"/>
    <meta name="twitter:site" content="@techli" />
    <meta name="twitter:title" content="{{ $contact['title']->print }}"/>
    <meta name="twitter:description" content="{{ $contact['description']->print }}"/>
    <meta name="twitter:image" content="{{ $contact['image']->print }}"/>

    <meta itemprop="datePublished" property="article:published_time" content="2023-08-12"/>
    <meta itemprop="dateModified" property="article:modified"
          content="{{ $today }}"/>
          
    <meta name="thumbnail" itemprop="thumbnailUrl" content="{{ $contact['image']->print }}"/>
    <meta name="genre" itemprop="genre" content="News"/>

    <meta name="description" content="{{ $contact['description']->print }}"/>
    <meta name="dc.identifier"
          content="{{ route('site.contact') }}"/>



    <script type="application/ld+json">
{
   "@context": "https://schema.org",
   "@type": "NewsArticle",
   "url": "{{ route('site.contact') }}",
   "publisher":{
      "@type":"Organization",
      "name":"techli",
      "logo":"https://techli.ir/storage//photos/1/205px-Esteghlal_Tehran_FC_logo.svg.png"
   },
   "headline": "{{ $contact['title']->print }}",
   "mainEntityOfPage": "{{ route('site.contact') }}",
   "articleBody": "{{ $contact['description']->print }}",

   "image":[  @if(isset($contact->image) && !empty($contact->image))
            "{{ $contact['image']->print }}"
      @else
            "https://techli.ir/storage//photos/1/205px-Esteghlal_Tehran_FC_logo.svg.png"
@endif
        ],

        "datePublished":"2023-08-12"
}




    </script>


@endsection

@section('content')

  <div class="wrapper">
         <div class="container">
       
                <div class="row">
                    <div class="col-md-12 middl">
                        <section class="single">
                            <div id="lin-10"></div>
                            <header>
                                <h1 class="single-post-title"><a href="{{ route('site.contact') }}">{{ $contact['title']->print }}  </a></h1><br>
                            </header>
                           
                            <div class="post-content clearfix">
                                <p>
                                {{ $contact['body']->print }}
                                </p>

                                <form class="contact" action="" method="POST">
                                    <div class="form-group">
                                        <label for="name">نام:</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">ایمیل:</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment-contact">پیام:</label>
                                        <textarea id="comment-contact" class="col-xs-12 col-sm-12" cols="10" rows="10"></textarea>
                                    </div>
                                    <button type="submit" class="col-xs-5 col-sm-3">ارسال</button>
                                </form>
                            </div>
                            <div id="lin-10"></div>
                        </section>
                    </div>
       
            </div>
            <!--/.row-->
       
    </div>
    </div>
    



@endsection

