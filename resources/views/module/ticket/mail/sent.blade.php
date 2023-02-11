<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>کد تایید شما برای ثبت نام در سایت :</title>

    <style>
        .box{
            width: 90%;
            margin: auto;
            margin: auto;
            box-shadow: 0px 0px 15px -7px #b0b0b0;
            padding: 20px;
            text-align: center;
            display: flex;
            height: 340px;
        }
        .box_desc , .box_image{
            width: 50%;
        }
        .box_desc{
            display: flex;
            flex-direction: column;
        }

        .box_image img{
            height: 100%;
            object-fit: contain;
        }
        .box img{
            width: 100%;
        }

        .box_desc img{
            width: 90%;
            margin: auto;
            display: block;
        }

        .box_desc h6{
            font-size: 23px;
            letter-spacing: 23px;
        }

    </style>
</head>
<body>
<div class="box">
    <div class="box_image">
        @if(isset($email_sent->getItem('background')->image) && !empty($email_sent->getItem('background')->image))
            <img src="{{ \Illuminate\Support\Facades\Storage::url($email_sent->getItem('background')->image) }}"/>
        @endif
    </div>
    <div class="box_desc">

        @if(isset($main_setting->getItem('logo')->image) && !empty($main_setting->getItem('logo')->image))
            <img src="{{ \Illuminate\Support\Facades\Storage::url($main_setting->getItem('logo')->image) }}"/>
        @endif
            @if($reply)

                <h3>
                    کاربر گرامی پاسخی برای تیکت شما با شماره پیگیری
                    {{ $ticket->code }}
                    ارسال گردید!
                </h3>

            @else

                <h3>
                    تیکت شما به شماره پی گیری
                    {{ $ticket->code }}
                    با موفقیت ارسال شد!
                </h3>

                <h4>{{$ticket->title}}</h4>
            @endif

    </div>

</div>

</body>
</html>


