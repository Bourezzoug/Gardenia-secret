@extends('layouts.frontend')

@section('content')


@include('pages.components.header')


    <section class="py-12 sm:py-16"> 
        <div class="container mx-auto px-4">
          <nav class="flex">
            <ol role="list" class="flex items-center">
              <li class="text-left">
                <div class="-m-1">
                  <a href="#" class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800"> Acceuil </a>
                </div>
              </li>
      
              <li class="text-left">
                <div class="flex items-center">
                  <span class="mx-2 text-gray-400">/</span>
                  <div class="-m-1">
                    <a href="#" class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800"> Produits </a>
                  </div>
                </div>
              </li>
      
            </ol>
          </nav>
      
          <div class="lg:col-gap-12 xl:col-gap-16 mt-8 grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-5 lg:gap-16">
            <div class="lg:col-span-3 lg:row-end-1">
              <div class="lg:flex lg:items-start">
                <div class="lg:order-2 lg:ml-5">
                    <div class="max-w-xl overflow-hidden rounded-lg relative">
                        <img class="h-full w-full max-w-full object-cover border-2" id="main-produit-image" src="{{ $product->photo }}" alt="" />
                        @if($product->quantite == 0)
                          <span class="absolute top-1/2 left-0  w-full bg-black bg-opacity-80 text-white p-1  rounded-br text-center text-2xl uppercase font-Roboto-condensed">
                            out of stock
                          </span>
                        @endif
                    </div>
                </div>
            
                <div class="mt-2 w-full lg:order-1 lg:w-32 lg:flex-shrink-0">
                    <div class="flex flex-row items-start lg:flex-col">
                        <button type="button" data-image="{{ $product->photo }}" class="image-button flex-0 aspect-square mb-3 mr-3 md:mr-0 h-20 overflow-hidden rounded-lg border-2 border-gray-900 text-center">
                            <img class="h-full w-full object-cover" src="{{ $product->photo }}" alt="" />
                        </button>
                        @forelse ($gallery as $index => $galleryImage)
                            <button type="button" data-image="{{ $galleryImage }}" class="image-button flex-0 aspect-square mb-3 mr-3 md:mr-0 h-20 overflow-hidden rounded-lg border-2 border-gray-200 text-center">
                                <img class="h-full w-full object-cover" src="{{ $galleryImage }}" alt="" />
                            </button>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            
            <script>
                // Add a click event listener to each button
                const imageButtons = document.querySelectorAll('.image-button');
                const mainImage = document.getElementById('main-produit-image');
            
                imageButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        imageButtons.forEach(btn => {
                            btn.classList.remove('border-gray-900');
                            btn.classList.add('border-gray-200');
                        });
                        const imageUrl = button.getAttribute('data-image');
                        button.classList.add('border-gray-900')
                        button.classList.remove('border-gray-200')
                        mainImage.src = imageUrl;
                    });
                });
            </script>
            
            </div>
      
            <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
              <h1 class="sm: text-2xl text-gray-900 sm:text-3xl font-Lato uppercase">{{ $product->nom }}</h1>
      
              <div class="mt-5 space-x-5 flex items-center">
                <div class="flex items-end">
                    <h1 class="text-3xl font-bold font-Lato">${{ $product->prix }}</h1>
                  </div>
                {{-- <div class="flex justify-center my-1">
                    <img src="{{ asset('images/star.png') }}" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                    <img src="{{ asset('images/star.png') }}" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                    <img src="{{ asset('images/star.png') }}" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                    <img src="{{ asset('images/star.png') }}" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                    <img src="{{ asset('images/star.png') }}" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                </div> --}}
                <div class="flex items-center">
                  <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
                  </svg>
                  <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
                  </svg>
                  <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
                  </svg>
                  <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
                  </svg>
                  <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
                  </svg>
                </div>
                <p class="ml-2 text-sm font-medium text-gray-500">10 Reviews</p>
              </div>
              <div class="mt-10 text-gray-500 font-Lato">
                {!! $product->description !!}
              </div>

              @if($product->quantite > 0)
              <form action="{{ route('cart.store', ['id' => $product->id]) }}" method="POST" class="w-full" id="cartForm">
                <input type="hidden" name="form_type" value="form1">
                @csrf
              <div class="my-10 flex items-center space-x-5" x-data="{ productQuantity: 1 ,Quantity: {{ $product->quantite }}}">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <label for="Quantity" > Quantité </label>
              
                <div class="flex items-center gap-1">
                  <button
                    type="button"
                    x-on:click="productQuantity--"
                    :disabled="productQuantity === 1"
                    class="w-10 h-10 leading-10 text-gray-600 transition hover:opacity-75"
                  >
                    &minus;
                  </button>
              
                  <input
                    type="number"
                    id="Quantity"
                    name="quantity"
                    x-model="productQuantity"
                    class="h-10 w-16 rounded border border-gray-200 text-center [-moz-appearance:_textfield] sm:text-sm [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none"
                    max="{{ $product->quantite }}"
                    readonly
                  />
              
                  <button
                    type="button"
                    x-on:click="productQuantity < Quantity ? productQuantity++ : null"
                    class="w-10 h-10 leading-10 text-gray-600 transition hover:opacity-75"
                  >
                    &plus;
                  </button>
                </div>
              </div>

              <div class="my-10 flex flex-col items-center justify-between space-y-4 md:space-x-4 border-t border-b py-4 sm:flex-row sm:space-y-0">

                  <button type="submit" class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-[#e9b5a8] bg-none py-2 text-center text-base font-bold text-white transition-all duration-200 w-full ease-in-out focus:shadow add-to-cart">
                      <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                      </svg>
                      Add to cart
                  </button>

              </form>

              <form action="{{ route('wishlist.store', ['id' => $product->id]) }}" method="POST" class="wishlist-form-product w-full" data-product-id="{{ $product->id }}">
                  @csrf
                  <input type="hidden" name="form_type" value="form2">
                  <button type="submit" class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-[#e9b5a8] bg-none py-2 text-center text-base font-bold text-white transition-all duration-200 w-full ease-in-out focus:shadow ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M17.53 2.47a5.5 5.5 0 00-7.78 0L10 2.99l-.75-.75a5.5 5.5 0 00-7.78 7.78l.22.23L10 18.23l8.31-8.31a5.5 5.5 0 000-7.78z" clip-rule="evenodd" />
                    </svg>
                    Add to Wishlist
                  </button>
                </form>

              
              @if (!Auth::check())
                  <script>
                      document.getElementById('wishlistFormProduct').addEventListener('submit', function(event) {
                          event.preventDefault(); // Prevent form submission
              
                          // Redirect to the login page
                          window.location.href = "{{ route('login') }}";
                      });
                  </script>
              @endif
              @if (!Auth::check())
                  <script>
                      document.getElementById('cartForm').addEventListener('submit', function(event) {
                          event.preventDefault(); // Prevent form submission
              
                          // Redirect to the login page
                          window.location.href = "{{ route('login') }}";
                      });
                  </script>
              @endif
              
              </div>
      
              <ul class="mt-8 space-y-2">
                <li class="flex items-center text-left text-sm font-medium text-gray-600">
                  <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" class=""></path>
                  </svg>
                  Shipping all over Morocco
                </li>
      
                <li class="flex items-center text-left text-sm font-medium text-gray-600">
                  <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" class=""></path>
                  </svg>
                  Cancel Anytime
                </li>
              </ul>
            </div>
            @endif
      

          </div>
        </div>
    </section>
    <section id="related_products" class="container mx-auto p-6">
        <h1 class="sm: text-2xl text-gray-900 sm:text-3xl font-Lato uppercase mb-5">Produits Liés</h1>

        <div class="flex justify-center md:justify-start space-x-5 items-center flex-wrap">
            @forelse ($relatedProducts as $relatedProduct)
            <div class="col-span-3">
              <div class="grid-cols-1 card w-72 ">
                  <div class="card-img relative transition-all">
                      <a href="#">
                      <div class="bg h-full opacity-0 w-full absolute top-0 left-0 transition-all"></div>
                      </a>
                      <a href="#">
                          <img src="{{ $relatedProduct->photo }}" class="w-full h-full h-[300px]" alt="">
                      </a>
                      <div class="icons  gap-3 items-center absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 hidden z-30">
                          <a href="/produit/{{ $relatedProduct->id }}">
                              <span class="w-8 border border-gray-200 p-2 text-center hover:bg-black hover:border-black hover:text-white">
                                  <i class="fa-solid fa-eye"></i>
                              </span>
                          </a>
                          <form action="{{ route('wishlist.store', ['id' => $relatedProduct->id]) }}" method="POST" class="wishlist-form-product" data-product-id="{{ $relatedProduct->id }}">
                            @csrf
                              <button type="submit" class="border border-gray-200 px-2.5 py-2.5 flex justify-center items-center hover:bg-black hover:border-black hover:text-white">
                                  <i class="fa-regular fa-heart"></i>
                              </button>
                          </form>
                      </div>
                  </div>
                  <div class="card-title">
                      <h4 class="text-center pt-3 text-lg uppercase fo font-Lato">{{ $relatedProduct->nom }}</h4>
                      <p class="text-center text-gray-400 font-cormorant">In Stock</p>
                      <p class="text-center text-gray-400 font-cormorant text-xl">${{ $relatedProduct->prix }}</p>
                      <div class="flex justify-center my-1">
                          <img src="{{ asset('images/star.png') }}" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                          <img src="{{ asset('images/star.png') }}" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                          <img src="{{ asset('images/star.png') }}" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                          <img src="{{ asset('images/star.png') }}" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                          <img src="{{ asset('images/star.png') }}" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                      </div>
                  </div>
              </div>
            </div>
            @empty
              
            @endforelse
        </div>
    </section>

    {{-- Cart Ajax Request --}}
    <script>
          document.getElementById('cartForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        const formData = new FormData(event.target); // Get form data
        const url = event.target.getAttribute('action'); // Get the form action URL
        
        // Perform Ajax request
        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector("[name=csrf-token]").content, // Add CSRF token
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update the cart content using the received data
                updateCartUI(data.carts);

                // document.getElementById('checkout-cart').classList.add = 'none';
                
                const subtotalPrice = document.getElementById('subtotalPrice');
          subtotalPrice.textContent = data.totalPrice ; // Assuming data.totalPrice is the updated total price
            } else {
              console.log(data.message);
              iziToast.error({
            title: '',
            position:'topRight',
            message: data.message
        });
                // Display an error message or take appropriate action
            }
        })
        .catch(error => {
            console.error('An error occurred:', error);
            // Handle errors, display error message, etc.
        });
      });


      function updateCartUI(carts) {
        const cartList = document.getElementById('cartList');
        cartList.innerHTML = ''; // Clear the existing content

        // Loop through the carts and create the updated cart items
        carts.forEach(cart => {
            const newItem = document.createElement('li');
            const csrf = document.head.querySelector("[name=csrf-token]").content;
            newItem.className = 'flex py-6';
            const id = `${cart.id}`;
            newItem.innerHTML = `
                <!-- Your complete HTML structure here -->
                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                    <img src="${cart.product.photo}" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
                </div>
                <div class="ml-4 flex flex-1 flex-col">
                    <div>
                        <div class="flex justify-between text-base font-medium text-gray-900">
                            <h3>
                                <a href="#">${cart.product.nom}</a>
                            </h3>
                            <p class="ml-4">$${cart.product.prix * cart.quantity}</p>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Salmon</p>
                    </div>
                    <div class="flex flex-1 items-end justify-between text-sm">
                        <p class="text-gray-500">Quantité ${cart.quantity}</p>
                        <form id="cart-id-${cart.id}" data-cart-id="${cart.id}" action="/cart/${cart.id}" method="POST" class="flex cart-remove-form">
                            <input type="hidden" name="_token"  value="${csrf}" >
                            <input type="hidden" name="_method" value="DELETE" >
                            <button type="submit" class="font-medium text-second-color remove-button">Remove</button>
                        </form>
                    </div>
                </div>
                <!-- Your complete HTML structure here -->
            `;
            cartList.appendChild(newItem);
        });
      }
    </script>
    {{-- Cart Ajax Request --}}

    {{-- Wishlist Request --}}
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          document.querySelectorAll('.wishlist-form-product').forEach(function(form) {
        form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        const formData = new FormData(event.target); // Get form data
        const url = event.target.getAttribute('action'); // Get the form action URL

        
        // Perform Ajax request
        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector("[name=csrf-token]").content, // Add CSRF token
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {

                console.log('Product added to wishlist successfully');
                // Update the wishlist content using the received data
                updateWishlistUI(data.wishlists);


            } else {
                console.error('Failed to add product to wishlist');
                // Display an error message or take appropriate action
            }
        })
        .catch(error => {
            console.error('An error occurred:', error);
            // Handle errors, display error message, etc.
          });
      });})

      function updateWishlistUI(wishlists) {
        const wishList = document.getElementById('wishlistList');
        wishList.innerHTML = ''; // Clear the existing content
        wishlists.forEach(item => {
            const newItem = document.createElement('li');
            newItem.className = 'flex py-6';
            newItem.id = `wishlist-id-${item.id}`;
            const id = `${item.id}`;
            const csrf = document.head.querySelector("[name=csrf-token]").content;
            newItem.innerHTML = `
                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                    <img src="${item.product.photo}" alt="Product Image" class="h-full w-full object-cover object-center">
                </div>
                <div class="ml-4 flex flex-1 flex-col">
                    <div>
                        <div class="flex justify-between text-base font-medium text-gray-900">
                            <h3>
                                <a href="#">${item.product.nom}</a>
                            </h3>
                            <form id="wishlist-id-${item.id}" data-wishlist-id="${item.id}" action="/wishlist/${item.id}" method="POST" class="flex wishlist-remove-form">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE" >
                                <button type="submit" class="font-medium text-second-color remove-wishlist">Remove</button>
                            </form>
                        </div>
                        
                    </div>
                    <form id="wishlistForm-${item.id}" action="/product_wishlist_to_cart/${item.product.id}/${item.id}" method="POST" class="cartForm flex flex-1 justify-between text-sm items-center">
                    @csrf
                        <input type="hidden" name="wishlist_id" value="${item.id}">
                        <div class="my-10 flex items-center" x-data="{ productQuantity: 1, Quantity: ${item.product.quantite} }">
                            <input type="hidden" name="product_id" value="${item.product.id}">
                            <label for="Quantity" class="text-gray-500"> Qty </label>
                            <div class="flex items-center gap-1">
                                <button
                                    type="button"
                                    x-on:click="productQuantity--"
                                    :disabled="productQuantity === 0"
                                    class="w-6 h-6 text-gray-600 transition hover:opacity-75"
                                >
                                    &minus;
                                </button>
                                <input
                                    type="number"
                                    id="Quantity"
                                    name="quantity"
                                    x-model="productQuantity"
                                    class="h-8 w-8 p-0 rounded border border-gray-200 text-center [-moz-appearance:_textfield] sm:text-sm [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none"
                                    max="${item.quantity}"
                                />
                                <button
                                    type="button"
                                    x-on:click="productQuantity < Quantity ? productQuantity++ : null"
                                    class="w-6 h-6 text-gray-600 transition hover:opacity-75"
                                >
                                    &plus;
                                </button>
                            </div>
                        </div>
                        <div>

                            <button type="submit" class="font-medium text-second-color text-[14px] add-wishlist-to-cart">Ajouter à la carte</button>
                        </div>
                    </form>
                </div>
            `;

            wishList.appendChild(newItem);
        });
      }})
    </script>
    {{-- Wishlist Request --}}




  
@include('pages.components.footer')
@include('pages.components.top')

@include('pages.components.cart')
@include('pages.components.wishlist')
@include('pages.components.popup')

@endsection