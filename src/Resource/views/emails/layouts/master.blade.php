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
                @if(config('mail-sender.logo_url'))
                    <a href="#" target="_blank"><img src="{{ config('mail-sender.logo_url') }}" border="0" alt="" style="display:block;"></a>
                @endif
            </td>
            <td height="150" valign="middle" align="left" width="225" style="font-size:14px; color:#949494;">
                @if(config('mail-sender.email'))
                    <a href="mailto:{{ config('mail-sender.email') }}" target="_blank" style="color:#949494; text-decoration:none;">
                        {{ config('mail-sender.email') }}</a><br><br>
                @endif
                @if(config('mail-sender.phone'))
                    {{ config('mail-sender.phone') }}
                @endif
            </td>
        </tr>

        @yield('body')

        <tr>
            <td align="center" colspan="2" style="padding:10px 0px; font-size:14px; color:#6E6E6E; line-height:20px;" bgcolor="#EBEBEB">
                {{--Footer--}}
            </td>
        </tr>
    </table>


</center>
</body>
</html>
