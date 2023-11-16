
<x-guest-layout>
    {{-- <div class="grid grid-cols-2"> --}}
        {{-- <div class="col-span-1" style="background-image: url('{{ asset('images/background-login.jpeg') }}');background-position:center;background-size:cover;">
        </div> --}}
        {{-- <div class="col-span-1">
        </div> --}}
        {{-- <div class="col-span-1">
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
        </div> --}}

    {{-- </div> --}}
    <!-- ====== Forms Section Start -->
<section class="bg-gray-1   py-20 lg:py-[120px]">
    <div class="container mx-auto">
       <div class="flex flex-wrap -mx-4 shadow-2xl">
          <div class="w-full px-4">
             <div
                class="relative mx-auto max-w-[525px] overflow-hidden rounded-lg bg-white py-16 px-10 text-center sm:px-12 md:px-[60px] -2"
                >
                <div class="mb-10 text-center md:mb-16">
                   <a
                      href="/"
                      class="mx-auto inline-block max-w-[200px]"
                      >
                   <img
                        src="{{ asset('images/logo.png') }}"
                        alt="logo"
                      />
                   </a>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                   <div class="mb-6">
                        <input
                            type="email"
                            placeholder="Email"
                            name="email"
                            class="w-full px-5 py-3 text-base bg-transparent border rounded-md outline-none border-stroke text-body-color  focus:border-primary focus-visible:shadow-none"
                            required
                            autofocus
                        />
                   </div>
                   <div class="mb-6">
                        <input
                            type="password"
                            placeholder="Password"
                            name="password"
                            class="w-full px-5 py-3 text-base bg-transparent border rounded-md outline-none border-stroke text-body-color  focus:border-primary focus-visible:shadow-none"
                            required
                        />
                   </div>
                   <div class="mb-10">
                      <input
                         type="submit"
                         value="Sign In"
                         class="w-full px-5 py-3 text-base font-medium text-white transition border rounded-md cursor-pointer border-main-color bg-main-color hover:bg-opacity-90"
                         />
                   </div>
                </form>
                <p class="mb-6 text-base text-secondary-color ">
                   Connect With
                </p>
                <ul class="flex justify-between mb-12 -mx-2">
                   <li class="w-full px-2">
                      <a
                         href="{{ Route('facebook-auth') }}"
                         class="flex h-11 items-center justify-center rounded-md bg-[#4064AC] hover:bg-opacity-90"
                         >
                         <svg
                            width="10"
                            height="20"
                            viewBox="0 0 10 20"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            >
                            <path
                               d="M9.29878 8H7.74898H7.19548V7.35484V5.35484V4.70968H7.74898H8.91133C9.21575 4.70968 9.46483 4.45161 9.46483 4.06452V0.645161C9.46483 0.290323 9.24343 0 8.91133 0H6.89106C4.70474 0 3.18262 1.80645 3.18262 4.48387V7.29032V7.93548H2.62912H0.747223C0.359774 7.93548 0 8.29032 0 8.80645V11.129C0 11.5806 0.304424 12 0.747223 12H2.57377H3.12727V12.6452V19.129C3.12727 19.5806 3.43169 20 3.87449 20H6.47593C6.64198 20 6.78036 19.9032 6.89106 19.7742C7.00176 19.6452 7.08478 19.4194 7.08478 19.2258V12.6774V12.0323H7.66596H8.91133C9.2711 12.0323 9.54785 11.7742 9.6032 11.3871V11.3548V11.3226L9.99065 9.09677C10.0183 8.87097 9.99065 8.6129 9.8246 8.35484C9.76925 8.19355 9.52018 8.03226 9.29878 8Z"
                               fill="white"
                               />
                         </svg>
                      </a>
                   </li>
                   <li class="w-full px-2">
                      <a
                         href="{{ Route('google-auth') }}"
                         class="flex h-11 items-center justify-center rounded-md bg-[#D64937] hover:bg-opacity-90"
                         >
                         <svg
                            width="18"
                            height="18"
                            viewBox="0 0 18 18"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            >
                            <path
                               d="M17.8477 8.17132H9.29628V10.643H15.4342C15.1065 14.0743 12.2461 15.5574 9.47506 15.5574C5.95916 15.5574 2.8306 12.8821 2.8306 9.01461C2.8306 5.29251 5.81018 2.47185 9.47506 2.47185C12.2759 2.47185 13.9742 4.24567 13.9742 4.24567L15.7024 2.47185C15.7024 2.47185 13.3783 0.000145544 9.35587 0.000145544C4.05223 -0.0289334 0 4.30383 0 8.98553C0 13.5218 3.81386 18 9.44526 18C14.4212 18 17.9967 14.7141 17.9967 9.79974C18.0264 8.78198 17.8477 8.17132 17.8477 8.17132Z"
                               fill="white"
                               />
                         </svg>
                      </a>
                   </li>
                </ul>
                <a
                    href="{{ Route('password.request') }}"
                    class="inline-block mb-2 text-base  underline"
                    >
                Forget Password?
                </a>
                <p class="text-base text-body-color ">
                   <span class="pr-0.5">Not a member yet?</span>
                   <a
                      href="{{ Route('register') }}"
                      class=" underline"
                      >
                   Sign Up
                   </a>
                </p>
                <div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- ====== Forms Section End -->
</x-guest-layout>
