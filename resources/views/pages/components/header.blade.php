<div class="bg-black w-full text-white font-cormorant italic text-md">
    <div class="container mx-auto px-6 md:h-8 flex  justify-between md:items-center">
        <div>
            <span>
                <i class="fa-solid fa-envelope mr-2"></i>
                contact@gardeniasecret.ma
            </span>
        </div>

        <div class="flex items-center">
            <span>
                <i class="fa-solid fa-user mr-2"></i>
            </span>
            @if (Route::has('login'))
            @auth
            @if (Auth::user()->utype === 0)
              <div x-data="{ open: false }" @click.away="open = false">
                <button @click="open = !open" class="hover:underline">
                  {{ Auth::user()->name }}
                </button>
                
                <ul x-show="open" class="absolute bg-white shadow-md z-[99999] top-8 right-16">
                    <li>
                        <a href="{{ route('client.dashboard') }}" class="block px-4 py-2 text-black hover:bg-gray-100 ">Dashboard</a>
                    </li>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <a href="{{ route('logout') }}"
                    @click.prevent="$root.submit();" class ='block px-4 py-2 text-black hover:bg-gray-100 '>Logout</a>
                </form>
                    <!-- Add other dropdown items here -->
                </ul>
              </div>
            @endif
          @else
          
                    <a href="{{ route('login') }}" class="hover:underline">Login</a>
                @endauth
            @endif
        </div>
    </div>
</div>
<header class="overflow-x-hidden shadow-md">
    <div class="absolute -right-96 top-0 h-screen w-96 bg-black z-[999] social-media transition-all">
        <div class="logo p-10 flex flex-col items-center h-full justify-center space-y-10 relative">
            {{-- <div> --}}
                <img src="{{ asset('images/logo.png') }}" class="h-16" alt="">
                <p class="font-cormorant py-1 mt-1 text-[1rem]  max-w-md text-white text-center">
                    Gardenia Secret sélectionne soigneusement des produits de beauté pour vous faire découvrir de nouvelles marques et vous aider à vous sentir belle et confiante o tahte le texte dir les logo reseaux sociaux
                </p>
                <div class="flex items-center my-2 gap-2">
                  <a href="#" class=" bg-[#e9b5a8] px-3.5 py-2 border cursor-pointer  border-none rounded-full transition-all">
                    <i class="fa-brands fa-facebook-f"></i>
                  </a>
                  <a href="https://www.instagram.com/gardenia.secret/" target="_blank" class="px-3 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
                    <i class="fa-brands fa-instagram"></i>
                  </a>
                  <a href="#" class="px-2.5 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
                    <i class="fa-brands fa-youtube"></i>
                  </a>
                  <a href="#" class="px-3 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
                    <i class="fa-brands fa-tiktok"></i>
                  </a>
                </div>
            {{-- </div> --}}
            <button class="absolute -top-7 left-5 close-social">
                <i class="fa-solid fa-xmark text-white text-2xl"></i>
            </button>
        </div>
    </div>
    <nav class="container mx-auto p-5 flex items-center justify-between relative">
        <input type="text" class="py-3 pl-2 w-full hidden search-ipt" placeholder="Cherchez...">
        <div class="logo-img">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" class="h-16" alt="">
            </a>
        </div>
        <div class="nav-links transition-all hidden text-sm md:flex flex-col fixed top-32 md:top-0 left-0 md:left-0 md:flex-row justify-end md:static bg-white md:bg-transparent w-full font-openSans uppercase z-50">
            <a class="nav-link active mx-2 md:my-0 my-4 md:text-left text-center" aria-current="page" href="{{ Route('BoxMois.index') }}">La Box du Mois</a>
            {{-- <a class="nav-link mx-2 md:my-0 my-4 md:text-left text-center " href="#">Offrir</a> --}}
            <a class="nav-link mx-2 md:my-0 my-4 md:text-left text-center " href="{{ Route('e-shop.index') }}">E-shop</a>
            <a class="nav-link mx-2 md:my-0 my-4 md:text-left text-center " href="{{ Route('mag.index') }}">Le Mag</a>
            {{-- <a class="nav-link mx-2 md:my-0 my-4 md:text-left text-center " href="#">Bons Plans</a> --}}
            {{-- <a class="nav-link mx-2 md:my-0 my-4 md:text-left text-center text-main-color" href="#">Parrainage</a> --}}
            {{-- <a  class="nav-link mx-2 md:my-0 my-4 md:text-left text-center " href="#"><i class="fa-solid fa-cart-shopping"></i>[0]</a>
            <a  class="nav-link mx-2 md:my-0 my-4 md:text-left text-center " href="#"><i class="fa-regular fa-heart"></i> --}}
            </a>
            <a  class="nav-link mx-2 md:my-0 my-4 md:text-left text-center search" href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
        </div>

            <div x-data="{ open: false }" class="block md:hidden burger-menu" x-init="window.addEventListener('scroll', () => { open = false })">
                <button class="text-gray-500 w-10 h-10 relative focus:outline-none " @click="open = !open">
                    <span class="sr-only">Open main menu</span>
                    <div class="block w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
                        <span aria-hidden="true" class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out" :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
                        <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current   transform transition duration-500 ease-in-out" :class="{'opacity-0': open } "></span>
                        <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out" :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
                    </div>
                </button>
            </div>
            <div x-data="{ open: false }" class="hidden md:block burger-social" x-init="window.addEventListener('scroll', () => { open = false })">
                <button class="text-gray-500 w-10 h-10 relative focus:outline-none " @click="open = open">
                    <span class="sr-only">Open main menu</span>
                    <div class="block w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
                        <span aria-hidden="true" class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out" :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
                        <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current   transform transition duration-500 ease-in-out" :class="{'opacity-0': open } "></span>
                        <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out" :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
                    </div>
                </button>
            </div>
            <button class="hidden close-search-ipt ml-2">
                <i class="fa-solid fa-xmark  text-2xl"></i>
            </button>


    </nav>

    
</header>