<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="description" content= "@yield('meta_description')">
        <title>@yield('title')</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="overflow-x-hidden">
        @yield('content')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

        <script>

          $(document).ready(function() {
            var owl = $('.heroSection');

            owl.owlCarousel({
              autoplay: true,
              autoplayTimeout: 6000,
              loop: true,
              margin: 10,
              dots: false,
              // animateOut: 'fadeOut',
              // animateIn: 'fadeIn',
              nav: false,
              dots:true,
              responsive: {
                0: {
                  items: 1
                },
                600: {
                  items: 1
                },
                1000: {
                  items: 1
                }
              }
            });

            // Custom navigation buttons
          //   $('.owl-prev').click(function() {
          //     owl.trigger('prev.owl.carousel');
          //   });

          //   $('.owl-next').click(function() {
          //     owl.trigger('next.owl.carousel');
          //   });
          });





            $('.products').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                autoplay: true,
                            autoplayTimeout: 3000,
                            loop: true,
                            margin: 10,
                            dots:false,
                            nav:false,
                            // center:true,
                responsive:{
                    0:{
                        items:1,
                        items:1,
                        center: true, // center the single item
                        onInitialized: function(event) {
                          $(event.target).find('.owl-item.active').addClass('center'); // add center class to the single item
                        }
                    },
                    600:{
                        items:2
                    },
                    900:{
                        items:3
                    },
                    
                    1280:{
                        items:4
                    }
                  }
              })
              $(document).ready(function(){
                          $(".companies").owlCarousel({
                              autoplay: true,
                              autoplayTimeout: 2000,
                              loop: true,
                              margin: 10,
                              dots:false,
                              responsive:{
                                  0:{
                                      items:1
                                  },
                                  640:{
                                      items:2
                                  },
                                  768:{
                                      items:3
                                  },
                                  1024:{
                                      items:4
                                  },
                                  1280:{
                                      items:5
                                  },
                                  1536:{
                                      items:6
                                  }
                              }
                          });
                      })
              $(document).ready(function(){
                          $(".testimonials").owlCarousel({
                              autoplay: true,
                              autoplayTimeout: 2000,
                              loop: true,
                              margin: 10,
                              dots:true,
                              responsive:{
                                  0:{
                                      items:1
                                  },
                                  640:{
                                      items:1
                                  },
                                  768:{
                                      items:1
                                  },
                                  1024:{
                                      items:1
                                  },
                                  1280:{
                                      items:1
                                  },
                                  1536:{
                                      items:1
                                  }
                              }
                          });
                      })
        </script>

        <script>
                          function range() {
                            return {
                              minprice: 0,
                              maxprice: 1000,
                              min: 0,
                              max: 1000,
                              minthumb: 0,
                              maxthumb: 0,
                              mintrigger() {
                                this.validation();
                                this.minprice = Math.min(this.minprice, this.maxprice - 500);
                                this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
                              },
                              maxtrigger() {
                                this.validation();
                                this.maxprice = Math.max(this.maxprice, this.minprice + 200);
                                this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);
                              },
                              validation() {
                                if (/^\d*$/.test(this.minprice)) {
                                  if (this.minprice > this.max) {
                                    this.minprice = 9500;
                                  }
                                  if (this.minprice < this.min) {
                                    this.minprice = this.min;
                                  }
                                } else {
                                  this.minprice = 0;
                                }
                                if (/^\d*$/.test(this.maxprice)) {
                                  if (this.maxprice > this.max) {
                                    this.maxprice = this.max;
                                  }
                                  if (this.maxprice < this.min) {
                                    this.maxprice = 200;
                                  }
                                } else {
                                  this.maxprice = 1000;
                                }
                              }
                            }
                          }
        </script>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        var banners = document.querySelectorAll("[data-banner-id]");
        var bannerVisibleMap = {};

        function isBannerVisible(entries) {
          entries.forEach(function(entry) {
            var bannerId = entry.target.dataset.bannerId;
            if (entry.isIntersecting && !bannerVisibleMap[bannerId]) {

              incrementViewCount(bannerId);
              bannerVisibleMap[bannerId] = true;
              observer.unobserve(entry.target); // Stop observing the banner
            }
          });
        }

        function incrementViewCount(bannerId) {

          var xhttp = new XMLHttpRequest();
          xhttp.open("POST", "/banner/" + bannerId + "/view", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}"); // Add this line
          xhttp.send();
        }

        var observer = new IntersectionObserver(isBannerVisible, { threshold: 0.5 });

        banners.forEach(function(banner) {
          observer.observe(banner);
        });
      });
    </script>
@if (Session::has('success'))
{{-- @section('script') --}}
<script>
    iziToast.success({
        title: '',
        position:'topRight',
        message: '{{ session()->get('success') }}'
    });
    // alert('Success')
</script>
{{-- @endsection --}}
@endif

@if (Session::has('cancel'))
{{-- @section('script') --}}
<script>
    iziToast.error({
        title: '',
        position:'topRight',
        message: '{{ session()->get('cancel') }}'
    });
    // alert('Error')
</script>
{{-- @endsection --}}
@endif
@if (Session::has('already-in-cart'))
{{-- @section('script') --}}
<script>
    iziToast.error({
        title: '',
        position:'topRight',
        message: 'HHH'
    });
    // alert('Error')
</script>
{{-- @endsection --}}
@endif


{{-- <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10 z-[100]">
  <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
    <div class="w-full">
      <div class="m-8 my-20 max-w-[400px] mx-auto">
        <div class="mb-8 text-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" x="0px" y="0px" width="70" height="70" viewBox="0 0 512 512">
            <path fill="#32BEA6" d="M504.1,256C504.1,119,393,7.9,256,7.9C119,7.9,7.9,119,7.9,256C7.9,393,119,504.1,256,504.1C393,504.1,504.1,393,504.1,256z"></path><path fill="#FFF" d="M392.6,172.9c-5.8-15.1-17.7-12.7-30.6-10.1c-7.7,1.6-42,11.6-96.1,68.8c-22.5,23.7-37.3,42.6-47.1,57c-6-7.3-12.8-15.2-20-22.3C176.7,244.2,152,229,151,228.4c-10.3-6.3-23.8-3.1-30.2,7.3c-6.3,10.3-3.1,23.8,7.2,30.2c0.2,0.1,21.4,13.2,39.6,31.5c18.6,18.6,35.5,43.8,35.7,44.1c4.1,6.2,11,9.8,18.3,9.8c1.2,0,2.5-0.1,3.8-0.3c8.6-1.5,15.4-7.9,17.5-16.3c0.1-0.2,8.8-24.3,54.7-72.7c37-39.1,61.7-51.5,70.3-54.9c0.1,0,0.1,0,0.3,0c0,0,0.3-0.1,0.8-0.4c1.5-0.6,2.3-0.8,2.3-0.8c-0.4,0.1-0.6,0.1-0.6,0.1l0-0.1c4-1.7,11.4-4.9,11.5-5C393.3,196.1,397,184.1,392.6,172.9z"></path>
          </svg>
          <h1 class="my-6 text-xl font-extrabold">
            Thank you for registering with Gardenia Secret! We're excited to have you on board.
          </h1>
          <p class="text-gray-600">Help us suggest products you'll love! Take our quick survey, it'll only take a moment..</p>
        </div>
        <div class="space-y-4">
          <button class="p-3 bg-main-color rounded-full text-black w-full font-semibold">Take the survey</button>
        </div>
      </div>
    </div>
  </div>
</div> --}}

<!-- component -->


  </body>

</html>
