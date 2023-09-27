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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="overflow-x-hidden">
        @yield('content')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>

          $(document).ready(function() {
            var owl = $('.heroSection');

            owl.owlCarousel({
              autoplay: true,
              autoplayTimeout: 2000,
              loop: true,
              margin: 10,
              dots: false,
              animateOut: 'fadeOut',
              animateIn: 'fadeIn',
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
            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the current tab
            
            function showTab(n) {
              // This function will display the specified tab of the form...
              var x = document.getElementsByClassName("step");
              x[n].style.display = "block";
              //... and fix the Previous/Next buttons:
              if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
              } else {
                document.getElementById("prevBtn").style.display = "inline";
              }
              if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
              } else {
                document.getElementById("nextBtn").innerHTML = "Next";
              }
              //... and run a function that will display the correct step indicator:
              fixStepIndicator(n)
            }
            
            function nextPrev(n) {
              // This function will figure out which tab to display
              var x = document.getElementsByClassName("step");
              // Exit the function if any field in the current tab is invalid:
              if (n == 1 && !validateForm()) return false;
              // Hide the current tab:
              x[currentTab].style.display = "none";
              // Increase or decrease the current tab by 1:
              currentTab = currentTab + n;
              // if you have reached the end of the form...
              if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("signUpForm").submit();
                return false;
              }
              // Otherwise, display the correct tab:
              showTab(currentTab);
            }
            
            function validateForm() {
              // This function deals with validation of the form fields
              var x, y, i, valid = true;
              x = document.getElementsByClassName("step");
              y = x[currentTab].getElementsByTagName("input");
              // A loop that checks every input field in the current tab:
              for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                  // add an "invalid" class to the field:
                  y[i].className += " invalid";
                  // and set the current valid status to false
                  valid = false;
                }
              }
              // If the valid status is true, mark the step as finished and valid:
              if (valid) {
                document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
              }
              return valid; // return the valid status
            }
            
            function fixStepIndicator(n) {
              // This function removes the "active" class of all steps...
              var i, x = document.getElementsByClassName("stepIndicator");
              for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
              }
              //... and adds the "active" class on the current step:
              x[n].className += " active";
            }

        <script>
                  var newsLetterFormSecond = document.getElementById('pop-newsletter');
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            newsLetterFormSecond.addEventListener('submit', function(e) {
              e.preventDefault();
              var formData = new FormData(newsLetterFormSecond);

              var xhr = new XMLHttpRequest();
              xhr.open(newsLetterFormSecond.method, newsLetterFormSecond.action);
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
                  document.getElementById('pop-up').remove();
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
          document.getElementById('cart').addEventListener('click',function() {
            document.getElementById('cart-overlay').classList.remove('opacity-0')
            document.getElementById('cart-overlay').classList.add('opacity-100')
            document.getElementById('cart-overlay').classList.add('fixed')
            document.getElementById('cart-wrapper').classList.remove('translate-x-full')
            document.getElementById('cart-wrapper').classList.add('translate-x-0')
          })

          document.getElementById('close-cart').addEventListener('click',function() {
            document.getElementById('cart-overlay').classList.add('opacity-0')
            document.getElementById('cart-overlay').classList.remove('opacity-100')
            document.getElementById('cart-overlay').classList.remove('fixed')
            document.getElementById('cart-wrapper').classList.add('translate-x-full')
            document.getElementById('cart-wrapper').classList.remove('translate-x-0')
          })
        </script>
        <script>
          document.getElementById('wishlist').addEventListener('click',function() {
            document.getElementById('wishlist-overlay').classList.remove('opacity-0')
            document.getElementById('wishlist-overlay').classList.add('opacity-100')
            document.getElementById('wishlist-overlay').classList.add('fixed')
            document.getElementById('wishlist-wrapper').classList.remove('translate-x-full')
            document.getElementById('wishlist-wrapper').classList.add('translate-x-0')
          })

          document.getElementById('close-wishlist').addEventListener('click',function() {
            document.getElementById('wishlist-overlay').classList.add('opacity-0')
            document.getElementById('wishlist-overlay').classList.remove('opacity-100')
            document.getElementById('wishlist-overlay').classList.remove('fixed')
            document.getElementById('wishlist-wrapper').classList.add('translate-x-full')
            document.getElementById('wishlist-wrapper').classList.remove('translate-x-0')
          })
        </script>


    </body>

</html>
