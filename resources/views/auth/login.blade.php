
<x-guest-layout>
    <div class="grid grid-cols-2">
        <div class="col-span-1" style="background-image: url('{{ asset('images/background-login.jpeg') }}');background-position:center;background-size:cover;">
        </div>
        <div class="col-span-1">
            <x-authentication-card>
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>
        
                <x-validation-errors class="mb-4" />
        
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
        
                <form method="POST" action="{{ route('login') }}">
                    @csrf
        
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>
        
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>
        
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
        
                        <x-button class="ml-4">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
                <span class=" text-sm text-gray-600  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-5 block" >
                    {{ __('Vous avez pas un compte?') }} <a href="{{ route('register') }}" class="underline hover:text-gray-900">Crée le maintenant</a>
                </span>
            </x-authentication-card>
        </div>
    </div>
</x-guest-layout>
{{-- @extends('layouts.frontend')
@section('content')
<div class="bg-black w-full text-white font-cormorant italic text-md">
    <div class="container mx-auto px-6 md:h-8 flex  justify-between md:items-center">
        <div>
            <span>
                <i class="fa-solid fa-envelope mr-2"></i>
                contact@gardeniasecret.ma
            </span>
        </div>

        <div>
            <span>
                <i class="fa-solid fa-user mr-2"></i>
            </span>
            <a href="{{ route('login') }}" class="hover:underline">Login</a>
        </div>
    </div>
</div>
@include('pages.components.header')
    <div class="h-[81vh] flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <h2 class="text-2xl">Sign Into Your Account</h2>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
                
            </div>
            <span class=" text-sm text-gray-600  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-5 block" >
                {{ __('Vous avez pas un compte?') }} <a href="{{ route('register') }}" class="underline hover:text-gray-900">Crée le maintenant</a>
            </span>

        </form>
        
    </div>

    </div>
    
    @include('pages.components.footer')
@endsection --}}
