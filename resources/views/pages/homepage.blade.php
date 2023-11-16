@extends('layouts.frontend')
@section('title','Gardenia Secret Homepage')
@section('meta_description','Gardenia Secret Homepage')
@section('content')
<div class="fixed inset-0 bg-black opacity-80 z-[9999] header-overlay  hidden" id="header-overlay"></div>

<div class="bg-black w-full text-white font-cormorant italic text-md">
    <div class="container mx-auto px-6 md:h-8 flex  justify-between md:items-center">
        <div>
            <span>
                <i class="fa-solid fa-envelope mr-2"></i>
                contact@gardeniasecret.ma
            </span>
        </div>


    </div>
</div>
<header style="background-image: url('{{ asset('images/background.jpeg') }}')" class="relative overflow-hidden">
    <div class="absolute -right-96 top-0 h-full w-96 bg-black z-[99999] social-media transition-all">
        <div class="logo p-10 flex flex-col items-center h-full space-y-10 relative">

                <img src="images/logo.png" class="h-16" style="margin-top:80px" alt="">
                <p class="font-cormorant py-1 mt-1 text-[1rem]  max-w-md text-white text-center">
Gardenia Secret carefully selects beauty products to introduce you to new Moroccan artisanal products. Our goal is to help you feel beautiful and confident while exploring the magic of beauty and the culture of Morocco.
                </p>
                <div class="flex items-center my-2 gap-2">
                  <a href="https://www.facebook.com/gardeniasecretb/" target="_blank" class=" bg-[#e9b5a8] px-3.5 py-2 border cursor-pointer  border-none rounded-full transition-all">
                    <i class="fa-brands fa-facebook-f"></i>
                  </a>
                  <a href="https://www.instagram.com/gardenia.secret/" target="_blank" class="px-3 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
                    <i class="fa-brands fa-instagram"></i>
                  </a>
                  <a href="https://www.youtube.com/@Gardenia.Secret" target="_blank" class="px-2.5 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
                    <i class="fa-brands fa-youtube"></i>
                  </a>
                  <a href="https://www.tiktok.com/@gardenia.secret" target="_blank" class="px-3 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
                    <i class="fa-brands fa-tiktok"></i>
                  </a>
                  <a href="https://www.pinterest.fr/gardeniasecret/" target="_blank" class="px-3 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
                    <i class="fa-brands fa-pinterest"></i>
                  </a>
                </div>

            <button class="absolute -top-7 left-5 close-social">
                <i class="fa-solid fa-xmark text-white text-2xl"></i>
            </button>
        </div>
    </div>
    <nav class="container mx-auto p-5 flex items-center justify-between relative">
        <input type="text" class="py-3 pl-2 w-full hidden search-ipt" placeholder="Cherchez...">
        <div class="logo-img">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" class="h-16" alt="">
            </a>
        </div>
        <div class="nav-links transition-all hidden md:flex flex-col absolute top-20 md:top-0 left-0 md:left-0 md:flex-row justify-end md:static bg-white md:bg-transparent w-full z-50 capitalize">
            <a class="nav-link active mx-2 md:my-0 my-4 md:text-left text-center"  href="/">Home</a>
            <a class="nav-link active mx-2 md:my-0 my-4 md:text-left text-center"  href="{{ Route('boxPage.index') }}">Box of the Month</a>
            <a class="nav-link active mx-2 md:my-0 my-4 md:text-left text-center"  href="{{ Route('BoxMois.index') }}">Subscribe</a>
            <a class="nav-link mx-2 md:my-0 my-4 md:text-left text-center " href="{{ Route('mag.index') }}">The Mag</a>
            <a class="nav-link mx-2 md:my-0 my-4 md:text-left text-center " href="{{ Route('contact.index') }}">Contact</a>

            </a>
            <a  class="nav-link mx-2 md:my-0 my-4 md:text-left text-center search" href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
        </div>

            <div x-data="{ open: false }" class="block md:hidden burger-menu" x-init="window.addEventListener('scroll', () => { open = false })">
                <button class="text-gray-500 w-10 h-10 relative focus:outline-none " @click="open = !open">
                    <span class="sr-only">Open main menu</span>
                    <div class="block w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
                        <span aria-hidden="true" class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out" :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
                        <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current   transform transition duration-500 ease-in-out" :class="{'opacity-0': open } "></span>
                        <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out" :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
                    </div>
                </button>
            </div>
            <div x-data="{ open: false }" class="hidden md:block burger-social" x-init="window.addEventListener('scroll', () => { open = false })">
                <button class="text-gray-500 w-10 h-10 relative focus:outline-none " @click="open = open">
                    <span class="sr-only">Open main menu</span>
                    <div class="block w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
                        <span aria-hidden="true" class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out" :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
                        <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current   transform transition duration-500 ease-in-out" :class="{'opacity-0': open } "></span>
                        <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out" :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
                    </div>
                </button>
            </div>
            <button class="hidden close-search-ipt ml-2">
                <i class="fa-solid fa-xmark  text-2xl"></i>
            </button>


    </nav>
    <section id="hero" >
        <div class="heroSection owl-carousel owl-theme">

            @forelse ($homeSlider as $homeSlider)
            <div class="container mx-auto p-5 flex flex-col-reverse md:flex-row text-center md:text-left   justify-evenly ">
                <div class="horizontal max-w-lg md:ml-20 md:my-0 md:py-10">
                    <h1 class="mb-3 mt-3 text-4xl leading-snug uppercase font-light">{{ $homeSlider->title }}</h1>
                    <p class="mb-6 text-sm text-gray-500">{{ $homeSlider->description }}</p>
                    
                    <button class="hover:scale-110 transition-transform"><a href="{{ route('boxPage.index') }}" class="bg-main-color text-white px-5 py-3 rounded ">{{ $homeSlider->button }}</a></button>
                </div>
                <div class="img mx-auto">
                    <img src="{{ $homeSlider->image }}" class="xl:h-100" alt="">
                </div>
            </div>
            @empty
                
            @endforelse
        </div>


    </section>
    
