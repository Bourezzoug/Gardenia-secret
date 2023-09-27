@extends('layouts.frontend')
@section('content')
<div class="fixed inset-0 bg-black opacity-80 z-[9999] header-overlay  hidden" id="header-overlay"></div>


@include('pages.components.header')
<div class="container mx-auto p-6 grid grid-cols-12 gap-5 bg-[#f9fafb] my-10 border  rounded-lg">

    <div class="col-span-12 lg:col-span-6">
        @if (!$carts->isEmpty())
            <form id="orderForm" action="{{ route('confirm_order') }}" method="POST">
            @csrf
        <div >
            <h2 class="text-xl font-Lato p-2">Contact Information</h2>
            <div class="py-5 xl:mr-6 ml-3 ">
                <x-label for="email"  value="{{ __('Email address') }}"/>
                <x-input name="email" id="titre" type="text" class="mt-1 block w-full  input-field" required />
                <span for="family_name" id="email_error" class="mt-2 text-red-600 text-xs"></span>
            </div> 
            <div class="py-5 xl:mr-6 ml-3   flex items-center space-between space-x-5 pb-8 border-b">
                <div class="w-full">
                    <x-label for="first_name"  value="{{ __('First name') }}"/>
                    <x-input name="first_name" id="first_name" type="text" class="mt-1 block w-full  input-field" required/>
                    <span for="family_name" id="first_name_error" class="mt-2 text-red-600 text-xs"></span>
                </div> 
                <div class="w-full ">
                    <x-label for="family_name"  value="{{ __('Last name') }}"/>
                    <x-input name="family_name" id="family_name" type="text" class="mt-1 block w-full  input-field" required/>
                    <span for="family_name" id="family_name_error" class="mt-2 text-red-600 text-xs"></span>
                </div> 
            </div>
        </div>
        <div >
            <h2 class="text-xl font-Lato p-2 mt-5">Shipping information</h2>

            <div class="py-5 xl:mr-6 ml-3 pb-2">
                <x-label for="address"  value="{{ __('Address') }}"/>
                <x-input name="address" id="address" type="text" class="mt-1 block w-full  input-field" required/>
                <span for="family_name" id="address_error" class="mt-2 text-red-600 text-xs"></span>
            </div> 
            <div class="py-5 xl:mr-6 ml-3 pb-2 ">
                <x-label for="phone_number"  value="{{ __('Phone Number') }}"/>
                <x-input name="phone_number" id="phone_number" type="text" class="mt-1 block w-full  input-field" required/>
                <span for="family_name" id="phone_number_error" class="mt-2 text-red-600 text-xs"></span>
            </div> 
            <div class="py-5 xl:mr-6 ml-3 pb-2  flex items-center space-between space-x-5">
                <div class="w-full">
                    <x-label for="city"  value="{{ __('City') }}"/>
                    <x-input name="city" id="city" type="text" class="mt-1 block w-full  input-field" required/>
                    <span for="family_name" id="city_error" class="mt-2 text-red-600 text-xs"></span>
                </div> 

                <div class="w-full">
                    <x-label for="country"  value="{{ __('Country') }}"/>
                    <x-select name="country"  class="input-field mt-1" required>
                        <option value="" readonly="true" hidden="true" selected>{{ __('Country') }}</option>
                        <option value="United state">United states</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Spain">Spain</option>
                    </x-select>
                    <span for="family_name" id="country_error" class="mt-2 text-red-600 text-xs"></span>
                </div> 
            </div>
            <div class="py-5 xl:mr-6 ml-3 pb-2  flex items-center space-between space-x-5">
                <div class="w-full">
                    <x-label for="state_province"  value="{{ __('State / Province') }}"/>
                    <x-input name="state_province" id="state_province" type="text" class="mt-1 block w-full  input-field" required/>
                    <span for="family_name" id="state_province_error" class="mt-2 text-red-600 text-xs"></span>
                </div> 
                <div class="w-full">
                    <x-label for="postal_code"  value="{{ __('Postal code') }}"/>
                    <x-input name="postal_code" id="postal_code" type="text" class="mt-1 block w-full  input-field" required/>
                    <span for="family_name" id="postal_code_error" class="mt-2 text-red-600 text-xs"></span>
                </div> 
            </div>
        </div>

                <div  class="px-4 my-5 confirm-order-button">
                    <button id="submitButton" type="submit" class="flex items-center justify-center px-4 py-2 w-full rounded-lg bg-white border-2 border-main-color text-main-color">
                        <span id="buttonText" >Confirm Order</span>
                        <div id="html-spinner" class="w-[30px] h-[30px] top-[5px] hidden"></div>
                        <i class="fa-solid fa-circle-check text-main-color text-3xl hidden"></i>
                    </button>
                </div>
        </form>
        @else
        <div>
            <h2 class="text-xl font-Lato p-2">Contact Information</h2>
            <p class="text-md font-Lato p-2 ">Your cart is empty</p>
        </div>
        @endif
    </div>
    <div class="col-span-12 lg:col-span-6">
        <h2 class="text-xl font-Lato p-2 ">Order summary</h2>
        @if (!$isEmptyCart || !$isEmptyCartBox)
        <div class="w-full bg-white border rounded-sm mt-8">

            @if (!$isEmptyCart)
            @forelse ($carts as $cart)
            <div class="flex justify-between items-center  px-4 py-10 border-b">
                <div class="flex space-x-3">
                    <div>
                        <img src="{{ $cart->product->photo }}" class="w-20 h-full" alt="">
                    </div>
                    <div class="flex flex-col justify-between">
                        <div>
                            <h4 class="text-md text-gray-700 font-Lato">{{ $cart->product->nom }}</h4>
                            <p class="my-1 text-gray-400">Accessoires</p>
                        </div>
                        <div>
                            <span>${{ $cart->product->prix * $cart->quantity }}</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-between h-[120px] items-end">

                    <form action="{{ route('cart.delete', ['id' => $cart->id]) }}" method="POST" class="cursor-pointer px-2" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="remove-button">
                            <x-svg.svg-delete class="w-5 h-5 mr-2 transform text-gray-500 hover:text-gray-700 hover:scale-110 transition-all"/>
                        </button>
                    </form>
                    <div class=" flex items-center " >
                        <label for="Quantity" class="text-gray-500"> Quantity: <span class="text-gray-600">{{ $cart->quantity }}</span></label>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse

            @endif




            @if (!$isEmptyCartBox)
            @forelse ($boxCarts as $cart)
            <div class="flex justify-between items-center  px-4 py-10 border-b box-cart" data-price="{{ $cart->box->price }}">
                <div class="flex space-x-3">
                    <div>
                        <img src="{{ $cart->box->image }}" class="w-20 h-28 object-cover" alt="">
                    </div>
                    <div class="flex flex-col justify-between">
                        <div>
                            <h4 class="text-md text-gray-700 font-Lato">{{ $cart->box->libelle }}</h4>
                            <p class="my-1 text-gray-400">Accessoires</p>
                        </div>
                        <div>
                            <span>{{ $cart->box->price }} $</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-between h-[120px] items-end">

                    <form action="{{ route('cart.delete', ['id' => $cart->id]) }}" method="POST" class="cursor-pointer px-2" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="remove-button">
                            <x-svg.svg-delete class="w-5 h-5 mr-2 transform text-gray-500 hover:text-gray-700 hover:scale-110 transition-all"/>
                        </button>
                    </form>
                </div>
            </div>
            @empty
                
            @endforelse
            @endif



            


            <div  class="my-6 total-price-container">
                <div class="flex justify-between items-center w-full mb-5 px-4">
                    <p class=" text-md font-medium">Total</p>
                    <p class=" text-md font-medium" ><span id="totalPrice">${{ $totalPrice }}</span></p>
                </div>
            </div>
            <div id="paymentButtons" class="px-4  fade-in flex items-center space-x-4" >
            </div>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                var orderForm = document.getElementById('orderForm');
                var submitButton = document.getElementById('submitButton');
                var htmlSpinner = document.getElementById('html-spinner');
                var checkIcon = document.querySelector('.fa-circle-check');
                orderForm.addEventListener('submit', function(event) {
                    event.preventDefault();

                    var formData = new FormData(orderForm);

                    fetch(orderForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-Token': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (!data.success) {
                            ;
                            console.log(displayErrors(data.errors))
                        } else {

                                document.getElementById('buttonText').innerText = '';
                                htmlSpinner.classList.remove('hidden');


                            setTimeout(function() {
                                htmlSpinner.classList.add('hidden');
                                checkIcon.classList.remove('hidden');
                                // paymentButtons.style.display = 'block';
                            },1000)
                            // Disable button
                            submitButton.disabled = true;

                            setTimeout(function() {
                                document.querySelector('.total-price-container').classList.add('border-b');
                                paymentButtons.classList.add('active');
                                paymentButtons.classList.add('my-5');
                                // Paypal Integration Form: 
                                var csrf = document.head.querySelector("[name=csrf-token]").content
                                var paypalForm = document.createElement('form');
                                var inputForm = document.createElement('input');
                                var inputForm2 = document.createElement('input');
                                var buttonForm = document.createElement('button');
                                var iconFormPaypal = document.createElement('i');
                                paypalForm.classList.add('w-100')

                                inputForm.setAttribute('type','hidden') 
                                inputForm.setAttribute('name','_token') 
                                inputForm.setAttribute('value',csrf) 
                                buttonForm.setAttribute('type','submit') 
                                buttonForm.setAttribute('class','px-4 py-2 w-full rounded-lg bg-main-color text-white') 
                                iconFormPaypal.setAttribute('class','fa-brands fa-cc-paypal text-3xl')
                                paypalForm.action = '{{ route('paypal') }}';
                                paypalForm.method = 'POST';
                                buttonForm.appendChild(iconFormPaypal)
                                paypalForm.appendChild(inputForm)
                                paypalForm.appendChild(buttonForm)
                                paymentButtons.appendChild(paypalForm);

                                // Stripe Integration Form:
                                var StripeForm = document.createElement('form');
                                StripeForm.classList.add('w-100')
                                StripeForm.action = '{{ route('stripe') }}';
                                StripeForm.method = 'POST';
                                // var inputForm = document.createElement('input');
                                var buttonFormStripe = document.createElement('button');
                                var iconFormStripe1 = document.createElement('i');
                                var iconFormStripe2 = document.createElement('i');

                                buttonFormStripe.setAttribute('type','submit') 
                                buttonFormStripe.setAttribute('class','px-4 py-2 w-full rounded-lg  bg-[#e9b5a8] text-white') 
                                iconFormStripe1.setAttribute('class','fa-brands fa-cc-visa text-3xl mr-2')
                                iconFormStripe2.setAttribute('class','fa-brands fa-cc-mastercard text-3xl')
                                inputForm2.setAttribute('type','hidden') 
                                inputForm2.setAttribute('name','_token') 
                                inputForm2.setAttribute('value',csrf) 
                                buttonFormStripe.appendChild(iconFormStripe1)
                                buttonFormStripe.appendChild(iconFormStripe2)
                                StripeForm.appendChild(inputForm2)
                                StripeForm.appendChild(buttonFormStripe)
                                paymentButtons.appendChild(StripeForm);
                            }, 2000);

                        }
                    })
                    .catch(error => console.error('Error:', error));
                });

                function displayErrors(errors) {
                    for (const [key, value] of Object.entries(errors)) {
                        var errorElement = document.getElementById(key + '_error');
                        if (errorElement) {
                            errorElement.innerText = value[0];
                        }
                        console.log(key + '_error')
                        console.log(value[0])
                    }

                }
            });
            </script>

        </div>
        @else
            <p class="text-md font-Lato p-2 ">There's no products in your cart</p>
        @endif
    </div>
</div>
@include('pages.components.footer')
@include('pages.components.cart')
@include('pages.components.top')
@include('pages.components.wishlist')
@if (Session::has('success'))
@section('script')
<script>
    iziToast.success({
        title: '',
        position:'topRight',
        message: '{{ session()->get('success') }}'
    });
</script>
@endsection
@endif

@if (Session::has('cancel'))
@section('script')
<script>
    iziToast.error({
        title: '',
        position:'topRight',
        message: '{{ session()->get('cancel') }}'
    });
</script>
@endsection
@endif
@if (Session::has('customer'))
<p>{{ $customer->name }}</p>
@endif


@endsection