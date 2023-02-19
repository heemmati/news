
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