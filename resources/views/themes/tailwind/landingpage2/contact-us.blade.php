@extends('theme::landingpage2.layout')


@section('content')
    <div class="appie-page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="appie-page-title-item">
                        <h3 class="title">Bize Ulaşın</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact--info-area">
                        <h3>İletişimde Kalın</h3>
                        <p>
                            Yardıma İhtiyacınız varsa bizimle iletişime geçebilirsiniz.
                        </p>
                        <div class="single-info">
                            <h5>Adres</h5>
                            <p>
                                <i class="fal fa-home"></i>
                                5659 W Taylor St. Chicago,<br> Illinois 60644 United States
                            </p>
                        </div>
                        <div class="single-info">
                            <h5>Telefon</h5>
                            <p>
                                <i class="fal fa-phone"></i>
                                +(1) 7862385215
                            </p>
                        </div>
                        <div class="single-info">
                            <h5>Support</h5>
                            <p>
                                <i class="fal fa-envelope"></i>
                                info@sellerfulfilment.com<br>
                            </p>
                        </div>
                    </div>
                </div>
                @livewire('contact')
            </div>
        </div>
    </section>

@endsection
