@extends('theme::landingpage/landing-layout')

@section("content")
<!-- ====== Navbar Section Start -->
<div class="ud-header absolute top-0 left-0 z-40 flex w-full items-center bg-transparent">
  <div class="container">
    <div class="relative -mx-4 flex items-center justify-between">
      <div class="w-60 max-w-full px-4">
        <a href="{{ url('/') }}" class="navbar-logo  block w-full py-5">
          <img src="{{ asset('themes/' . $theme->folder . '/images/landing/logo/logo-white.svg') }}" alt="logo" class="header-logo w-full" />
        </a>
      </div>
      <div class="flex w-full items-center justify-between px-4">
        <div>
          <button id="navbarToggler" class="absolute right-4 top-1/2  block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden">
            <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
            <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
            <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
          </button>
          <nav id="navbarCollapse" class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:py-0 lg:px-4 lg:shadow-none xl:px-6">
            <ul class="blcok lg:flex">
              <li class="group relative">
                <a href="{{ url('/') }}" class=" mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70">
                  Anasayfa
                </a>
              </li>
              <li class="group relative">
                <a href="{{ url('/') }}#features" class=" mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                  Özellikler
                </a>
              </li>
              <li class="group relative">
                <a href="{{ url('/') }}#pricing" class=" mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                  Ücretler
                </a>
              </li>
              <li class="group relative">
                <a href="{{ url('/') }}#faq" class=" mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                  S.S.S
                </a>
              </li>
              <li class="group relative">
                <a href="{{ url('/') }}#contact" class=" mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                  İletişim
                </a>
              </li>
              {{-- <li class="group relative">
                <a href="{{ url('landing-blog') }}" class=" mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
              Blog
              </a>
              </li> --}}
            </ul>

          </nav>
        </div>
        <div class="hidden justify-end pr-16 sm:flex lg:pr-0">
          <a href="{{ url('/login') }}" class="loginBtn py-3 px-7 text-base font-medium text-white hover:opacity-70">

            Giriş
          </a>
          <a href="{{ url('/register') }}" class="signUpBtn rounded-lg bg-white bg-opacity-20 py-3 px-6 text-base font-medium text-white duration-300 ease-in-out hover:bg-opacity-100 hover:text-dark">

            Kaydol
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ====== Navbar Section End -->

<!-- ====== Banner Section Start -->
<div class="relative z-10 overflow-hidden bg-primary  pt-[100px] pb-[80px] md:pt-[130px] lg:pt-[160px]">
  <div class="container">
    <div class="-mx-4 flex flex-wrap items-center">
      <div class="w-full px-4">
        <div class="text-center  ">
          <h1 class="text-4xl  font-semibold text-primary md:text-white">Hizmet Şartları ve Gizlilik Politikası </h1>
        </div>
      </div>
    </div>
  </div>
  <div>
    <span class="absolute top-0 left-0 z-[-1]">
      <svg width="495" height="470" viewBox="0 0 495 470" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="55" cy="442" r="138" stroke="white" stroke-opacity="0.04" stroke-width="50" />
        <circle cx="446" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20" />
        <path d="M245.406 137.609L233.985 94.9852L276.609 106.406L245.406 137.609Z" stroke="white" stroke-opacity="0.08" stroke-width="12" />
      </svg>
    </span>
    <span class="absolute top-0 right-0 z-[-1]">
      <svg width="493" height="470" viewBox="0 0 493 470" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="462" cy="5" r="138" stroke="white" stroke-opacity="0.04" stroke-width="50" />
        <circle cx="49" cy="470" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20" />
        <path d="M222.393 226.701L272.808 213.192L259.299 263.607L222.393 226.701Z" stroke="white" stroke-opacity="0.06" stroke-width="13" />
      </svg>
    </span>
  </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#3056D3" fill-opacity="1" d="M0,160L80,165.3C160,171,320,181,480,170.7C640,160,800,128,960,112C1120,96,1280,96,1360,96L1440,96L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
  </path>
</svg>
<!-- ====== Banner Section End -->


