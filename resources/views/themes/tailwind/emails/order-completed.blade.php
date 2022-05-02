@extends('theme::emails.email-layout')

@section('content')
    <tr>
        <td align="center" style="font-size:0px;padding:10px 25px;padding-bottom:40px;word-break:break-word;">

            <div
                style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:28px;font-weight:bold;line-height:1;text-align:center;color:#555;">
                Siparişiniz Tamamlandı
            </div>

        </td>
    </tr>

    <tr>
        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">

            <div
                style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;line-height:22px;text-align:left;color:#555;">
                {{$order_number}} Numaralı siparişinizin işlemleri tamamlanmıştır. <br></br>
                Gönderi takip numaralarınız  Takip numaranızı amazon satıcı hesabınıza ilgili gönderim planına işlemiyi unutmayınız. <br></br>
                Bizi tercih ettiğiniz için teşekkür ederiz.
            </div>

        </td>
    </tr>

    <tr>
        <td align="center"
            style="font-size:0px;padding:10px 25px;padding-top:30px;padding-bottom:50px;word-break:break-word;">

            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                style="border-collapse:separate;line-height:100%;">

            </table>

        </td>
    </tr>
@endsection
