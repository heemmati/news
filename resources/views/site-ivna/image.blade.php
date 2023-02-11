@extends('site.layout.master')

@section('stylus')

    <link rel="stylesheet" href="{{ url('ivna-theme') }}/assets/sass/single-image-gallery.css">
@endsection


@section('seos')


    <title>{{ $article->title }}</title>
    <meta http-equiv="content-language" content="fa"/>
    <meta name="dc.publisher" content="@lang('site.seo_first_page')"/>
    <meta name="dc.identifier" content="https://www.ivnanews.ir"/>
    <meta name="copyright" content="©2021 ivnanews Agency (www.ivnanews.ir)"/>
    <meta itemprop="inLanguage" content="fa"/>
    <meta itemprop="name" content="{{ $article->title }}"/>




    <meta itemprop="description" content="{{ $article->description }}"/>
    <meta itemprop="image" content="{{ Storage::url($article->image) }}"/>


    <link rel="alternate" hreflang="fa" href="{{ $article->path() }}"/>
    <link rel="canonical" href="{{ $article->path() }}">


    <meta property="og:title" itemprop="headline" content="{{ $article->title }}"/>

    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ $article->path() }}"/>
    <meta property="og:description" itemprop="description" content="{{ $article->description }}"/>
    <meta property="og:site_name" content="@lang('site.seo_first_page')"/>
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:article:author" content="@lang('site.seo_first_page')"/>
    <!--<meta property="og:article:section" content="@if(isset($article->categories) && !empty($article->categories))-->
    <!--                        @foreach ($article->categories as $category)-->
    <!--                            <a href="{{ $category->path() }}">{{ $category->title }}</a>-->
    <!--                                           @endforeach-->

    <!--                    @endif" />-->
    <meta property="og:image" itemprop="image" content="{{ Storage::url($article->image) }}"/>

    <meta name="twitter:card" content="article"/>
    <!--<meta name="twitter:site" content="@FarsNews_Agency" />-->
    <meta name="twitter:title" content="{{ $article->title }}"/>
    <meta name="twitter:description" content="{{ $article->description }}"/>
    <meta name="twitter:image" content="{{ Storage::url($article->image) }}"/>

    <meta itemprop="datePublished" property="article:published_time" content="{{ $article->created_at }}"/>
    <meta itemprop="dateModified" property="article:modified"
          content="{{ !empty($article->updated_at) ? $article->updated_at  : $article->created_at }}"/>
    <meta name="thumbnail" itemprop="thumbnailUrl" content="{{ Storage::url($article->image) }}"/>
    <meta name="genre" itemprop="genre" content="News"/>
    @if(isset($article->tags) && !empty($article->tags) && count($article->tags) > 0 )

        <meta name="keywords"
              content="@foreach($article->tags as $key => $tag){{ $tag->title }}{{ $key+1!=count($article->tags)?',':''}}@endforeach"/>
    @endif
    <meta name="description" content="{{ $article->description }}"/>
    <!--<meta name="dc.Date" scheme="ISO8601" content="8/11/2021 10:12:53 AM" />-->
    <meta name="dc.identifier"
          content="{{ $article->path() }}"/>
    <!--<meta name="Fna.oid" content="14000520000162" />-->



    <script type="application/ld+json">
{
   "@context": "https://schema.org",
   "@type": "NewsArticle",
   "url": "{{ url($article->path()) }}",
   "publisher":{
      "@type":"Organization",
      "name":"ivnanews",
      "logo":"https://www.ivnanews.ir/storage//photos/1/ivnanewsw.png"
   },
   "headline": "{{ $article->title }}",
   "mainEntityOfPage": "{{ url($article->path()) }}",
   "articleBody": "{{ $article->description }}",

   "image":[  @if(isset($article->image) && !empty($article->image))
            "{{ Storage::url($article->image) }}"
      @else
            "https://www.ivnanews.ir/storage//photos/1/ivna-..-site.png"
@endif
        ],

        "datePublished":"{{ $article->created_at }}"
}













    </script>


