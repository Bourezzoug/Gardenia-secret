@if (Auth::check()) 
<!-- Check if user is logged in -->
@if (Auth::user()->utype === 0) 
<div class="relative z-[99999]" id="cart-list" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">

    <div class=" inset-0 bg-black bg-opacity-75 transition-opacity ease-in-out duration-500 opacity-0 " id="cart-overlay"></div>

    <div class="fixed  overflow-hidden" id="cart-content">
      <div class="absolute  overflow-hidden">
        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 transform transition ease-in-out  duration-00 sm:duration-700 translate-x-full" id="cart-wrapper">

          <div class="pointer-events-auto w-screen max-w-md">
            <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
              <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                <div class="flex items-start justify-between">
                  <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                  <div class="ml-3 flex h-7 items-center">
                    <button type="button" id="close-cart" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                      <span class="sr-only">Close panel</span>
                      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>
                </div>
  
                <div class="mt-8">
                  <div class="flow-root">
                    <ul role="list" id="cartList" class="-my-6 divide-y divide-gray-200">
                        @forelse ($carts as $cart)
                        <li class="flex py-6">
                            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                              <img src="{{ $cart->product->photo }}" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
                            </div>
      
                            <div class="ml-4 flex flex-1 flex-col">
                              <div>
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                  <h3>
                                    <a href="#">{{ $cart->product->nom }}</a>
                                  </h3>
                                  <p class="ml-4">${{ $cart->product->prix * $cart->quantity }}</p>
                                </div>
                                {{-- <p class="mt-1 text-sm text-gray-500">Salmon</p> --}}
                              </div>
                              <div class="flex flex-1 items-end justify-between text-sm">
                                <p class="text-gray-500">Quantité {{ $cart->quantity }}</p>
      
                                <form id="cart-id-{{ $cart->id }}" data-cart-id="{{ $cart->id }}" action="/cart/{{ $cart->id }}" method="POST" class="flex cart-remove-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-second-color remove-button">Remove</button>
                                </form>
                                
                              </div>
                            </div>
                          </li>
                        @empty
                            
                        @endforelse
                      <!-- More products... -->
                    </ul>
                    <ul role="list" id="boxCartList" class="-my-6 divide-y divide-gray-200">
                        @forelse ($boxCarts as $cart)
                        <li class="flex py-6">
                            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                              <img src="http://127.0.0.1:8000{{ $cart->box->image }}" alt="" class="h-full w-full object-cover object-center">
                            </div>
      
                            <div class="ml-4 flex flex-1 flex-col">
                              <div>
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                  <h3>
                                    <a href="#">{{ $cart->box->libelle }}</a>
                                  </h3>
                                  <p class="ml-4">${{ $cart->box->price  }}</p>
                                </div>
                                <p class="mt-1 text-sm text-gray-500">Box du mois</p>
                              </div>
                              <div class="flex flex-1 items-end justify-end text-sm">
                                {{-- <p class="text-gray-500">Quantité {{ $cart->quantity }}</p> --}}
      
                                <form id="cart-id-{{ $cart->id }}" data-cart-id="{{ $cart->id }}" action="/cart/{{ $cart->id }}" method="POST" class="flex cart-remove-form just">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-second-color remove-button">Remove</button>
                                </form>
                                
                              </div>
                            </div>
                          </li>
                        @empty
                            
                        @endforelse
                      <!-- More products... -->
                    </ul>
                  </div>
                </div>
              </div>
  
              <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                <div class="flex justify-between text-base font-medium text-gray-900">
                  <p>Subtotal</p>
                  <p>$<span class="total-price" id="subtotalPrice">{{ $totalPrice }}</span></p>
                </div>
                <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                <div class="mt-6">
                  {{-- <a href="#" id="checkout-cart" class="flex items-center justify-center rounded-md border border-transparent bg-second-color px-6 py-3 text-base font-medium text-white shadow-sm hover:scale-110 transition-transform">Checkout</a> --}}

                  @if(!$carts->isEmpty())
                  <a href="/checkout" id="" class="flex items-center justify-center rounded-md border border-transparent bg-second-color px-6 py-3 text-base font-medium text-white shadow-sm hover:scale-110 transition-transform">Checkout</a>
                  @elseif($carts->isEmpty())
                  <a href="#" class="flex items-center justify-center rounded-md border border-transparent bg-second-color px-6 py-3 text-base font-medium text-white shadow-sm cursor-not-allowed">Checkout</a>
                  @endif
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


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

    {{-- <script>
      // Get all the delete forms using the common class
      var deleteForms = document.querySelectorAll('.cart-remove-form');
    
      // Attach event listeners to each delete form
      deleteForms.forEach(function(form) {
        form.addEventListener('submit', function(event) {
          event.preventDefault(); // Prevent the form from submitting normally
    
          var url = form.getAttribute('action');
          var csrfToken = "{{ csrf_token() }}";
    
          var xhr = new XMLHttpRequest();
          xhr.open('DELETE', url, true);
          xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    
          xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                  // Update the cart content and total price
                  // Example: document.getElementById('cartContent').innerHTML = ...
                  // Example: document.getElementById('totalPrice').innerHTML = ...
                } else {
                  console.log('Error: Failed to delete item from cart.');
                }
              } else {
                console.log('Error: ' + xhr.status);
              }
            }
          };
    
          xhr.send();
        });
      });
    </script> --}}
    <script>document.addEventListener('DOMContentLoaded', function() {
      document.addEventListener('click', function(event) {
          const removeButton = event.target.closest('.remove-button');
          if (removeButton) {
              event.preventDefault(); // Prevent default behavior of the button
  
              const cartForm = removeButton.closest('.cart-remove-form');
              const cartId = cartForm.getAttribute('data-cart-id');
              const csrfToken = document.head.querySelector("[name=csrf-token]").content;
  
              // Send an AJAX request to remove the cart item
              fetch(`/cart/${cartId}`, {
                  method: 'DELETE',
                  headers: {
                      'X-CSRF-TOKEN': csrfToken,
                  },
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      // Handle the successful removal (e.g., remove the item from the UI)
                      const cartItem = cartForm.closest('.flex.py-6');
                      if (cartItem) {
                          cartItem.remove();
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
  });</script>
</div>
@endif
@endif

@if (Auth::check())
@if (Auth::user()->utype === 0) 
<div id="shopping" class="fixed right-0 top-1/2 -translate-y-1/2 z-[9999]">
  <div id="cart" class="bg-second-color text-white p-2 flex items-center gap-2 shadow-lg cursor-pointer z-[99999]">
    <i class="fa-solid fa-cart-shopping "></i>
    {{-- <p class="text-sm">BUY NOW</p> --}}
  </div>
  <div id="wishlist" class="text-second-color bg-white p-2 flex items-center gap-2 shadow-lg mt-2 cursor-pointer z-[99999]">
    <i class="fa-regular fa-heart"></i>
    {{-- <p class="text-sm">WISHLIST</p> --}}
  </div>
</div>
@endif
@endif