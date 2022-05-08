<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/home/style.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/assets/owl.theme.default.min.css') }}">
    <script src="{{ asset('assets/myjquery.min.js') }}"></script>
    <script src="{{ asset('assets/dist/owl.carousel.min.js') }}"></script>
    <title>{{ config('app.name') }}</title>
</head>

<body>
    {{-- <x-navbar></x-navbar> --}}

    <section id="banner">
        <div class="frame">
            <img class="foto" src="{{ asset('assets/image/bg.jpeg') }}" alt="">
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 title">
                    <div class="card card-title m-auto">
                        <div class="card-body">
                            <h1 class="font-size-mob">PESANTREN </h1>
                            <h1>MAHAD DARUL ULUM AL BURHAN</h1>
                            <h4>Sumatera Selatan Palembang</h4>
                            <h4 class="font-size-mob">Tahun Ajaran 2022/2023</h4>
                            <a href="{{ route('pendaftaran') }}" class="btn btn-primary">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about">
        <h1 class="text-center">Tentang Kami</h1>
        <div class="container">
            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit obcaecati
                exercitationem tempora voluptatem accusamus minima vel asperiores sed expedita nulla aspernatur, alias,
                perferendis ducimus vero sit veritatis quaerat distinctio cum?
                Totam maxime nobis id consequuntur facere, amet distinctio nam quisquam non! Autem cumque itaque
                architecto aperiam? Doloribus culpa necessitatibus consequuntur alias nisi soluta adipisci quod, commodi
                optio ducimus praesentium est.
                Vel iure eveniet sapiente, beatae officia fugit esse perferendis ut qui aspernatur commodi, optio ullam
                possimus magnam est incidunt itaque soluta voluptate sed. Odit accusamus odio, excepturi aut cupiditate
                iste!
                Consequatur, vel. Cumque, ipsum. Ipsum ab, quod voluptates fugiat deserunt eos inventore odio fuga
                velit. Excepturi, facilis doloremque architecto labore repellat aliquid voluptatibus? In labore sit,
                voluptates animi amet voluptatibus?
                Voluptates dolore aut recusandae labore. Itaque, eum similique delectus vel suscipit accusantium nihil
                doloremque voluptas temporibus, porro corrupti consequuntur id quam at officia tenetur consectetur sunt
                exercitationem est sed? Voluptatum!</p>
            <div class="row">
                <div class="owl-carousel owl-theme">      
                    <div class="item" >
                        <h4><img src="{{ asset('assets/image/bg.jpeg') }}" alt=""></h4>
                    </div>
                    <div class="item" >
                        <h4><img src="{{ asset('assets/image/bg1.jpeg') }}" alt=""></h4>
                    </div>
                    <div class="item" >
                        <h4><img src="{{ asset('assets/image/bg3.jpeg') }}" alt=""></h4>
                    </div>
                    <div class="item" >
                        <h4><img src="{{ asset('assets/image/bg4.jpeg') }}" alt=""></h4>
                    </div>
                    <div class="item" >
                        <h4><img src="{{ asset('assets/image/bg5.jpeg') }}" alt=""></h4>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <section id="footer">
        <div class="">
            <div class="row">
                <div class="col-md-3">
                    <div class="judul-footer">
                        <p>Pesantren Mahad Darul Ulum Al Burhan</p>
                    </div>
                    <div class="kata-kata-footer">
                        <p>
                           Menerima Siswa baru
                   </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="judul-footer">
                        <p>Alamat</p>
                    </div>
                    <div class="kata-kata-footer">
                        <p>
                          Jl. Jend. Basuki Rachmat, Ario Kemuning, Kec. Ilir Tim. I, Kota Palembang, Sumatera Selatan 30151
                    </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="judul-footer">
                        <p>Sosial Media</p>
                    </div>
                    <div class="kata-kata-footer">
                        <a href="https://www.instagram.com/mahaddarululum_alburhan/?hl=id">IG: Mahad Darul Ulum Al Burhan</a>
                        {{-- <p>Facebook : Pesantren NurAllah</p> --}}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="judul-footer">
                        <p>Contact</p>
                    </div>
                    <div class="kata-kata-footer">
                        {{-- <p>
                            mrezafahleta1997@gmail.com
                    </p> --}}
                        <p>
                            (0711) 814477
                    </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright-footer">
                        Copyright 2021 • All rights reserved • Pesantren  MAHAD DARUL ULUM AL BURHAN
                </p>
                </div>
            </div>
        </div>
    </section>

    <script>
   var owl = $('.owl-carousel');
owl.owlCarousel({
    items:4,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:3,
            nav:true,
            loop:false
        }
    }
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})

    </script>
</body>

</html>