@endsection




@section('content')
    <body>
    <div class="new-container">
        <div class="gallery">
            <div class="container mb-5 mt-5">
                <div class="title">
                    <h2>گالری</h2>
                </div>
                <div class="container">
                    @if(isset($article->galleries) && !empty($article->galleries) && count($article->galleries) > 0)
                        @foreach($article->galleries as $gallery)
                            <div class="gallery-box">
                                <div class="row">
                                    @foreach($gallery->images as $image)
                                    <div class="col-md-3">
                                        <div class="gallery-image">
                                            <i class="fa fa-eye"></i>
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($image->src) }}"
                                                 alt="{{ $image->alt }}"
                                                 height="417" width="626"/>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>

                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="share-image">
                    <div class="short-link">
                        <button onclick="myFunction()">
                            <i class="fa fa-link"></i>
                            <div value="" id="myInput">{{ url($article->short) }}</div>

                        </button>

                        <!-- The button used to copy the text -->
                    </div>
                    <div class="share-icons" id="share-icons">
                        <a href=""><i class="fa fa-whatsapp"></i></a>
                        <a href=""><i class="fa fa-telegram"></i></a>
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                @include('site.inc.comments2' , ['object' => $article , 'comments' => $comments])

            </div>
        </div>
        <div class="himage_modal">
            <div class="hclose_modal">
                <a href="javascript:void(0)">
                    <i class="fas fa-times"></i>
                </a>
            </div>

            <div class="himage_body">
                <img src="" alt="">
                <p>

                </p>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="../bootstrap/bootstrap-5.1.0-dist/bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
            integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function () {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }
    </script>
    <script>
        function closeGallery() {
            document.getElementById("myModal").style.display = "none";
        }
    </script>
    <script>
        function openSearch() {
            document.getElementById("myOverlay").style.display = "block";
            document.getElementById("myOverlay-mobile").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("myOverlay").style.display = "none";
            document.getElementById("myOverlay-mobile").style.display = "none";
        }
    </script>
    <script>
        $('.icon').click(function () {
            let clicked = $(this);
            let icons = $('.icons .icon');
            icons.removeClass('active');
            clicked.addClass('active');
        });
    </script>
    <script>
        $('.owl-item.active:first-child').hide();
    </script>
    <script>
        //Get the button
        var mybutton = document.getElementById("myBtnn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <script>

        $('#exampleModalLong').modal(options)
    </script>
    <script>
        $('#exampleModalLongg').modal(options)
    </script>
    <script>
        $('#exampleModalLong').on('shown.bs.modal', function () {
            $('#btnmobile').trigger('focus')
        })</script>
    <script>
        $(document).ready(function () {
            $('#btnmobile').click(function () {
                $('#exampleModalLong').show();
            });
        });


        // Gallery Section Scripts Start   #gallery

        $('.hclose_modal a').click(function () {

            let hModal = $('.himage_modal');

            hModal.slideUp();


        });

        $('.himage_modal:not(".himage_body")').click(function () {
            let hModal = $('.himage_modal');

            hModal.slideUp();
        });

        $('.gallery-image').click(function () {

            let hModal = $('.himage_modal');

            hModal.slideUp();

            let image = $(this).find('img');
            let imageSrc = image.attr('src');
            let imageCaption = image.attr('alt');

            if (imageCaption == null || imageCaption == '') {
                imageCaption = '';
            }


            let modal = $('.himage_body');
            let modalImg = modal.find('img');
            let modalCaption = modal.find('p');

            modalImg.attr('src', imageSrc);
            modalImg.attr('alt', imageCaption);
            modalCaption.html(imageCaption);

            hModal.slideDown();

        });


        // Gallery Section Scripts End     #gallery

    </script>
    <script>
        function myFunction() {
            /* Get the text field */
            var copyText = document.getElementById("myInput");

            /* Select the text field
            copyText.text();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.textContent);

            /* Alert the copied text */
            alert("Copied the text: " + copyText.textContent);
        }
    </script>
    </body>
@endsection
