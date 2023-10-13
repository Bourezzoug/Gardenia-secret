@extends('layouts.frontend')

@section('content')

@include('pages.components.header')
<div id="hero-section">
    <div class="title" style="background-image: url('https://biagiotti.qodeinteractive.com/wp-content/uploads/2019/07/title-img-1.jpg')">
        <div class="h-56 relative">
            <div class="absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2">
                <h2 class="text-3xl font-Lato tracking-wider">PRODUITS</h2>
            </div>
        </div>
    </div>
</div>
    <section id="e-shop" class="container mx-auto p-6 my-10">
        <div class="grid grid-cols-12 gap-5">
            <div class="lg:col-span-3 col-span-4">
                <div class="mt-10">
                    <form action="{{ route('e-shop.index') }}" method="GET">
                    <h4 class="pb-5 font-Lato text-[17px] uppercase" >Filtre</h4>
                    <div x-data="range()" x-init="mintrigger(); maxtrigger()" class="relative max-w-xl w-full">
                      <div>
                        <input id="minPrice" type="range" step="10" x-bind:min="min" x-bind:max="max" x-on:input="mintrigger" x-model="minprice" name="minPrice" class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">
                  
                        <input id="maxPrice" type="range" step="10" x-bind:min="min" x-bind:max="max" x-on:input="maxtrigger" x-model="maxprice" name="maxPrice" class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">
                  
                        <div class="relative z-10 h-1">
                  
                          <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
                  
                          <div class="absolute z-20 top-0 bottom-0 rounded-md bg-second-color" x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>
                  
                          <div class="absolute z-30 w-5 h-5 top-0 left-0 bg-white border-black border-2 rounded-full -mt-2" x-bind:style="'left: '+minthumb+'%'"></div>
                  
                          <div class="absolute z-30 w-5 h-5 top-0 right-0 bg-white border-black border-2 rounded-full -mt-2" x-bind:style="'right: '+maxthumb+'%'"></div>
                  
                        </div>
                  
                      </div>
                      
                        {{-- @csrf --}}
                        <div class="flex items-center justify-between pt-5 px-3">
                            <div class="flex items-center font-cormorant">
                                <p maxlength="5" x-on:input.debounce.300="maxtrigger" wire:model.debounce="minprice" x-text="minprice"></p>
                                <span>-</span>
                                <p maxlength="5" x-on:input.debounce.300="maxtrigger" wire:model.debounce="maxPrice" x-text="maxprice"></p>
                                $

                            </div>
                        </div>
                        <div class="my-16">
                            <h4 class="pb-5 font-Lato text-[17px] uppercase">Search</h4>
                            <div class="relative">
                                <input type="search" class="w-full font-cormorant py-3" placeholder="Nom de produit" name="search" />
                                <i class="fa-solid fa-magnifying-glass absolute top-1/2 -translate-y-1/2 right-4"></i>
                            </div>
                        </div>
                        <button type="submit" class="text-black bg-white border border-black hover:bg-black hover:text-white transition-all py-1 px-5 font-cormorant">Cherchez</button>
                    </form>
                    
                        <div class="mt-10 ">
                            <div>
                                <h4 class="pb-5 font-Lato text-[17px] uppercase" >Instagram</h4>
                                <div class="grid grid-cols-4 gap-5">
                                    <div class="col-span-2 relative insta-card">
            
                                        <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                                            <div class="absolute left-0 bottom-0 w-full h-0 z-10 insta-overlay transition-all"
                                            style="background-image: linear-gradient(180deg,transparent,rgba(255,255,255,.7));"></div>
                                            <img src="{{ asset('images/gardenia_insta.jpeg') }}" class="w-full  h-32 object-cover" alt="">
                                        </a>
                                    </div>
                                    <div class="col-span-2 relative insta-card">
                                        <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                                            <div class="absolute left-0 bottom-0 w-full h-0 z-10 insta-overlay transition-all"
                                            style="background-image: linear-gradient(180deg,transparent,rgba(255,255,255,.7));"></div>
                                            <img src="{{ asset('images/gardenia_insta_2.jpeg') }}" class="w-full  h-32 object-cover" alt="">
                                        </a>
                                    </div>
                                    <div class="col-span-2 relative insta-card">
                                        <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                                            <div class="absolute left-0 bottom-0 w-full h-0 z-10 insta-overlay transition-all"
                                            style="background-image: linear-gradient(180deg,transparent,rgba(255,255,255,.7));"></div>
                                            <img src="{{ asset('images/gardenia_test_3.jpeg') }}" class="w-full  h-32 object-cover" alt="">
                                        </a>
                                    </div>
                                    <div class="col-span-2 relative insta-card">
                                        <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                                            <div class="absolute left-0 bottom-0 w-full h-0 z-10 insta-overlay transition-all"
                                            style="background-image: linear-gradient(180deg,transparent,rgba(255,255,255,.7));"></div>
                                            <img src="{{ asset('images/gardenia_instagram_4.png') }}" class="w-full  h-32 object-cover" alt="">
                                        </a>
                                    </div>
                                    <div class="col-span-2 relative insta-card">
                                        <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                                            <div class="absolute left-0 bottom-0 w-full h-0 z-10 insta-overlay transition-all"
                                            style="background-image: linear-gradient(180deg,transparent,rgba(255,255,255,.7));"></div>
                                            <img src="{{ asset('images/gardenia_instagram_5.png') }}" class="w-full  h-32 object-cover" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-16">
                            <h4 class="pb-5 font-Lato text-[17px] uppercase" >Newsletter</h4>
                            <form action="{{ Route('email.store') }}" method="POST" id="newsletter-shop">
                                @csrf
                                <div class="relative">
                                    <x-input type="email" class="w-full font-cormorant py-3" placeholder="Email" name="email" id="" />
                                    <button type="submit" class="absolute top-1/2 -translate-y-1/2 right-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="33px" height="33px" viewBox="0 0 33 33" enable-background="new 0 0 33 33" xml:space="preserve"><g><g><path d="M15.507,28.645l-5.318-7.705l9.854-9.13L8.01,17.781l-5.317-7.706l26.524-4.599L15.507,28.645z M11.504,21.084    l3.938,5.707L27.252,6.833L4.403,10.794L8.341,16.5l14.36-7.127l0.563,0.814L11.504,21.084z"></path></g></g></svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                  


                  </div>
            </div>
            <div class="lg:col-span-9 col-span-8">
                <div id="products-container" class="grid grid-cols-6 gap-5">
                    @forelse ($products as $product)
                    <div class="col-span-3 lg:col-span-2 card ">
                        <div class="card-img relative transition-all lg:h-[350px]">
                            <a href="#">
                            <div class="bg h-full opacity-0 w-full absolute top-0 left-0 transition-all"></div>
                            </a>
                            <a href="#">
                                <img src="{{ $product->photo }}" class="w-full h-full border border-gray-100" alt="">
                            </a>
                            <div class="icons  gap-3 items-center absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 hidden z-30">
                                <a href="/produit/{{ $product->id }}">
                                    <span class="w-8 border border-gray-200 p-2 text-center hover:bg-black hover:border-black hover:text-white">
                                        <i class="fa-solid fa-eye"></i>
                                    </span>
                                </a>
                                <form action="{{ route('wishlist.store', ['id' => $product->id]) }}" method="POST" class="wishlist-form-product w-full" data-product-id="{{ $product->id }}">
                                    @csrf
                                    <button type="submit" class="w-8 border flex justify-center py-2.5 px-4 border-gray-200  text-center hover:bg-black hover:border-black hover:text-white">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-title">
                            <h4 class="text-center pt-3 text-lg uppercase fo font-Lato">{{ $product->nom }}</h4>
                            <p class="text-center text-gray-400 font-cormorant">In Stock</p>
                            <p class="text-center text-gray-400 font-cormorant text-xl">${{ $product->prix }}</p>
                            <div class="flex justify-center my-1 ">
                                <img src="images/star.png" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                                <img src="images/star.png" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                                <img src="images/star.png" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                                <img src="images/star.png" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                                <img src="images/star.png" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                            </div>
                        </div>
                    </div>
                    @empty
                        
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    @if (!Auth::check())
    <script>
        document.getElementById('wishlist-eshop').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
            // Redirect to the login page
            window.location.href = "{{ route('login') }}";
        });
    </script>
