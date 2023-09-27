@extends('layouts.frontend')
@section('content')
<div class="fixed inset-0 bg-black opacity-80 z-[9999] header-overlay  hidden" id="header-overlay"></div>

@include('pages.components.header')
<section class="bg-white mt-10">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 ">Become a <span class="border-b-4 border-r-4 border-second-color p-2 pb-1">Gardenia Member :</span></h2>
            <p class="mb-5 font-light text-gray-500 sm:text-xl ">You get to choose 5 - 6 full-size, brand name beauty products. <br>
                Select a bi-monthly, 6 or 12 months option below.</p>
        </div>
        <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
            @if($boxMonth->cheap_libelle)
            <!-- Pricing Card -->
            <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                <form action="{{ Route('box_to_cart.store',['id' => $boxMonth->id]) }}" method="POST">
                    @csrf
                <h3 class="mb-4 text-2xl font-semibold">{{ $boxMonth->cheap_libelle }}</h3>
                <p class="font-light text-gray-500 sm:text-lg ">{{ $boxMonth->cheap_description }}</p>
                <div class="flex justify-center items-baseline my-8">
                    <span class="mr-2 text-5xl font-extrabold">${{ $boxMonth->cheap_price }}</span>
                </div>
                <!-- List -->
                <ul role="list" class="mb-8 space-y-4 text-left">

                    @php
                    $optionsArray = explode(',', $boxMonth->cheap_options);
                    @endphp
                    @foreach ($optionsArray as $option)
                    <li class="flex items-center space-x-3">
                        <!-- Icon -->
                        <svg class="flex-shrink-0 w-5 h-5 text-main-color " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        <span>{{ $option }}</span>
                    </li>
                    @endforeach
                </ul>
                    <button type="submit" class="text-white bg-main-color  font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">Ajouter à la carte</button>
                </form>
            </div>
            <!-- Pricing Card -->
            @endif
            @if($boxMonth->med_libelle)
            <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                <form action="{{ Route('box_to_cart.store',['id' => $boxMonth->id]) }}" method="POST">
                    @csrf
                <h3 class="mb-4 text-2xl font-semibold">{{ $boxMonth->med_libelle }}</h3>
                <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">{{ $boxMonth->med_description }}</p>
                <div class="flex justify-center items-baseline my-8">
                    <span class="mr-2 text-5xl font-extrabold">${{ $boxMonth->med_price }}</span>
                </div>
                <!-- List -->
                <ul role="list" class="mb-8 space-y-4 text-left">

                    @php
                    $optionsArray = explode(',', $boxMonth->med_options);
                    @endphp
                    @foreach ($optionsArray as $option)
                    <li class="flex items-center space-x-3">
                        <!-- Icon -->
                        <svg class="flex-shrink-0 w-5 h-5 text-main-color " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        <span>{{ $option }}</span>
                    </li>
                    @endforeach
                </ul>
                    <button type="submit" class="text-white bg-main-color  font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">Ajouter à la carte</button>
                </form>
            </div>
            <!-- Pricing Card -->
            @endif
            @if ($boxMonth->exp_libelle)
            <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                <form action="{{ Route('box_to_cart.store',['id'    =>  $boxMonth]) }}" method="POST">
                    
                <h3 class="mb-4 text-2xl font-semibold">{{ $boxMonth->exp_libelle }}</h3>
                <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">{{ $boxMonth->exp_description }}</p>
                <div class="flex justify-center items-baseline my-8">
                    <span class="mr-2 text-5xl font-extrabold">${{ $boxMonth->exp_price }}</span>
                </div>
                <!-- List -->
                <ul role="list" class="mb-8 space-y-4 text-left">

                    @php
                    $optionsArray = explode(',', $boxMonth->exp_options);
                    @endphp
                    @foreach ($optionsArray as $option)
                    <li class="flex items-center space-x-3">
                        <!-- Icon -->
                        <svg class="flex-shrink-0 w-5 h-5 text-main-color " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        <span>{{ $option }}</span>
                    </li>
                    @endforeach
                </ul>
                
                    @csrf
                    <button type="submit" class="text-white bg-main-color  font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">Ajouter à la carte</button>
                </form>
            </div>
            @endif


        </div>
    </div>
</section>
@include('pages.components.popup')
@include('pages.components.top')
@include('pages.components.footer')
@include('pages.components.cart')
@include('pages.components.wishlist')
@endsection