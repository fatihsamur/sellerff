@extends('theme::emails.email-layout')

@section('content')
    <tr>
        <td align="center" style="font-size:0px;padding:10px 25px;padding-bottom:40px;word-break:break-word;">

            <div
                style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:28px;font-weight:bold;line-height:1;text-align:center;color:#555;">
                Koli Bilgilerinizi Tamamlayın
            </div>

        </td>
    </tr>

    <tr>
        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">

            <div
                style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;line-height:22px;text-align:left;color:#555;">
                Merhaba {{ $user ?? '' }}<br></br>

                {{ $order_number ?? 0 }} Numaralı Siparişinizin FBA hazırlık ve etiketleme işlemleri tamamlanarak<br></br>
                FBA  kolilerinizin ölçü ve ağırlık bilgileri siparişinize kaydedilmiştir.  Siparişinizdeki Koli Etiketlerini Tamamlamanız Lütfen Amazon satıcı hesabınızda,
                sağladığımız bilgilere göre Amazon kargo planını oluşturunuz ve kutu etiketlerinizi siparişinizin içerisine yükleyiniz.<br></br>
                Teşekkür ederiz.
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
