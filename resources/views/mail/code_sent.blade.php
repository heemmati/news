<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>کد تایید</title>
</head>
<body>

<div class="main" style="margin: 10px auto; max-width: 600px;height: 100%;">
    <table cellpadding="0" cellspacing="0" style="font-size: 0; width: 100%;height: 100%;" align="center" border="0">
        <tbody>
        <tr>
            <td style="text-align: center;vertical-align: top;border: 2px solid #eeeeee;direction: ltr;font-size: 0px;padding: 20px 0px;padding-bottom: 1px;padding-top: 15px;">

                <div style="margin: 0 auto; max-width: 600px;background-color: #fff;">
                    <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff" align="center" border="0">
                        <tbody>
                        <tr>
                            <td style="text-align:center;vertical-align:top;border-bottom:1px solid #d8d8d8;direction:ltr;font-size:0px;padding:20px 0px;padding-bottom:15px;padding-top:0px">
                                <div style="vertical-align:top;display:inline-block;font-size:0px;line-height:0px;text-align:left;width:100%">
                                    <div style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:50%">
                                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                            <tbody>
                                            <tr>
                                                <td style="word-wrap:break-word;font-size:0px;padding:10px 25px" align="left">
                                                    <table cellpadding="0" cellspacing="0" style="color:#000;font-family:Ubuntu,Helvetica,Arial,sans-serif,vazir;font-size:13px;line-height:22px;table-layout:auto" width="100%" border="0">
                                                        <tbody>
                                                        <tr>
                                                            <td style="text-align:right;width:10px">
                                                                <i class="fa fa-phone" aria-hidden="true" style="font-size: 25px;transform: rotate(90deg);color: rgba(0,0,0,0.8);"></i>
                                                            </td>
                                                            <td>
                                                                <p style="white-space:nowrap;padding-left:5px;font-family:'iransans';color:#646464; margin: auto;">
																                        <span>
																                        <a href="tel:02122200000" target="_blank">
																                     ۰۲۱ - ۲۲۲۰۰۰۰۰
																                        </a>
																                     </span>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:50%">
                                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                            <tbody>
                                            <tr>
                                                <td style="word-wrap:break-word;font-size:0px;padding:10px 25px" align="right">
                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px" align="right" border="0">
                                                        <tbody>
                                                        <tr>
                                                            <td style="width:240px">
                                                                <a href="#"><img alt="" height="auto" src="{{ \Illuminate\Support\Facades\Storage::url($main_setting->getItem('logo')->image) }}" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto" width="240"></a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin: 0 auto; max-width: 600px;background-color: #fff;">
                    <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff" align="center" border="0">
                        <tbody>
                        <tr>
                            <td style="text-align: center;vertical-align: top;padding: 20px 0;">
                                <div style="width: 100%;vertical-align: top;display: inline-block;">
                                    <table role="presentation" cellpadding="0" cellspacing="0" align="center" border="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td style="padding:20px 25px;">
                                                <div style="font-size: 13px;color: #eb3e32;font-weight: bold;line-height: 22px;text-align: center;"><span>کد تایید دیجی آفاق
                                                    </span>
                                                    <span>
                                                        {{ $email }}
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 20px;width: 100%;margin: 0 auto;text-align: right;">
                                                <div style="font-size: 13px;line-height: 22px; color: #000;text-align: right;margin: 0 5%;">
                                                    <span style="display: block;direction: rtl;">کاربر گرامی<br> کد یک بار مصرف زیر را در کادر باز شده در سایت دیجی&zwnj;آفاق وارد کنید تا حساب شما تایید  شود.</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="font-weight: bold;font-size: 15px;color: #eb3e32;text-align: center;margin-bottom: 50px;margin-top: 10px;">
																	<span>
																		{{ $code }}
																	</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 20px;width: 100%;margin: 0 auto;text-align: right;">
                                                <div style="font-size: 13px;font-weight: bold;text-align: right;margin: 0 5%">
                                                    <span style="display: block;margin-bottom: 8px;">سپاس از همراهی شما</span>
                                                    <span ><a href="#" style="color: #eb3e32f5">فروشگاه اینترنتی دیجی&zwnj;آفاق</a></span>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

{{--                <div style="margin: 0 auto; max-width: 600px;background-color: #292929;">--}}
{{--                    <table role="presentation" cellpadding="0" cellspacing="0" style="font-size: 0;width: 100%; background-color: #292929;border-top: 4px solid #eb3e32;">--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <td style="text-align: center;padding: 5px 0;vertical-align: top;font-size: 0px;">--}}
{{--                                <div style="font-size: 13px;display: inline-block;vertical-align: top;width: 100%;">--}}
{{--                                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%">--}}
{{--                                        <tbody>--}}
{{--                                        <tr>--}}
{{--                                            <td style="word-wrap: break-word;padding: 10px 25px;padding-bottom: 0;">--}}
{{--                                                <div style="font-size: 12px;line-height: 22px;text-align: center;color: #fff">تهران، خیابان کوچه، پلاک</div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td style="word-wrap: break-word;padding: 10px 25px;padding-bottom: 0;">--}}
{{--                                                <div style="font-size: 12px;line-height: 22px;text-align: center;color: #fff;direction: rtl;">پست الکترونیکی: <a href="mailto:support@digiafagh.com" style="color: #eb3e32">support@digiafagh.com</a></div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}

{{--                                        <tr>--}}
{{--                                            <td style="word-wrap: break-word;padding: 10px 25px;padding-bottom: 0;">--}}
{{--                                                <div style="font-size: 12px;text-align: center;">--}}
{{--                                                    <ul>--}}
{{--                                                        <li style="display: inline-block;margin-right: 8px;"><a href="#"><i class="fa fa-twitter" style="color: #fff; background-color: rgba(0,0,0, 0.3); padding: 7px;border-radius: 50%;font-size: 13px;border: .7px dashed #ffffff88;"></i></a></li>--}}
{{--                                                        <li style="display: inline-block;margin-right: 8px;"><a href="#"><i class="fa fa-linkedin" style="color: #fff; background-color: rgba(0,0,0, 0.3); padding: 7px;border-radius: 50%;font-size: 13px;border: .7px dashed #ffffff88;"></i></a></li>--}}
{{--                                                        <li style="display: inline-block;margin-right: 8px;"><a href="#"><i class="fa fa-instagram" style="color: #fff; background-color: rgba(0,0,0, 0.3); padding: 7px;border-radius: 50%;font-size: 13px;border: .7px dashed #ffffff88;"></i></a></li>--}}
{{--                                                        <li style="display: inline-block;margin-right: 8px;"><a href="#"><i class="fa fa-telegram" style="color: #fff; background-color: rgba(0,0,0, 0.3); padding: 7px;border-radius: 50%;font-size: 13px;border: .7px dashed #ffffff88;"></i></a></li>--}}
{{--                                                        <li style="display: inline-block;"><a href="#"><i class="fa fa-youtube" style="color: #fff; background-color: rgba(0,0,0, 0.3); padding: 7px;border-radius: 50%;font-size: 13px;border: .7px dashed #ffffff88;"></i></a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}

{{--                    </table>--}}
{{--                </div>--}}
            </td>
        </tr>
        </tbody>
    </table>
</div>

</body>
</html>

