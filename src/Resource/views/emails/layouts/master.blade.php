<html>
<head>
    <title>{{ config('app.name') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<body style="margin:0; padding:0; font-family: Arial; font-size:14px; background-color:#EBEBEB">
<center>
    <table width="600" cellpadding="0" cellspacing="0" style="border-collapse:collapse; font-family: Arial;" bgcolor="#fff">
        <tr>
            <td style="padding:10px 0; background-color:#EBEBEB"></td>
            <td style="padding:10px 0; background-color:#EBEBEB"></td>
        </tr>
        <tr>
            <td height="150" valign="middle" align="left" style="padding:0 0 0 40px;">
                <a href="https://www.acme.com/" target="_blank"><img src="{{ url('images/email_layout/logo.png') }}" width="236" height="75" border="0" alt="" style="display:block;"></a>
            </td>
            <td height="150" valign="middle" align="left" width="225" style="font-size:14px; color:#949494;">
                <a href="mailto:info@acme.com" target="_blank" style="color:#949494; text-decoration:none;">
                    <img src="{{ url('images/email_layout/info.png') }}" width="27" height="26" border="0" alt="" style="vertical-align:middle; margin-right:12px">info@acme.com</a><br><br>
                <img src="{{ url('images/email_layout/tel.png') }}" width="27" height="26" border="0" alt="" style="vertical-align:middle; margin-right:12px">1-888-263-0023
            </td>
        </tr>

        @yield('body')

        <tr>
            <td align="center" colspan="2" style="padding:10px 0px; font-size:14px; color:#6E6E6E; line-height:20px;" bgcolor="#EBEBEB">
                {{--Вы получили это письмо, так как подписаны на рассылку от info@acme.com<br>--}}
                {{--В любой момент Вы можете от неё <b><a href="" target="_blank" style="color:#6E6E6E;">отписаться</a></b>--}}
            </td>
        </tr>
    </table>


</center>
</body>
</html>