</header>
<div class=" px-6 py-10 ">
    <div class="container mx-auto flex items-center justify-center flex-col concept">
        <h2 class="text-2xl sm:text-3xl md:text-header my-8 font-Lato uppercase relative w-full text-center z-10">The concept</h2>
        <p class="text-center max-w-3xl leading-loose text-lg font-cormorant">Indulge yourself by delighting in the surprise of receiving a thoughtfully curated selection of full-sized
            skincare, makeup, accessories, and treats every two month. Our dedicated team explores traditional
            markets, unveiling the best-kept beauty secrets, exquisite artisanal products, and organic ingredients
            sourced directly from the skilled hands of Moroccan artisans. Our Beauty Box is an olfactory and visual adventure, a sensory escape where each carefully chosen product tells a unique story. Treat
            yourself to the authenticity of Morocco, where beauty comes to life through unique skincare rituals.</p>
    </div>
</div>

<section class="bg-background-color py-10">
  <div class="flex items-center justify-center flex-col concept">
    <h2 class="text-2xl sm:text-3xl md:text-header my-8 font-Lato uppercase relative z-20">How it works?</h2>
  </div>

    <div class="container mx-auto p-6">
        <div class="grid md:grid-cols-6 gap-10">
            <div class="col-span-6 md:col-span-3 lg:col-span-2">
              <div class="flex flex-col items-center">
                  <div>
                      <img src="{{ asset('images/subscribe.svg') }}" class="w-20 h-20" alt="">
                  </div>
                  <div>
                    <h4 class="font-Lato text-lg font-medium uppercase text-center">Choose Your Subscription</h4>
                    <p class="pt-3 text-lg font-cormorant max-w-xs text-justify">Select from our monthly or annual subscription options. Treat yourself and choose a more spaced-
                        out rhythm, every two months.</p>
                  </div>
              </div>
            </div>
            <div class="col-span-6 md:col-span-3 lg:col-span-2">
                <div class="flex flex-col items-center">
                    <div>
                        <img src="{{ asset('images/livraison.svg') }}" class="w-20 h-20" alt="">
                    </div>
                    <div>
                        <h4 class="font-Lato text-lg font-medium uppercase text-center">RECEIVE YOUR BOX</h4>
                        <p class="pt-3 text-lg font-cormorant max-w-xs text-justify">Let yourself be transported to the heart of Morocco with artisanal treasures, sensational beauty
                            products, and exclusive surprises, all delivered directly to your doorstep.</p>
                    </div>
                </div>
            </div>
            <div class="col-span-6 md:col-span-3 lg:col-span-2">
                <div class="flex flex-col items-center">
                    <div>
                        <img src="{{ asset('images/share.svg') }}" class="w-20 h-20" alt="">
                    </div>
                    <div>
                        <h4 class="font-Lato text-lg font-medium uppercase text-center">DISCOVER AND SHARE</h4>
                        <p class="pt-3 text-lg font-cormorant max-w-xs text-justify">The ultimate beauty experience begins here. Explore the carefully curated products just for you, then
                            share your experience with our community. Try, evaluate, and test them. Beauty is meant to be
                            shared!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@if($boxMonth)
