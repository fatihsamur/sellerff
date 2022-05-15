<section class="appie-pricing-area pt-90 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="appie-section-title text-center">
                    <h3 class="appie-title">Plan Seçin</h3>
                    <p>Prime Üyelere Özel Ayrıcalıklardan Faydalanın.</p>
                </div>

            </div>
        </div>
        <div class="tabed-content">
            <div id="month">
                <div class="row justify-content-center">
                    @foreach (Wave\Model\Plan::all() as $plan)
                        @php $features = explode(',', $plan->features); @endphp
                        <div class="col-lg-4 col-md-6 wow animated fadeInLeft">
                            <div class="pricing-one__single">
                                <div class="pricig-heading">
                                    <h6>{{ $plan->name }}</h6>
                                    <div class="price-range"><sup>$</sup> <span>{{ $plan->price }}</span>
                                        <p>/ay</p>
                                    </div>
                                    <p>{{ $plan->description }}</p>
                                </div>
                                <div class="pricig-body">
                                    <ul>
                                        @foreach ($features as $feature)
                                            <li><i class="fal fa-check"></i> {{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                    <div class="pricing-btn mt-35">
                                        <a class="main-btn" data-plan="{{ $plan->plan_id }}"
                                            href="{{ url('/settings/plans') }}">
                                            @subscribed($plan->slug)
                                            Bu Plana Abonesiniz
                                            @notsubscribed
                                            @subscriber
                                            Geçiş Yap
                                            @notsubscriber
                                            Hemen Başlayın
                                            @endsubscriber
                                            @endsubscribed
                                        </a>
                                    </div>
                                </div>
                                @if ($plan->name == 'Prime')
                                    <div class="pricing-rebon">
                                        <span>Popüler Seçim</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
