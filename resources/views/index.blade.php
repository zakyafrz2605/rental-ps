@extends(auth()->check() && auth()->user()->isAdmin() ? 'layout.admin' : 'layout.layout')
@section('title', 'Rental PS')

@section('content')
<link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
/>
<link rel="stylesheet" href="{{asset('css/app.css')}}" />

<header class="section__container header__container">
  <div class="header__content">
    <span class="bg__blur"></span>
    <span class="bg__blur header__blur"></span>
    <h4>Tempat Penyewaan Playstation Terbaik dan Terpercaya</h4>
    <h1><span>MAINKAN</span> GAME IMPIANMU DISINI</h1>
    <p>Telusuri dunia gaming dengan pengalaman bermain yang mendalam bersama sewa PlayStation terbaik kami! Tingkatkan sesi gaming Anda ke level baru tanpa harus berkomitmen untuk membeli. Di "PlayStation Haven," kami menyediakan konsol terbaru, perpustakaan game yang luas, dan aksesori untuk menciptakan tempat bermain ultimate di ruang Anda sendiri.</p>
    <a href="/login">
    <button class="btn">Mulai Bermain</button>
    </a>
  </div>
  <div class="header__image">
    <img src="{{asset('assets/esport.png')}}" class="hidden lg:block" alt="header" />
  </div>
