@extends('theme::emails.email-layout')

@section('content')
    <tr>
        <td align="center" style="font-size:0px;padding:10px 25px;padding-bottom:40px;word-break:break-word;">

            <div
                style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:28px;font-weight:bold;line-height:1;text-align:center;color:#555;">
                Lütfen Bekleyen Siparişinizin Ödemesini Tamamlayın
            </div>

        </td>
    </tr>

    <tr>
        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">

            <div
                style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;line-height:22px;text-align:left;color:#555;">
                {{$order_number}} 'nolu siparişinizin ödemesi yapılmamıştır. işlemlere devam edebilmemiz için ödemenizi yapmanız ve siparişinizin içerisine gözat linki ile girerek eksik bilgileri güncellemeniz gerekmektedir. Siparişiniz hakkında bir sorununuz var ise support@sellerfulfilment.com adresine mail gönderebilirsiniz. Bizi tercih ettiğiniz için teşekkür ederiz
            </div>

        </td>
    </tr>


@endsection
