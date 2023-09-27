@if (Auth::check()) 
<!-- Check if user is logged in -->
@if (Auth::user()->utype === 0) 
<div class="relative z-[99999]" id="wishlist-list" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">

    <div class=" inset-0 bg-black bg-opacity-75 transition-opacity ease-in-out duration-500 opacity-0 " id="wishlist-overlay"></div>

    <div class="fixed  overflow-hidden" id="wishlist-content">
      <div class="absolute  overflow-hidden">
        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 transform transition ease-in-out  duration-00 sm:duration-700 translate-x-full" id="wishlist-wrapper">

          <div class="pointer-events-auto w-screen max-w-md">
            <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
              <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                <div class="flex items-start justify-between">
                  <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping wishlist</h2>
                  <div class="ml-3 flex h-7 items-center">
                    <button type="button" id="close-wishlist" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                      <span class="sr-only">Close panel</span>
                      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>
                </div>
  
                <div class="mt-8">
                  <div class="flow-root">
                    <ul id='wishlistList' role="list" class="-my-6 divide-y divide-gray-200">
                        @forelse ($wishlists as $wishlist)
                        <li class="flex py-6">
                            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                              <img src="{{ $wishlist->product->photo }}" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
                            </div>
      
                            <div class="ml-4 flex flex-1 flex-col">
                              <div>
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                  <h3>
                                    <a href="#">{{ $wishlist->product->nom }}</a>
                                  </h3>
                                  <form id="wishlist-id-{{ $wishlist->id }}" data-wishlist-id="{{ $wishlist->id }}" action="/wishlist/{{ $wishlist->id }}" method="POST" class="flex wishlist-remove-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-second-color text-[14px] remove-wishlist">Remove</button>
                                  </form>
                                </div>
                                
                              </div>
                              <form id="wishlistForm" action="{{ route('wishlist.store_cart', ['id' => $wishlist->product->id,'wishlist_id' => $wishlist->id]) }}" method="POST" class="cartForm flex flex-1  justify-between text-sm items-center">
                                @csrf
                                <input type="hidden" name="wishlist_id" value="{{ $wishlist->id }}">
                                <div class="my-10 flex items-center " x-data="{ productQuantity: 1,Quantity: {{ $wishlist->product->quantite }}}">
                                  <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">
                                  <label for="Quantity" class="text-gray-500"> Qty </label>
                                
                                  <div class="flex items-center gap-1">
                                    <button
                                      type="button"
                                      x-on:click="productQuantity--"
                                      :disabled="productQuantity === 1"
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
                                      max="{{ $wishlist->quantity }}"
                                    />
                                
                                    <button
                                      type="button"
                                      x-on:click="productQuantity < Quantity ? productQuantity++ : null"
                                      class="w-6 h-6  text-gray-600 transition hover:opacity-75"
                                    >
                                      &plus;
                                    </button>
                                  </div>
                                </div>
                                  <div>
                                    <input type="hidden" name="form_type" value="form1">
                                    @csrf
                                    <button type="submit" class="font-medium text-second-color text-[14px]">Ajouter à la carte</button>
                                  </div>
                                </form>
      

                                
                                
                            </div>
                          </li>
                        @empty
                            
                        @endforelse
                    </ul>
                  </div>
                </div>
              </div>
  
              <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                <div class="flex justify-between text-base font-medium text-gray-900">
                  <p>Subtotal</p>
                  {{-- <p><span class="total-price">{{ $totalPrice }}</span><sup>dhs</sup></p> --}}
                </div>
                <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                <div class="mt-6">
                  <a href="#" class="flex items-center justify-center rounded-md border border-transparent bg-second-color px-6 py-3 text-base font-medium text-white shadow-sm hover:scale-110 transition-transform">Checkout</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @if(!$wishlists->isEmpty())
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var cartForm = document.getElementById('cartForm');
            if (cartForm) {
                cartForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    var formAction = this.getAttribute('action');
                    var formData = new FormData(this);

                    fetch(formAction, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: formData
                    })
                    .then(function(response) {
                        if (response.ok) {
                            return response.json();
                        } else {
                            throw new Error('Error adding product to cart');
                        }
                    })
                    .then(function(data) {
                        if (data.success) {
                            // Display a success message or perform any desired action
                            console.log('Product added to cart successfully');

                            // Update the cart view with the new data
                            updateCartView(data.carts, data.totalPrice);
                        } else {
                            throw new Error('Error adding product to cart');
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
                });
            }

            

            // Function to update the cart view with the new data
        // ...

        function updateCartView(carts, totalPrice) {
            var cartList = document.querySelector('ul[role="list"]');
            if (cartList) {
                // Clear the current cart items
                cartList.innerHTML = '';

                // Append the updated cart items
                carts.forEach(function(cart) {
                    var listItem = document.createElement('li');
                    listItem.classList.add('flex', 'py-6');

                    // Customize the cart item structure based on your requirement
                    var totalPrices = cart.product.prix * cart.quantity;
                    var cartItemHtml = `
                        <!-- Customize the cart item HTML structure here -->
                        <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                            <img src="${cart.product.photo}" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
                        </div>
                        <div class="ml-4 flex flex-1 flex-col">
                            <div>
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <h3>
                                        <a href="#">${cart.product.nom}</a>
                                    </h3>
                                    <p class="ml-4">${totalPrices} <sup>dhs</sup></p>
                                </div>
                                <p class="mt-1 text-sm text-gray-500">Salmon</p>
                            </div>
                            <div class="flex flex-1 items-end justify-between text-sm">
                                <p class="text-gray-500">Quantité ${cart.quantity}</p>
                                <form id="cart-id" action="{{ route('cart.delete', ['id' => $wishlist->id]) }}" method="POST" class="flex cart-remove-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-second-color">Remove</button>
                                </form>
                            </div>
                        </div>
                    `;

                    listItem.innerHTML = cartItemHtml;

                    // Append the cart item to the cart list
                    cartList.appendChild(listItem);
                });

                // Update the total price element
                var totalPriceElement = document.querySelector('.total-price');
                if (totalPriceElement) {
                    totalPriceElement.textContent = totalPrice + totalPrices ;
                }
            }
        }

        // ...

        });
    </script> --}}

    
    @endif

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var cartForms = document.querySelectorAll('.cart-remove-form');
            cartForms.forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    var cartItem = this.closest('.flex.py-6'); // Adjust the selector according to your cart item structure
                    var formAction = this.getAttribute('action');

                    fetch(formAction, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(function(response) {
                        if (response.ok) {
                            cartItem.remove(); // Remove the cart item element from the cart display on the page
                        } else {
                            console.log('Error deleting cart item');
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
                });
            });
        });
    </script> --}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('click', function(event) {
        const removeButton = event.target.closest('.remove-wishlist');
        if (removeButton) {
            event.preventDefault(); // Prevent default behavior of the button

            const wishlistForm = removeButton.closest('.wishlist-remove-form');
            const wishlistId = wishlistForm.getAttribute('data-wishlist-id');
            const csrfToken = '{{ csrf_token() }}';

            // Send an AJAX request to remove the cart item
            fetch(`/wishlist/${wishlistId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Handle the successful removal (e.g., remove the item from the UI)
                    const wishlistItem = wishlistForm.closest('.flex.py-6');
                    if (wishlistItem) {
                        wishlistItem.remove();
                                                // Update the total price
                const totalElement = document.querySelector('.total-price');
                if (totalElement) {
                    totalElement.textContent = data.totalPrice;
                }

                    }

                } else {
                    console.error('Failed to remove cart item');
                }
            })
            .catch(error => {
                console.error('An error occurred:', error);
            });
        }
    });
  });
</script>
<script>
      document.getElementById('wishlistForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        
        const formData = new FormData(event.target); // Get form data
        const url = event.target.getAttribute('action'); // Get the form action URL
        
        // Perform Ajax request
        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Product added to cart successfully');
                
                // Update the cart content using the received data
                updateCartUIFromWishlist(data.carts);
                // Handle the successful removal of the wishlist item
                // const wishlistItem = wishlistForm.closest('.flex.py-6');
                //   if (wishlistItem) {
                //       wishlistItem.remove();
                //   }

                // const subtotalPrice = document.getElementById('subtotalPrice');
          subtotalPrice.textContent = data.totalPrice ; // Assuming data.totalPrice is the updated total price
            } else {
                console.error('Failed to add product to cart');
                // Display an error message or take appropriate action
            }
        })
        .catch(error => {
            console.error('An error occurred:', error);
            // Handle errors, display error message, etc.
        });
    });

    // Update the cart UI with the new cart data
    function updateCartUIFromWishlist(carts) {
        const cartList = document.getElementById('cartList');
        cartList.innerHTML = ''; // Clear the existing content

        // Loop through the carts and create the updated cart items
        carts.forEach(cart => {
            const newItem = document.createElement('li');
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
                            <p class="ml-4">${cart.product.prix * cart.quantity} <sup>dhs</sup></p>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Salmon</p>
                    </div>
                    <div class="flex flex-1 items-end justify-between text-sm">
                        <p class="text-gray-500">Quantité ${cart.quantity}</p>
                        <form id="cart-id-${cart.id}" data-cart-id="${cart.id}" action="/cart/${cart.id}" method="POST" class="flex cart-remove-form">
                            @csrf
                            @method('DELETE')
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
</div>
@endif
@endif