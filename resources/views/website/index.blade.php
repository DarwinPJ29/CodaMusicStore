<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   
</head>
<body>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>

    @extends('layout.website')
    @section('website-main')
        @include('website.components.navbar')
       
        <div class=" pt-5 overflow-x-hidden">
            {{-- Hero Section --}}
            <div class="image-container-hero">
                {{-- <img src="{{ asset('assets/images/guitarbg.png') }}" class="img-hero" alt="..." > --}}
                <div class="d-flex justify-content-end me-5 pt-5">
                    <div class="ms-5">

                        <p class="text-uppercase title-text text-white">
                            The <br>persuit <br>of music PERFECTION
                        </p>
                        <p class="text-uppercase text-white coda "> coda music store</p>
                            
                        <!-- <p class="caption-top">The Pursuit <br>of Musical Perfection</p>
                        <p class="caption-bottom">CODA MUSICAL STORE</p> -->
                    </div>

                </div>
                </div>

                <div class="products">
                    @section('titles')
                    <h2 class="text-center"><b>Our Products</b></h2>
                    @endsection
                    @include('website.components.products')
                </div>

                <div class="second-section">
                    <p class="Catl">Strings resonate</p>
                    <p class="title">Guitar Collections</p>
                    <nav>
                        <ul class="collections">
                            <li data-aos="fade-up" data-aos-duration="1000"> <img src="assets/images/acoustic.png" alt="Acoustic Image"></li>
                            <li data-aos="fade-up" data-aos-duration="1700"> <img src="assets/images/electric.png" alt="Electric Image"></li>
                            <li data-aos="fade-up" data-aos-duration="2300"> <img src="assets/images/bass.png" alt="Bass Image"></li>
                            <li data-aos="fade-up" data-aos-duration="3000"> <img src="assets/images/ukalele.png" alt="ukalele Image"> </li>
                        </ul>
                    </nav>
                </div>

                <div class="third-section">
                    <h1>Welcome to Coda Musical Store </h1>
                    <p>Step into our world and discover a vibrant selection of instruments that cater to every musical passion.
                    Explore our impressive collection and discover your dream instrument delivered right to your doorstep. 
                    Whether you're a seasoned musician or just starting your musical journey, our curated selection is designed to inspire and enhance your passion for music.
                    Take the next meaningful step towards your musical aspirations with Coda Musical Store!</p>
                </div>

                <div class="fourth-section">
                    <h2>Discover Exceptional Musical Instruments!</h2>
                    <p>Whether you're gearing up for a stage performance or learning your favorite tune, our orchestra of instruments is your key to portable music magic.</p>
                </div>

                <div class="fifth-section">
                    <h3>We're not your typical music gear shop</h3>
                    <p>Whether you're ready to rock out in front of millions or refine your favorite sound, our selection of amplifiers, strings, cables, and effects unlocks limitless musical possibilities."</p>
                    <nav>
                        <ul>
                            <li> <img src="assets/images/accessories.png" alt="Acoustic Image"></li>
                            <li> <img src="assets/images/amplifiers.png" alt="Electric Image"></li>
                            <li> <img src="assets/images/effects.png" alt="Bass Image"></li>
                            <li> <img src="assets/images/pickups.png" alt="ukalele Image"></li>
                            <li> <img src="assets/images/strings.png" alt="ukalele Image"></li>
                        </ul>
                    </nav>
                </div>

            
        </div>
    <div>



    @include('website.components.footer')
    @endsection
    </div>

</body>
</html>