</header>

    <section class="section__container explore__container">
      <div class="explore__header">
        <h2 class="section__header">JELAJAHI LAYANAN KAMI</h2>
        <div class="explore__nav">
          <span><i class="ri-arrow-left-line"></i></span>
          <span><i class="ri-arrow-right-line"></i></span>
        </div>
      </div>
      <div class="explore__grid">
        <div class="explore__card">
          <span><i class="ri-boxing-fill"></i></span>
          <h4>Pengalaman Gaming Ultimate</h4>
          <p>
            Mulailah petualangan gaming ultimate dengan program sewa PlayStation kami. Kami menawarkan beragam pengalaman gaming, memenuhi kebutuhan para gamer casual 
          </p>
          <a href="/register">Join Now<i class="ri-arrow-right-line"></i></a>
        </div>
        <div class="explore__card">
          <span><i class="ri-heart-pulse-fill"></i></span>
          <h4>Aksesori Premium untuk Pengalaman Gaming Maksimal</h4>
          <p>
          Tingkatkan pengalaman gamingmu dengan aksesori premium dari PlayStation. Dari kontroler inovatif hingga headset realitas virtual, kami sediakan yang terbaik untukmu. Sewa sekarang dan rasakan kemewahan gaming di ujung jari!
          </p>
          <a href="/register">Join Now<i class="ri-arrow-right-line"></i></a>
        </div>
        <div class="explore__card">
          <span><i class="ri-run-line"></i></span>
          <h4>Rencana Rental PlayStation: Pilih Sesuai Gaya Hidupmu</h4>
          <p>
          Pilih rencana rental PlayStation yang sesuai dengan gaya hidupmu. Dari gamer akhir pekan hingga gamer setiap hari, kami punya rencana yang pas untukmu. Mulai sekarang dan nikmati pengalaman gaming tanpa batas!.
          </p>
          <a href="/register">Join Now<i class="ri-arrow-right-line"></i></a>
        </div>
        <div class="explore__card">
          <span><i class="ri-shopping-basket-fill"></i></span>
          <h4>Gaming Seperti Tak Pernah Sebelumnya</h4>
          <p>
          Temukan sensasi gaming yang belum pernah kamu rasakan sebelumnya dengan fitur-fitur khusus dari PlayStation. Dari grafis memukau hingga fitur inovatif, jelajahi dunia gaming yang memukau. Segera gabung untuk merasakan keajaiban gaming bersama kami!
          </p>
          <a href="/register">Join Now<i class="ri-arrow-right-line"></i></a>
        </div>
      </div>
    </section>

    <section class="section__container class__container">
      <div class="class__image">
        <span class="bg__blur"></span>
        <img src="{{asset('assets/class-1.jpg')}}" alt="class" class="class__img-1" />
      </div>
      <div class="class__content">
        <h2 class="section__header">DAFTAR GAME SERU TERSEDIA DISINI</h2>
        <p>
        Jelajahi keindahan dunia gaming dengan daftar game epik di sini! Dari aksi penuh adrenalin hingga petualangan misterius, setiap judul memberikan pengalaman yang tak terlupakan. Segera sambut tantangan, kuasai dunia, dan temukan cerita-cerita seru yang menanti untuk dijelajahi. Siapkan dirimu untuk menyelami dunia game yang penuh keajaiban!
        </p>
        <a href="/game">
          <button class="btn">Daftar Game</button>
        </a>
      </div>
    </section>

    <section class="section__container join__container">
      <h2 class="section__header">Mengapa Harus Sewa Disini ?</h2>
      <p class="section__subheader">
      Dengan desain yang modern dan atmosfer yang ramah, setiap sudut ruangan ini diciptakan untuk memastikan pengalaman gamingmu tak tertandingi. Konsol PlayStation terbaru, kursi gaming ergonomis, dan pencahayaan yang disesuaikan menciptakan suasana yang luar biasa.
      Dilengkapi dengan pendingin udara yang optimal, suara surround berkualitas tinggi, dan layar beresolusi tinggi, ruang gaming kami dirancang untuk memanjakan setiap indera. Tidak hanya itu, kenyamanan tambahan seperti minuman ringan dan snack tersedia untuk melengkapi pengalaman bermainmu.
      </p>
      <div class="join__image">
        <img src="{{asset('assets/join.jpg')}}" alt="Join" />
        <div class="join__grid">
          <div class="join__card">
            <span><i class="ri-user-star-fill"></i></span>
            <div class="join__card__content">
              <h4>Ruangan Nyaman</h4>
              <p>Nikmati fasilitas ruangan yang nyaman dilengkapi dengan pendingin ruangan dan fasilitas yang lengkap</p>
            </div>
          </div>
          <div class="join__card">
            <span><i class="ri-vidicon-fill"></i></span>
            <div class="join__card__content">
              <h4>Dukungan Perangkat Kualitas HD</h4>
              <p>Semua device kami menggunakan kualitas High sehingga pengalaman bermain yang luar biasa!</p>
            </div>
          </div>
          <div class="join__card">
            <span><i class="ri-building-line"></i></span>
            <div class="join__card__content">
              <h4>Pelayanan yang Memuaskan</h4>
              <p>Seluruh Staff yang siap memberikan layanan bantuan selama Anda bermain</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section__container price__container">
      <h2 class="section__header">Daftar Harga Member</h2>
      <div class="price__grid">
        <div class="price__card">
          <div class="price__card__content">
            <h4>Basic Plan</h4>
            <h3>IDR 10k/hours</h3>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              1 Sofa (2 orang)
            </p>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              Ruangan Ber-AC
            </p>
          </div>
          <a href="/register">
            <button class="btn price__btn">Join Now</button>
          </a>
        </div>
        <div class="price__card">
          <div class="price__card__content">
            <h4>Medium Plan</h4>
            <h3>IDR 15k/hours</h3>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              2 Sofa (4 Orang)
            </p>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              TV 32 Inch
            </p>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              FREE WIFI
            </p>
          </div>
          <a href="/register">
            <button class="btn price__btn">Join Now</button>
          </a>
        </div>
        <div class="price__card">
          <div class="price__card__content">
            <h4>Professional Plan</h4>
            <h3>IDR 25k/hours</h3>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              Fitur Online
            </p>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              Tanpa batasan orang
            </p>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              4 Controller
            </p>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              TV 50 Inch
            </p>
          </div>
          <a href="/register">
            <button class="btn price__btn">Join Now</button>
          </a>
        </div>
      </div>
    </section>

    <footer class="section__container footer__container">
      <span class="bg__blur"></span>
      <span class="bg__blur footer__blur"></span>
      <div class="footer__col">
        <div class="footer__logo"><img src="{{asset('assets/ps.png')}}" class="w-24" alt="logo"/></div>
        <p>
        Selamat datang di dunia gaming penuh kemewahan dan kecanggihan dengan PlayStation, di mana hiburan tidak hanya menjadi pengalaman, tetapi juga sebuah petualangan tak terlupakan. PlayStation tidak sekadar konsol game, ia adalah portal magis yang membuka pintu ke dunia fantasi yang begitu mendalam.
        </p>
        <div class="footer__socials">
          <a href="https://youtube.com/@dafiraone"><i class="ri-youtube-line"></i></a>
          <a href="https://wa.me/6281476652656"><i class="ri-whatsapp-line"></i></a>
          <a href="https://instagram.com/raihanalrais"><i class="ri-instagram-line"></i></a>
        </div>
      </div>
      <div class="footer__col ml-16">
        <h4>Company</h4>
        <a href="https://www.playstation.com/en-id/">Playstation</a>
        <a href="https://www.sony.co.id/id/">Sony</a>
      </div>
      <div class="footer__col ml-16">
        <h4>About Us</h4>
        <a href="https://instagram.com/dafiraone">Daffa</a>
        <a href="https://bio.link/zakyafrizal">Zaky</a>
        <a href="https://instagram.com/raihanalrais">Raihan</a>
      </div>
    </footer>
    <div class="footer__bar">
    © 2024 Web Rental Playstation. dafiraone.
    </div>     
@endsection