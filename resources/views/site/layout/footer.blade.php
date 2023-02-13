
    <footer id="part--footer">
        <div class="footer-body">
            <div class="footer-bottom1">
    <div class="footer">
        <div class="container ">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div id="footer-text1">
                        <h3> تماس با ما</h3>






        <span>@lang('site.sahand_contact_footer')</span>

    <p>

        <span>
            <a href="mailto:info@sahandpress.ir">info@sahandpress.ir</a>
        </span>
    </p>                </div>
                </div>
                @if (isset($categories) && !empty($categories))

                        <div class="col-xs-12 col-sm-6 col-md-3">

                            <div id="footer-text21">
                                <h3> گروه های خبری</h3>
                                <ul class="row">
                                    @foreach($categories as $category)
                                    <div class="col-md-4">
                                        <li>
                                            <a href="{{ $category->path() }}" target="_blank" title="{{ $category->title }}">{{ $category->title }}</a>
                                        </li>
                                    </div>

                                    @endforeach







                                </ul>
                            </div>
                        </div>

                @endif

                @if (isset($socials) && !empty($socials))
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div id="footer-social">
                            <h3> شبکه های اجتماعی </h3>

                            <ul>

                                <li><a target="_blank" title="اینستاگرام" href="{{ $socials['instagram']->print }}"> <img src="https://www.tehranrasaneh.ir/frontend/images/Instagram-v051916_200.png" alt=""></a></li>

                                <li><a target="_blank" title="واتسآپ" href="{{ $socials['watsapp']->print }}"> <img src="https://www.tehranrasaneh.ir/frontend/images/img99.png" alt=""> </a></li>


                                <li><a target="_blank" title="تلگرام" href="{{ $socials['telegram']->print }}"> <img src="https://www.tehranrasaneh.ir/frontend/images/Telegram_logo.svg.png" alt=""> </a></li>

                                <li><a target="_blank" title="آپارات" href="{{ $socials['aparat']->print }}"> <img src="https://www.tehranrasaneh.ir/frontend/images/aparat.png" alt=""> </a></li>


                            </ul>





                        </div>
                    </div>
                @endif

                @if (isset($quick_menu_items) && !empty($quick_menu_items))
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div id="footer-text2">
                            <h3> دسترسی سریع </h3>
                            <ul class="row">
                                @foreach($quick_menu_items as $item)
                                <div class="col-md-4">
                                    <li>
                                        <a href="{{ $item->link }}" target="_blank" title="{{ $item->title }}">{{ $item->title }}</a>
                                    </li>
                                </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </div>





    </div> </div>
        <div class="footer-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                            <div class="footer-social-link">
                                <div class="social-link">
                                    <a href="{{ $socials['watsapp']->print }}"><i class="fab fa-whatsapp"></i> <span> </span></a>
                                    <a href="{{ $socials['telegram']->print }}"><i class="fab fa-twitter"></i>  <span> </span></a>
                                    <a href="#"><i class="{{ $socials['instagram']->print }}"></i>  <span> </span></a>

                                </div>
                            </div>

                    </div>
                    <div class="col-xs-12 col-sm-6">

                <div class="copy-right">
                    <p class="eng--font">طراحی سایت و بهینه سازی شده توسط : <a href="https://inten.asia">شرکت اینتن</a></p>
                </div>
                    </div>



                </div>

            </div>
        </div>
    </footer>

    <script src="{{ url('hadiloo-theme') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('hadiloo-theme') }}/js/owl.carousel.js"></script>

    <!--mega menu-->

    <script>
                $(document).ready(function() {
                  $('.demos').owlCarousel({
                    loop: true,
                    margin: 15, nav: true,
     autoplay:true, dots: true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,	  navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
                    responsiveClass: true,
                    responsive: {
                      0: {
                        items: 1,
                        nav: true
                      },
                      1000: {
                        items: 2,dots:true,
                        nav: true
                      },
                      1200: {
                        items: 5,
                        nav: true,
                        loop: true,
                        margin: 15
                      }
                    }
                  })
                })

        $(document).ready(function () {
            $('.row-item1').owlCarousel({
                loop: true,
                margin: 10, items: 4,  nav: false,
                responsiveClass: true, dots: true,
                responsive: {
                    0: {
                        items: 1, margin: 10,
                        nav: true, dots: true,
                    },
                    600: {
                        items: 2, margin: 10,
                        nav: true, dots: true,
                    },
                    1000: {
                        items: 4,
                        nav: false, dots: true,
                        loop: true,
                        margin: 10
                    }
                }
            })
               $('.row-item85').owlCarousel({
                loop: true,
                margin: 10, items: 3,  nav: false,
                responsiveClass: true, dots: true,
                responsive: {
                    0: {
                        items: 1, margin: 10,
                        nav: true, dots: true,
                    },
                    600: {
                        items: 2, margin: 10,
                        nav: true, dots: true,
                    },
                    1000: {
                        items: 3,
                        nav: false, dots: true,
                        loop: true,
                        margin: 10
                    }
                }
            })
        })


    </script>

    <!--back to top-->
    <script>
        $(document).ready(function () {
            $('body').append('<div id="scrollTop" class="btn btn-success"><div class="circle"><div class="wave"><i class="fas fa-angle-double-up"></i><span class="glyphicon glyphicon glyphicon-arrow-up"></span></div></div></div>');
            $(window).scroll(function () {
                if ($(this).scrollTop() != 0) {
                    $('#scrollTop').fadeIn();
                } else {
                    $('#scrollTop').fadeOut();
                }
            });

            $('#scrollTop').on('click', function (e) {
                e.preventDefault();
                $('html, body').animate({scrollTop: 0}, '3000');
            });
            
            
                    




        });
        



    </script>




    </body>
    </html>