<!-- ====== About Section Start -->
<section id="about" class="bg-[#f3f4fe] pt-20 pb-20 lg:pt-[120px] lg:pb-[120px]">
  <h1 class="mb-6 text-3xl font-bold text-center text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
    HİZMET ŞARTLARI VE GİZLİLİK POLİTİKASI

  </h1>



  <div class="container">
    <div class="wow fadeInUp bg-white" data-wow-delay=".2s">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full text-center px-8">


          <h2 class="mb-6 text-3xl font-bold text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
            TARAFLAR

          </h2>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            • 1. www.sellerfulfilment.com internet sitesinin faaliyetlerini yürüten, Amerika Ülkesinde kayıtlı BRK EXPRESS SHOP LLC (bundan sonra “SellerFulfilment” olarak anılacaktır)
          </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            • 2. www.sellerfulfilment.com internet sitesine üye olan internet kullanıcısı
            (bundan sonra “ÜYE” olarak anılacaktır.
          </p>

          <h2 class="mb-6 text-3xl font-bold text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
            KULLANIM KOŞULLARI


          </h2>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            İşbu kullanım koşullarını “SellerFulfilment” gerektiği zaman değiştirebilir; ancak bu değişiklikler düzenli olarak SellerFulfilment’de yayınlanacak ve aynı tarihten itibaren geçerli olacaktır.

          </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            SellerFulfilment hizmetlerinden yararlanan ve SellerFulfilment’e erişim sağlayan her gerçek ve tüzel kişi, BRK EXPRESS SHOP LLC tarafından işbu kullanım koşulları hükümlerinde yapılan her değişikliği, önceden kabul etmiş sayılmaktadır.

          </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            BRK EXPRESS SHOP LLC SellerFulfilment’de yer alan veya alacak olan bilgileri, formları ve içeriği dilediği zaman değiştirme hakkını saklı tutmaktadır.
          </p>

          <h2 class="mb-6 text-3xl font-bold text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
            SÖZLEŞMENİN KONUSU

          </h2>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            İşbu Sözleşme’nin konusu BRK EXPRESS SHOP LLC’nin sahip olduğu internet sitesi SellerFulfilment’den “Üye”nin faydalanma şartlarının belirlenmesidir.
          </p>
          <h2 class="mb-6 text-3xl font-bold text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
            TARAFLARIN HAK VE YÜKÜMLÜLÜKLERİ
          </h2>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            Üye, SellerFulfilment internet sitesine kayıt olurken verdiği kişisel ve diğer sair bilgilerin kanunlar önünde doğru olduğunu, SellerFulfilment’in bu bilgilerin gerçeğe aykırılığı nedeniyle uğrayacağı tüm zararları aynen ve derhal tazmin edeceğini beyan ve taahhüt eder.

          </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            Üye, SellerFulfilment tarafından kendisine verilmiş olan şifreyi başka kişi ya da kuruluşlara veremez, üyenin söz konusu şifreyi kullanma hakkı bizzat kendisine aittir. Bu sebeple doğabilecek tüm sorumluluk ile üçüncü kişiler veya yetkili merciler tarafından SellerFulfilment’e karşı ileri sürülebilecek tüm iddia ve taleplere karşı,

          </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            SellerFulfilment’in söz konusu izinsiz kullanımdan kaynaklanan her türlü tazminat ve sair talep hakkı saklıdır.
          </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            Üye SellerFulfilment internet sitesini kullanırken yasal mevzuat hükümlerine riayet etmeyi ve bunları ihlal etmemeyi baştan kabul ve taahhüt eder. Aksi takdirde, doğacak tüm hukuki ve cezai yükümlülükler tamamen ve münhasıran üyeyi bağlayacaktır.
          </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            SellerFulfilment, üye verilerinin yetkisiz kişilerce okunmasından ve üye yazılım ve verilerine gelebilecek zararlardan dolayı sorumlu olmayacaktır. Üye, SellerFulfilment internet sitesinin kullanılmasından dolayı uğrayabileceği herhangi bir zarar yüzünden SellerFulfilment’den tazminat talep etmemeyi peşinen kabul etmiştir.
            SellerFulfilment'in her zaman tek taraflı olarak gerektiğinde üyenin üyeliğini silme ve hesabını bloke etme hakkı vardır. Üye işbu tasarrufu önceden kabul eder. Bu durumda, SellerFulfilment’in hiçbir sorumluluğu yoktur.
          </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            SellerFulfilment internet sitesi yazılım ve tasarımı SellerFulfilment mülkiyetinde olup, bunlara ilişkin telif hakkı ve/veya diğer fikri mülkiyet hakları ilgili kanunlarca korunmakta olup, bunlar üye tarafından izinsiz kullanılamaz, iktisap edilemez ve değiştirilemez. Bu web sitesinde adı geçen başkaca şirketler ve ürünleri sahiplerinin ticari markalarıdır ve ayrıca fikri mülkiyet hakları kapsamında korunmaktadır.

          </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            SellerFulfilment sitenin içeriğini ve tasarımını dilediği zaman değiştirme, kullanıcılara sağlanan herhangi bir hizmeti değiştirme ya da sona erdirme veya SellerFulfilment web sitesi’nde kayıtlı kullanıcı bilgi ve verilerini silme hakkını saklı tutar.
            SellerFulfilment, güvenlik riski oluşturabileceğine karar verdiği üyenin üyeliğini silme ve hesabını engelleme hakkına sahiptir. Üye bu tasarrufu önceden kabul eder. Bu durumda, SellerFulfilment'in hiçbir sorumluluğu yoktur.


          </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            SellerFulfilment, üyelik sözleşmesinin koşullarını hiçbir şekil ve surette ön ihbara ve/veya ihtara gerek kalmaksızın her zaman değiştirebilir, güncelleyebilir veya iptal edebilir. Değiştirilen, güncellenen ya da yürürlükten kaldırılan her hüküm, yayın tarihinde tüm üyeler bakımından hüküm ifade edecektir.

          </p>

          <h2 class="mb-6 text-3xl font-bold text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
            HİZMET ŞARTLARI

          </h2>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            SellerFulfilment, Amazon satıcılarının FBA gönderilerinin depo tarafından yerine getirilerek Amazon depolarına gönderilmesi sürecinde müşteriye hizmet sunan bir firmadır.

          </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            Nakliye ücreti, göndereceğiniz ülkeye, ürünün boyut ve ağırlık bilgilerine göre otomatik olarak sipariş oluştururken hesaplanır
          </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">

            Oluşturduğunuz siparişleriniz depoya geldiğinde boyut ve ağırlık bilgileri kontrol edilir. Eğer ürünlerin boyut ve ağırlıkları Amazon.com'da yanlış olarak girilmişse nakliye ücreti eksik olarak hesaplanabilir. Nakliye ücretinin, hesaplanan ücretten fazla tutması durumunda kalan tutar üyeye ekstra olarak faturalandırılır. Nakliye ücretinin fazla olarak hesaplanmış ise fazla tutar üyenin hesabınıza iade edilir.
          </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">

            Ürünleriniz depoya ulaştığında, paketleriniz kontrol edilir. Paketinizin yada ürününüzün hasarlı olması durumunda üyeye bilgi verilir. Eğer yeterli krediniz yoksa ürün depodan çıkış yapılmaz. Depoda 10 günden fazla bekleyen ödenmemiş gönderileriniz olduğunda, 10. günden sonraki her gün için üyeye $3 yer işgaliye bedeli yansıtılır.</p>

          <p class="mb-9 text-base leading-relaxed text-body-color">

            Yasaklanmış, hasar görmüş, sipariş numarası belirsiz, yanlış sipariş numarası olan veya Amazon'a iade edilmesi talep edilen ürünleriniz olabilir. Bu durumlarda üye ile iletişime geçilerek uygun eylemlerin yapması istedir.

          </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">

            Ürünlerinizin depoya teslim edildiğini ancak 3 gün içinde bir işlem yapılmadığını görüyorsanız, ürünlerinizin teslimatı ile ilgili bir sorun olduğu anlamına gelebilir. Bu durumda üyenin mutlaka ilgili siparişi için destek ekibimizle iletişime geçmesi gerekir.</p>
          <p class="mb-9 text-base leading-relaxed text-body-color">

            Üye tarafından oluşturulan siparişteki tüm ürünlerin depoya ulaştıktan sonra sipariş işlenmeye başlanır. Siparişiniz işlenmesi sırasında Amazon FBA gönderileri için üyeye kutu bilgileri gönderilir. Üye tarafından kutu bilgilerinin depoya geç gönderilmesinden kaynaklı tüm sorumluluk üyeye aittir.</p>
          <p class="mb-9 text-base leading-relaxed text-body-color">

            Bazı durumlarda, Amazon.com’dan sipariş verdiğiniz ürünler, kargo firması tarafında ürün teslim edildi olarak görünse de, ürünleriniz SellerFulfilment deposuna ulaşmayabilir. Bu durumda üyenin ürünleri yeniden depoya göndermesi istenebilir.

          </p>

          <p class="mb-9 text-base leading-relaxed text-body-color">

            Üye tarafından depomuza gönderilen siparişindeki ürünler SellerFulfilment deposuna teslim ederken ürünler kırılmış, hasar görmüş yani gönderiye uygun olmayacak şekilde teslim edebilir. Bu durumda üye tarafından yeniden depoya ürünlerin gönderilmesi istenebilir. </p>

          <p class="mb-9 text-base leading-relaxed text-body-color">

            SellerFulfilment deposuna gelen ürünleriniz, hesabınızda yeterli miktarda bakiye varsa ve üye tarafından sağlanması gereken bilgiler depoya tam olarak iletilmiş ise 1 gün içerisinde çıkışı yapılır.. Hafta sonu gönderim yapılmadığından Cuma günü depoya gelen gönderiniz Pazartesi çıkış yapabilir. </p>

          <p class="mb-9 text-base leading-relaxed text-body-color">

            Müşterinize gönderilmek üzere yola çıkan gönderileriniz kaybolduğunda, teslim edilemediğinde yada gümrükte takıldığında SellerFulfilment bu durumdan sorumlu tutulamaz. </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            Ürünlerin ilgili taşıyıcılar tarafından taşınabilmesi ürünün gümrükten geçeceği anlamına gelmemektedir. Her ülkenin gümrük kuralları farklıdır. Ülkelerin gümrük regülasyonları sebebi ile gümrükte takılan ürünlerden SellerFulfilment sorumlu değildir.
          </p>

          <p class="mb-9 text-base leading-relaxed text-body-color">
            Gümrük tarafından istenen gerekli düzeltme ve bilgilendirmeler sizin tarafınızdan yapılmalıdır. Göndermiş olduğunuz belgelerin, izinlerin ya da ekstra ödemelerin sorumluluğu da üyeye aittir.
          </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">

            Gümrük, adres hatası, iletişim bilgisi eksikliği, alıcının ürünü reddetmesi gibi alıcı kaynaklı sebeplerle geri dönen ürünlerin iade ücretleri üyeye yansıtılır. Bu tarz ürünlerin kargo ücreti ürün maliyetini aşması durumunda depomuz tarafından imhası üyeye sorulmaksızın istenebilir.</p>

          <h2 class="mb-6 text-3xl font-bold text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
            İPTAL VE İADE
          </h2>
          <p class="mb-9 text-base leading-relaxed text-body-color">

            Üyelikler iptal edilebilir, Ücretli üyelikler duraklatılamaz, geçici olarak durdurulamaz. Üye, ücretli üyeliğini iptal ettiğinde mevcut aboneliğinin süresi sona erene kadar SellerFulfilment'i kullanmaya devam edebilir. </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">

            SellerFulfilment, ABD / Illinois eyaletine kayıtlı BRK EXPRESS SHOP LLC şirketinin dijital bir ürünüdür. BRK EXPRESS SHOP LLC, Illinois eyaleti tüketici kanunlarını uygulamakla sorumludur. </p>

          <h2 class="mb-6 text-3xl font-bold text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
            GİZLİLİK
          </h2>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            SellerFulfilment tarafından internet sitesinin iyileştirilmesi, geliştirilmesine yönelik olarak ve/veya yasal mevzuat çerçevesinde siteye erişmek için kullanılan İnternet servis sağlayıcısının adı ve Internet Protokol (IP) adresi, Siteye erişilen tarih ve saat, sitede bulunulan sırada erişilen sayfalar ve siteye doğrudan bağlanılmasını sağlayan Web sitesinin Internet adresi gibi birtakım bilgiler toplanabilir. </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            SellerFulfilment, üyenin kişisel bilgilerini yasal bir zorunluluk olarak istendiğinde veya (a) yasal gereklere uygun hareket etmek veya SellerFulfilment’e tebliğ edilen yasal işlemlere uymak; (b) BRK EXPRESS SHOP LLC ve SellerFulfilment web sitesi ailesinin haklarını ve mülkiyetini korumak ve savunmak için gerekli olduğuna iyi niyetle kanaat getirdiği hallerde açıklayabilir. </p>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            SellerFulfilment hiçbir şekilde kredi kartı bilgilerini kendi bünyesinde saklamaz. Kredi kartı ile yaptığınız tüm işlemler ödeme alt yapısı kullanılarak gerçekleştirilir ve üyelerin kredi kartı bilgisi Stripe sisteminde şifrelenerek gelişmiş teknolojiler ile saklanmaktadır. </p>
          <h2 class="mb-6 text-3xl font-bold text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
            SÖZLEŞMENİN FESHİ

          </h2>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            İşbu sözleşme üyenin üyeliğini iptal etmesi veya SellerFulfilment tarafından üyeliğinin iptal edilmesine kadar yürürlükte kalacaktır. SellerFulfilment, üyenin üyelik sözleşmesinin herhangi bir hükmünü ihlal etmesi durumunda üyenin üyeliğini iptal ederek sözleşmeyi tek taraflı olarak feshedebilecektir. </p>
          <h2 class="mb-6 text-3xl font-bold text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
            YÜRÜRLÜK


          </h2>
          <p class="mb-9 text-base leading-relaxed text-body-color">
            Üyenin, üyelik kaydı yapması üyelik sözleşmesinde yer alan tüm maddeleri okuduğu ve üyelik sözleşmesinde yer alan maddeleri kabul ettiği anlamına gelir. İşbu Sözleşme üyenin üye olması anında akdedilmiş ve karşılıklı olarak yürürlülüğe girmiştir.</p>








        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== About Section End -->













@endsection
