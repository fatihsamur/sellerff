@extends('theme::emails.email-layout')

@section('content')
    <tr>
        <td align="center" style="font-size:0px;padding:10px 25px;padding-bottom:40px;word-break:break-word;">

            <div
                style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:28px;font-weight:bold;line-height:1;text-align:center;color:#555;">
                SellerFulfilment'a Hoşgeldiniz
            </div>

        </td>
    </tr>

    <tr>
        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">

            <div
                style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;line-height:22px;text-align:left;color:#555;">
                Merhaba {{ $user ?? '' }}!<br></br>
                Üyeliğiniz için teşekkür ederiz.
            </div>

        </td>
    </tr>

    <tr>
        <td align="center"
            style="font-size:0px;padding:10px 25px;padding-top:30px;padding-bottom:50px;word-break:break-word;">

            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                style="border-collapse:separate;line-height:100%;">
                <tr>
                    <td align="center" bgcolor="#2F67F6" role="presentation"
                        style="border:none;border-radius:3px;color:#ffffff;cursor:auto;padding:15px 25px;" valign="middle">
                        <p
                            style="background:#2F67F6;color:#ffffff;font-family:'Helvetica Neue',Arial,sans-serif;font-size:15px;font-weight:normal;line-height:120%;Margin:0;text-decoration:none;text-transform:none;">
                            Giriş Yap
                        </p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
@endsection