<section id="box" class="py-10">

    <div class="container mx-auto px-4">
      <div class="flex items-center justify-center flex-col concept">
        <h2 class="text-2xl sm:text-3xl md:text-header my-8 font-Lato uppercase relative z-10"> Box of the Month </h2>
      </div>
  
      <div class=" lg:col-gap-12 xl:col-gap-16 mt-8  grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-6">
        <div class="lg:col-span-3 lg:row-end-1 lg:ml-20">
          <div class="lg:flex lg:items-start">
            <div class="lg:order-2">
              <div class="max-w-lg overflow-hidden rounded-lg relative">
                <img id="mainBoxImage" class="w-[350px] h-[350px] md:h-[400px] md:w-[500px] object-cover main-box-img" src="{{ $boxMonth->image }}" alt="" />
                @if($boxMonth->stock == 0)
                    <span class="absolute top-1/2 left-0  w-full bg-black bg-opacity-80 text-white p-1  rounded-br text-center text-2xl uppercase font-Roboto-condensed">
                        out of stock
                    </span>
                @endif
              </div>
            </div>

            <div class="mt-2 w-full lg:order-1 lg:w-32 lg:flex-shrink-0">
              <div class="flex flex-row items-start lg:flex-col">
                <button  type="button" class="btn-gallery flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-gray-900 text-center" onclick="changeMainImage(this, '{{ $boxMonth->image }}')">
                  <img class="h-full w-full object-cover" src="{{ $boxMonth->image }}" alt="" />
                </button>
                @forelse (explode(',',$boxMonth->gallery) as $image)
                <button  type="button" class="btn-gallery flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg text-center" onclick="changeMainImage(this, '{{ $image }}')">
                    <img class="h-full w-full object-cover" src="{{ $image }}"  alt="" />
                </button>
                @empty
                    
                @endforelse
              </div>
            </div>
          </div>
        </div>
  
        <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
          <h1 id="boxTitle" class="sm: text-2xl font-bold text-gray-900 sm:text-3xl">{{ $boxMonth->box_name }}</h1>
  


        <div class="grid grid-flow-col gap-5 text-center auto-cols-max justify-between pt-12 w-9/12">
            <div class="flex flex-col">
                <span class="countdown font-mono text-4xl countdown-days"></span>
                Jours
            </div> 
            <div class="flex flex-col">
                <span class="countdown font-mono text-4xl countdown-hours"></span>
                Heures
            </div> 
            <div class="flex flex-col">
                <span class="countdown font-mono text-4xl countdown-minutes"></span>
                Minutes
            </div> 
            <div class="flex flex-col">
                <span class="countdown font-mono text-4xl countdown-seconds"></span>
                Seconds
            </div>
        </div>
        <div id="boxDescription" class="text-justify mt-5 border-t flex flex-col items-center justify-between space-y-4  py-4 sm:flex-row sm:space-y-0">
            {{ $boxMonth->description }}
        </div>


        <div class="flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0">
            {{-- <div class="flex gap-5"> --}}
                {{-- <h1 class="text-xl font-semibold line-through">
                        <span class="text-base font-bold">$400.00</span>
                </h1>
                <h1 class="text-xl font-semibold" >
                    <span class="text-3xl font-extrabold" >$<span id="boxPrice">{{ $boxMonth->cheap_price }}</span></span>
                </h1> --}}
            {{-- </div> --}}
            <a href="/box-subscription" type="button" class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-[#e9b5a8] bg-none py-2 text-center text-base font-bold text-white transition-all duration-200 w-full ease-in-out focus:shadow ">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg> --}}
                 Read more
            </a>
        </div>

        {{-- <div class=" flex item-center gap-5 mt-8">

            <button type="button" class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-[#e9b5a8] bg-none py-2 text-center text-base font-bold text-white transition-all duration-200 w-full ease-in-out focus:shadow ">
                <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                Add to cart
            </button>


        </div> --}}

    </div>
    </div>
</section>
<script>
    function changeMainImage(button, newSrc) {
        // Remove border from all buttons
        var buttons = document.querySelectorAll('.btn-gallery');
        buttons.forEach(function(btn) {
            btn.classList.remove('border-2', 'border-gray-900');
        });

        // Add border to the clicked button
        button.classList.add('border-2', 'border-gray-900');

        // Change the main image source
        document.getElementById('mainBoxImage').src = newSrc;
    }
</script>
@endif








@if(!$posts->isEmpty())
<section id="blog" class="bg-background-color py-10">
    <div class="flex items-center justify-center flex-col concept py-5">
        <h2 class="text-2xl sm:text-3xl md:text-header my-8 font-Lato uppercase relative z-50">OUR BEAUTY SECRETS</h2>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 justify-center xl:grid-cols-4 gap-5 px-5">

        @forelse ($posts as $post)
        <div class="col-span-1">
            @php
                $categorie = App\Models\Categorie::find($post->categorie_id);
            @endphp
            <div class="max-w-sm bg-transparent  rounded-lg relative blog-content">
                <div class="date absolute top-0 left-5 text-center font-tuesday bg-third-color p-3 text-2xl z-50">
                    <span>{{ $post->created_at->format('d') }}</span> <br>
                    <span>{{ $post->created_at->format('M') }}</span>
                </div>                
                <div class="h-96 overflow-hidden">
                    <a href="/blog/{{ $categorie->slug }}/{{ $post->slug }}">
                        <img class="rounded-t-lg hover:scale-105 h-full transition-transform object-cover" src="{{ $post->image }}" alt="" />
                    </a>
                </div>
                <div class="py-3">
                    {{-- <span class="font-cormorant text-gray-400 py-3">LipstickBy Janny Joe</span> --}}
                    <a href="/blog/{{ $categorie->slug }}/{{ $post->slug }}">
                        <h5 class="mb-2 py-2 tracking-tight font-Lato text-lg font-medium capitalize">{{ $post->title }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 font-cormorant">
                        {!! Illuminate\Support\Str::limit(strip_tags($post->body), 150, '...') !!}
                    </p>
                    <a href="/blog/{{ $categorie->slug }}/{{ $post->slug }}" class="text-xs relative more pl-3">Read more</a>
                </div>
            </div>
            
        </div>
        @empty
            
        @endforelse
    </div>
</section>
@endif


<section id="social">
    <div class=" px-6 py-10">
      <div class="flex items-center justify-center flex-col concept">
        <h2 class="text-2xl sm:text-3xl md:text-header my-8 font-Lato uppercase relative z-10">JOIN US ON INSTAGRAM</h2>
    </div>
    </div>
    <div class="grid grid-cols-12">
        <div class="relative col-span-6 sm:col-span-4 md:col-span-2 social-pic h-[220px]">
            <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                <img src="{{ asset('images/ig-01.jpeg') }}" class="w-full h-full object-cover" alt="">
                <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl text-white bg-second-color rounded-full px-5 py-3.5 opacity-0">
                    <i class="fa-brands fa-instagram"></i>
                </span>
            </a>
        </div>
        <div class="relative col-span-6 sm:col-span-4 md:col-span-2 social-pic h-[220px]">
            <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                <img src="{{ asset('images/ig-02.jpeg') }}" class="w-full h-full object-cover" alt="">
                <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl text-white bg-second-color rounded-full px-5 py-3.5 opacity-0">
                    <i class="fa-brands fa-instagram"></i>
                </span>
            </a>
        </div>
        <div class="relative sm:col-span-4 md:col-span-2 hidden sm:block  social-pic h-[220px]">
            <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                <img src="{{ asset('images/ig-03.jpeg') }}" class="w-full h-full object-cover" alt="">
                <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl text-white bg-second-color rounded-full px-5 py-3.5 opacity-0">
                    <i class="fa-brands fa-instagram"></i>
                </span>
            </a>
        </div>
        <div class="relative md:col-span-2 hidden md:block social-pic h-[220px]">
            <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                <img src="{{ asset('images/ig-07.jpeg') }}" class="w-full h-full object-cover" alt="">
                <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl text-white bg-second-color rounded-full px-5 py-3.5 opacity-0">
                    <i class="fa-brands fa-instagram"></i>
                </span>
            </a>
        </div>
        <div class="relative md:col-span-2 hidden md:block social-pic h-[220px]">
            <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                <img src="{{ asset('images/ig-05.jpeg') }}" class="w-full h-full object-cover" alt="">
                <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl text-white bg-second-color rounded-full px-5 py-3.5 opacity-0">
                    <i class="fa-brands fa-instagram"></i>
                </span>
            </a>
        </div>
        <div class="relative md:col-span-2 hidden md:block social-pic h-[220px]">
            <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                <img src="{{ asset('images/ig-06.jpeg') }}" class="w-full h-full object-cover" alt="">
                <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl text-white bg-second-color rounded-full px-5 py-3.5 opacity-0">
                    <i class="fa-brands fa-instagram"></i>
                </span>
            </a>
        </div>
    </div>
    {{-- <div class="flex flex-row-reverse">
        <div class="relative social-pic">
            <a href="">
                <img src="{{ asset('images/blog-01.jpeg') }}" class="w-full" alt="">
                <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl text-white bg-second-color rounded-full px-5 py-3.5 opacity-0">
                    <i class="fa-brands fa-instagram"></i>
                </span>
            </a>
        </div>
        <div class="relative social-pic">
            <a href="">
                <img src="{{ asset('images/blog-02.jpeg') }}" class="w-full" alt="">
                <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl text-white bg-second-color rounded-full px-5 py-3.5 opacity-0">
                    <i class="fa-brands fa-instagram"></i>
                </span>
            </a>
        </div>
        <div class="relative hidden sm:block  social-pic">
            <a href="#">
                <img src="{{ asset('images/blog-03.jpeg') }}" class="w-full" alt="">
                <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl text-white bg-second-color rounded-full px-5 py-3.5 opacity-0">
                    <i class="fa-brands fa-instagram"></i>
                </span>
            </a>
        </div>
        <div class="relative hidden md:block social-pic">
            <a href="">
                <img src="{{ asset('images/blog-04.jpeg') }}" class="w-full" alt="">
                <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl text-white bg-second-color rounded-full px-5 py-3.5 opacity-0">
                    <i class="fa-brands fa-instagram"></i>
                </span>
            </a>
        </div>
        <div class="relative hidden md:block social-pic">
            <a href="">
                <img src="{{ asset('images/blog-05.jpeg') }}" class="w-full" alt="">
                <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl text-white bg-second-color rounded-full px-5 py-3.5 opacity-0">
                    <i class="fa-brands fa-instagram"></i>
                </span>
            </a>
        </div>
        <div class="relative hidden md:block social-pic">
            <a href="">
                <img src="{{ asset('images/blog-06.jpeg') }}" class="w-full" alt="">
                <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl text-white bg-second-color rounded-full px-5 py-3.5 opacity-0">
                    <i class="fa-brands fa-instagram"></i>
                </span>
            </a>
        </div>
    </div> --}}
</section>
<section id="newsletter-section" class="bg-background-color py-16 ">
    <div class="container mx-auto p-6 flex items-center justify-around">
        <div class="col">
            <h2 class="text-6xl lg:text-large font-tuesday">Subscribe</h2>
        </div>
        <div class="col">
            <form id="newsletter" action="{{ Route('email.store') }}" method="POST">
                @csrf
                <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                    <div class="relative lg:w-80">
                        <label for="email" class="hidden mb-2 text-sm font-medium text-gray-900">Email address</label>
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                        </div>
                        <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg font-cormorant  outline-none" placeholder="Enter your email" type="email" id="email" name="email" required="">
                    </div>
                    <div>
                        <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-black border-black sm:rounded-none sm:rounded-r-lg font-cormorant">S'abonner</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<section id="adv">
  <div class="container mx-auto p-6 flex flex-col md:flex-row justify-between items-center gap-10">
    <div class="flex flex-col items-center gap-1">
      <img src="{{ asset('images/lock.svg') }}" class="w-[40px] h-[40px]" alt="">
      <h5 class="font-Lato text-sm font-light text-center">SECURE PAYMENT</h5>
    </div>
    <div class="flex flex-col items-center gap-1">
      <img src="{{ asset('images/flexible.svg') }}" class="w-[40px] h-[40px]" alt="">
      <h5 class="font-Lato text-sm font-light text-center">FLEXIBLE SUBSCRIPTION</h5>
    </div>
    <div class="flex flex-col items-center gap-1">
      <img src="{{ asset('images/livraison.svg') }}" class="w-[40px] h-[40px]" alt="">
      <h5 class="font-Lato text-sm font-light text-center">EXPRESS DELIVERY</h5>
    </div>
    <div class="flex flex-col items-center gap-1">
      <img src="{{ asset('images/chat.svg') }}" class="w-[40px] h-[40px]" alt="">
      <h5 class="font-Lato text-sm font-light text-center">CUSTOMER SERVICE</h5>
    </div>
    <div class="flex flex-col items-center gap-1">
      <img src="{{ asset('images/verified.svg') }}" class="w-[40px] h-[40px]" alt="">
      <h5 class="font-Lato text-sm font-light text-center">CUSTOMER SATISFACTION</h5>
    </div>


  </div>
</section>


<script>
    // select the elements to update
    const daysElement = document.querySelector('.countdown-days');
    const hoursElement = document.querySelector('.countdown-hours');
    const minutesElement = document.querySelector('.countdown-minutes');
    const secondsElement = document.querySelector('.countdown-seconds');

    // set the initial countdown time (in seconds)
    let countdownTime = 15 * 24 * 60 * 60; // 15 days

    // update the countdown every second
    setInterval(() => {
    // calculate the remaining time
    const days = Math.floor(countdownTime / (24 * 60 * 60));
    const hours = Math.floor((countdownTime % (24 * 60 * 60)) / (60 * 60));
    const minutes = Math.floor((countdownTime % (60 * 60)) / 60);
    const seconds = Math.floor(countdownTime % 60);

    // update the elements
    daysElement.textContent = days;
    hoursElement.textContent = hours;
    minutesElement.textContent = minutes;
    secondsElement.textContent = seconds;

    // decrease the countdown time by one second
    countdownTime--;
    }, 1000);
</script>

<script>
          var newsLetterForm = document.getElementById('newsletter');
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    newsLetterForm.addEventListener('submit', function(e) {
      e.preventDefault();
      var formData = new FormData(newsLetterForm);

      var xhr = new XMLHttpRequest();
      xhr.open(newsLetterForm.method, newsLetterForm.action);
      xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 422) { 
        var errorObj = JSON.parse(xhr.responseText);
        var errors = errorObj.errors || {};
        for (var field in errors) {
            var inputField = document.querySelector('[name="' + field + '"]');
            inputField.classList.add('is-invalid');
            var errorElement = inputField.nextElementSibling;
            errorElement.innerHTML = errors[field][0];
            errorElement.style.display = 'block';
        }

        var message = errorObj.message || "Error";
        if(message.includes('The email has already been taken.')) {
          Toastify({
                text: 'Email déjà utilisée',
                duration: 3000, 
                gravity: 'top', 
                position: 'center', 
                backgroundColor: '#ef4444', 
                stopOnFocus: true, 
              }).showToast();
        }
        }
    else if (xhr.status === 200) {
        // if (this.responseText == 'exists') {
              Toastify({
                text: 'Merci pour votre inscription',
                duration: 3000, 
                gravity: 'top', 
                position: 'center', 
                backgroundColor: '#af8d6a', 
                stopOnFocus: true, 
              }).showToast();
            } else {
              handleSuccess();
            // }
          }
        }
      };
      xhr.send(formData);
    });
</script>


@include('pages.components.footer')
@include('pages.components.top')

@include('pages.components.popup')

@endsection