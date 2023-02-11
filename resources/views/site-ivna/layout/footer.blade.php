
<footer>
    <div class="footer">
        <div class="container">
            <div class="footer-items">
                <div class="row">
                    <div class="col-md-6">
                        <div class="logo">
                            <div class="logo-image">
                                <a href="{{ url('/') }}">
                                    @ischeck($general['logo'])
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($general['logo']->print) }}"
                                         height="70" width="294" alt="{{ __('site.site_name') }}">
                                    @endischeck
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="page">
                            <ul>
                                <li>
                                    <a href="{{ route('site.images') }}">
                                        عکس
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('site.videos') }}">
                                        فیلم
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('site.about') }}">
                                        درباره ما
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('site.contact') }}">
                                        تماس با ما
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-desc">
                            <p>
                                @lang('site.eng_copy_right')
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-box">
                <div class="row">
                    <div class="col-md-6">
                        <div class="copy-right">
                            <p>

                                تمام حقوق این وب سایت برای <strong>پایگاه خبری ایونانیوز</strong> محفوظ است
                            </p>
                            <p>

                                <a href="https://inten.asia">
                                    طراحی سایت
                                </a>
                                و
                                <a href="https://inten.asia">بهینه سازی</a>
                                توسط اینتن
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="share">
                            <a href="{{ $socials['facebook']->print }}">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="{{ $socials['twitter']->print }}">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="{{ $socials['instagram']->print }}">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a href="{{ $socials['telegram']->print }}">
                                <i class="fa fa-telegram"></i>
                            </a>
                            <div class="aparat">
                                <a href="{{ $socials['aparat']->print }}">
                                    <svg id="Group_2708" data-name="Group 2708" xmlns="http://www.w3.org/2000/svg"
                                         width="15.78" height="15.8" viewBox="0 0 15.78 15.8">
                                        <g id="Group_2706" data-name="Group 2706" transform="translate(0 0)">
                                            <g id="Group_6222" data-name="Group 6222" transform="translate(0 0)">
                                                <g id="logo_aparat" data-name="logo aparat"
                                                   transform="translate(0 0)">
                                                    <path id="Path_1" data-name="Path 1"
                                                          d="M11.581.454,10.17.074A2.157,2.157,0,0,0,7.53,1.6L7.15,3.008A6.927,6.927,0,0,1,11.577.454"
                                                          transform="translate(-5.299 0)" fill="#fff"></path>
                                                    <path id="Path_2" data-name="Path 2"
                                                          d="M47.031,11.69l.38-1.411a2.157,2.157,0,0,0-1.542-2.627l-1.411-.38A6.927,6.927,0,0,1,47.013,11.7"
                                                          transform="translate(-31.7 -5.389)" fill="#fff"></path>
                                                    <path id="Path_3" data-name="Path 3"
                                                          d="M.453,31.935l-.38,1.411A2.157,2.157,0,0,0,1.6,35.986l1.411.38A6.927,6.927,0,0,1,.453,31.939"
                                                          transform="translate(0 -22.417)" fill="#fff"></path>
                                                    <path id="Path_4" data-name="Path 4"
                                                          d="M31.865,47.136l1.411.38a2.157,2.157,0,0,0,2.64-1.524l.38-1.411a6.928,6.928,0,0,1-4.427,2.555"
                                                          transform="translate(-22.367 -31.789)" fill="#fff"></path>
                                                    <path id="Path_5" data-name="Path 5"
                                                          d="M12.365,3.929a6.955,6.955,0,1,0,4.917,8.519v0a6.956,6.956,0,0,0-4.918-8.516M9.325,5.772A1.913,1.913,0,1,1,6.984,7.128v0a1.912,1.912,0,0,1,2.34-1.351M7.06,14.218A1.913,1.913,0,1,1,9.4,12.863v0a1.913,1.913,0,0,1-2.34,1.351m2.7-3.812a.85.85,0,1,1,.6,1.039h0a.85.85,0,0,1-.6-1.039m2.052,5.1a1.913,1.913,0,1,1,2.341-1.355v0a1.912,1.912,0,0,1-2.34,1.351m1.277-4.77a1.913,1.913,0,1,1,2.341-1.355v0a1.912,1.912,0,0,1-2.34,1.351"
                                                          transform="translate(-2.674 -2.735)" fill="#fff"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
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
    $('.slider1').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
</script>
<script>
    $('.slider2').owlCarousel({
        stagePadding: 250,
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                stagePadding: 50,
                items: 1
            },
            600: {
                items: 3
            },
            1000: {

                items: 3
            }
        }
    })
</script>
<script>
    $('.slider3').owlCarousel({
        stagePadding: 250,
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                stagePadding: 50,
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
</script>
<script>
    $('.slider4').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
</script>
<script>
    $('.slider5').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
</script>


@yield('scriptus')

</body>
</html>

