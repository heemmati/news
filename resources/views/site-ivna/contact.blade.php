@extends('site.layout.master')

@section('seos')

    <title>@lang('site.seo_contact_page')</title>

    <meta name="description" content="@lang('site.seo_contact_page_desc')" />

    <link rel="alternate" hreflang="fa" href="{{ route('site.contact') }}" />

    <meta http-equiv="content-language" content="fa" />

    <meta name="keywords" content="@lang('seo_contact_keywords')" />

    <meta name="dc.publisher" content="@lang('site.seo_contact_page')" />
    <meta name="dc.identifier" content="https://www.ivnanews.ir" />
    <meta name="copyright" content="©2021 Ivna News Agency (www.ivnanews.ir)" />
    <!--<meta name="dcterms.created" content="2002-10-14T15:24:23+00:00" />-->
    <!--<meta name="dcterms.modified" content="2021-08-11 T 09:22:56 +0430" />-->
    <meta itemprop="name" content="@lang('site.seo_contact_page')" />
    <meta itemprop="description" content="@lang('site.seo_contact_description')" />

    @if(isset($contact['image']) && !empty($contact['image']))
        <meta itemprop="image" content="{{ \Illuminate\Support\Facades\Storage::url($contact['image']->print) }}" />
        <meta name="twitter:image:src" content="{{ \Illuminate\Support\Facades\Storage::url($contact['image']->print) }}" />
        <meta name="twitter:image" content="{{ \Illuminate\Support\Facades\Storage::url($contact['image']->print) }}" />
        <meta property="og:image" content="{{ \Illuminate\Support\Facades\Storage::url($contact['image']->print) }}" />
    @endif
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@lang('site.seo_contact_page')" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:site" content="@IvnaNews_Agency" />

    <meta name="twitter:image:alt" content="@lang('site.seo_contact_page')" />
    <meta name="twitter:domain" content="https://www.ivnanews.ir" />
    <meta property="og:title" content="@lang('site.seo_contact_page')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.ivnanews.ir" />

    <meta property="og:description" content="@lang('site.seo_contact_description')" />
    <meta property="og:site_name" content="@lang('seo_site_name')" />
    <meta property="article:published_time" content="2021-08-11 T 09:22:56 +0430" />
    <meta name="date" content="2021-08-11 T 09:22:56 +0430" />
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:article:author" content="@lang('site.seo_contact_page')" />
    <meta property="og:article:section" content="صفحه نخست" />
    <meta name="generator" content="https://www.ivnanews.ir" />
    <meta name="language" content="fa" />
    <meta name="rating" content="General" />
    <meta name="expires" content="never" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="publisher" content="@lang('site.seo_contact_page')" />
    <link rel="canonical" href="https://www.ivnanews.ir/" />


@endsection



@section('content')


    <section class="about_page">
        <div class="container">

            <!-- Contact Body -->
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="about_page_caption">
                        <h1>
                            @if(isset($contact['title']) && !empty($contact['title']))
                                {{ $contact['title']->print }}
                            @else
                                @lang('site.about_us')
                            @endif

                        </h1>

                        <p>
                            @if(isset($contact['title']) && !empty($contact['title']))
                                {{ $contact['body']->print }}
                            @else
                                @lang('site.sample_about')
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6">

                    @if(isset($contact['image']) && !empty($contact['image']))

                        <a href="{{ \Illuminate\Support\Facades\Storage::url($contact['image']->print) }}">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($contact['image']->print) }}"
                                 alt=" @if(isset($contact['title']) && !empty($contact['title']))
                                 {{ $contact['title']->print }}
                                 @else
                                 @lang('site.about_us')
                                 @endif">
                        </a>
                    @endif
                </div>
            </div>

            <!-- Contact Map-->
        @if(isset($contact['map']) && !empty($contact['map']))
            {!! $contact['map']->print !!}
        @endif

        <!--Contact Items-->
            <div class="row">
                @if(isset($contact['phone']) && !empty($contact['phone']))
                    <div class="col-12 col-md-4">

                        <div class="contact_item">
                        <span>
                            <i class="far fa-phone"></i>
                        </span>
                            <h3>
                                @lang('site.call_us')
                            </h3>
                            <p>
                                {{ $contact['phone']->print }}
                            </p>
                        </div>

                    </div>
                @endif

                @if(isset($contact['email']) && !empty($contact['email']))
                    <div class="col-12 col-md-4">

                        <div class="contact_item">
                        <span>
                            <i class="far fa-mail-forward"></i>
                        </span>
                            <h3>
                                @lang('site.mail_us')
                            </h3>
                            <p>
                                {{ $contact['email']->print }}
                            </p>
                        </div>

                    </div>
                @endif


                @if(isset($contact['address']) && !empty($contact['address']))
                    <div class="col-12 col-md-4">

                        <div class="contact_item">
                        <span>
                            <i class="far fa-phone"></i>
                        </span>
                            <h3>
                                @lang('site.address_me')
                            </h3>
                            <p>
                                {{ $contact['address']->print }}
                            </p>
                        </div>

                    </div>
                @endif


            </div>

            <!-- Contact Form-->

            <div class="row">
                <div class="col-12">
                    <form action="{{ route('site.contact.save') }}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="">@lang('site.name')</label>
                                <input class="form-control" type="text" placeholder="@lang('site.name')" name="name">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="">@lang('site.email')</label>
                                <input class="form-control" type="email" placeholder="@lang('site.email')" name="email">
                            </div>


                            <div class="col-12 col-md-12">
                                <label for="">@lang('site.body')</label>
                                <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>


                            <div class="col-12">
                                <button type="submit" class="btn btn-success">@lang('site.save_contact') </button>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

@endsection