@endif

<script>
        var newsLetterFormShop = document.getElementById('newsletter-shop');
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        newsLetterFormShop.addEventListener('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(newsLetterFormShop);

            var xhr = new XMLHttpRequest();
            xhr.open(newsLetterFormShop.method, newsLetterFormShop.action);
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
{{-- Script to add the products to the wishlists --}}
<script>
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
                        <input type="hidden" name="_token"  value="${csrf}" >
                        <input type="hidden" name="_method" value="DELETE" >
                            <button type="submit" class="font-medium text-second-color remove-wishlist">Remove</button>
                        </form>
                    </div>
                    
                </div>
                <form id="wishlistForm" action="/product_wishlist_to_cart/${item.product.id}/${item.id}" method="POST" class="cartForm flex flex-1 justify-between text-sm items-center">
                <input type="hidden" name="_token"  value="${csrf}" >
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
    }
</script>
{{-- Script to add the products to the wishlists --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
    function sendAjaxRequest() {
        var minPrice = document.getElementById('minPrice').value;
        var maxPrice = document.getElementById('maxPrice').value;

        var xhr = new XMLHttpRequest();
        xhr.open('GET', '{{ route('e-shop.index') }}?minPrice=' + minPrice + '&maxPrice=' + maxPrice, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest'); // Set a header to indicate an AJAX request

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                var responseData = JSON.parse(xhr.responseText);
                // renderProducts(responseData.products);
                console.log(responseData);
            } else {
                console.error('Error fetching data');
            }
        };

        xhr.onerror = function() {
            console.error('Error fetching data');
        };

        xhr.send();
    }

    function renderProducts(data) {
        var productsContainer = document.getElementById('products-container');
        productsContainer.innerHTML = ''; // Clear existing content

        data.forEach(function(product) {
            var productElement = document.createElement('div');
            productElement.classList.add('col-span-3', 'lg:col-span-2', 'card');

            var innerHTML = 
            `
    <div class="col-span-3 lg:col-span-2 card ">
        <div class="card-img relative transition-all lg:h-[350px]">
            <a href="#">
                <div class="bg h-full opacity-0 w-full absolute top-0 left-0 transition-all"></div>
            </a>
            <a href="#">
                <img src="{{ $product->photo }}" class="w-full h-full border border-gray-100" alt="">
            </a>
            <div class="icons  gap-3 items-center absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 hidden z-30">
                <a href="/produit/{{ $product->id }}">
                    <span class="w-8 border border-gray-200 p-2 text-center hover:bg-black hover:border-black hover:text-white">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </a>
                <form action="{{ route('wishlist.store', ['id' => $product->id]) }}" method="POST" class="wishlist-form-product w-full" data-product-id="{{ $product->id }}">
                    @csrf
                    <button type="submit" class="w-8 border flex justify-center py-2.5 px-4 border-gray-200  text-center hover:bg-black hover:border-black hover:text-white">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="card-title">
            <h4 class="text-center pt-3 text-lg uppercase fo font-Lato">{{ $product->nom }}</h4>
            <p class="text-center text-gray-400 font-cormorant">In Stock</p>
            <p class="text-center text-gray-400 font-cormorant text-xl">${{ $product->prix }}</p>
            <div class="flex justify-center my-1 ">
                <img src="images/star.png" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                <img src="images/star.png" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                <img src="images/star.png" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                <img src="images/star.png" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
                <img src="images/star.png" class="w-5" style="width:1.25rem !important;height:1.25rem !important" alt="">
            </div>
        </div>
    </div>
`
            ;

            productElement.innerHTML = innerHTML;
            productsContainer.appendChild(productElement);
        });
    }

    document.getElementById('minPrice').addEventListener('input', sendAjaxRequest);
    document.getElementById('maxPrice').addEventListener('input', sendAjaxRequest);
});

</script>
@include('pages.components.footer')
@include('pages.components.top')
@include('pages.components.popup')

    @include('pages.components.cart')
    @include('pages.components.wishlist')


@endsection