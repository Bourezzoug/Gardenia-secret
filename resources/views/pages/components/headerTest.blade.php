<div class="bg-black">
  <div class="flex justify-between h-10 items-center container mx-auto p-6  sm:px-6 lg:px-8">
  
    <p class="text-gray-200 font-Roboto text-sm font-bold">contact@gardeniasecret.com</p>
  
  @if (Route::has('login'))
  @auth
  @if (Auth::user()->utype === 0)

    <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
      <span class="sr-only">Open user menu</span>
      <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"  class="rounded-full h-8 w-8 object-cover">
    </button>

    <!-- Dropdown menu -->
    <div id="dropdownAvatar" class="z-[10000] hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
      <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
        <div>{{ Auth::user()->name }}</div>
        <div class="font-medium truncate">{{ Auth::user()->email }}</div>
      </div>
      <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
        <li>
          <a href="{{ Route('profile.show') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
        </li>
        <li>
          <a href="{{ Route('order.client.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Orders</a>
        </li>
      </ul>

      <div class="py-2">
        <form method="POST" action="{{ route('logout') }}" x-data>
          @csrf
          <a href="{{ route('logout') }}"
          @click.prevent="$root.submit();" class ='block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white'>Logout</a>
      </form>
      </div>
    </div>

      @endif
      @else
      <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
        <a href="{{ Route('login') }}" class="text-sm font-medium text-gray-200 hover:text-white">Sign in</a>
        <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
        <a href="{{ Route('register') }}" class="text-sm font-medium text-gray-200 hover:text-white">Create account</a>
      </div>
      @endauth
      @endif
</div>
</div>
<header class="overflow-x-hidden shadow-md  z-[1000]">
  <div class="fixed -right-96 top-0 h-screen w-96 bg-black z-[999] social-media transition-all">
      <div class="logo p-10 flex flex-col items-center h-full justify-center space-y-10 relative">

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

          <button class="absolute -top-7 left-5 close-social">
              <i class="fa-solid fa-xmark text-white text-2xl"></i>
          </button>
      </div>
  </div>

  <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="/" class="flex items-center">
          <img src="{{ asset('images/logo.png') }}" class="h-16 mr-3" alt="Gardenia secret Logo" />
      </a>
      <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-multi-level" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
        <ul class="flex items-center flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="/" class="block py-2 pl-3 pr-4  text-gray-700 rounded md:bg-transparent  md:p-0  t" aria-current="page">Home</a>
          </li>
          <li>
            <a  href="{{ Route('BoxMois.index') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0  md:p-0 ">S'abonner</a>
          </li>
          <li>
            <a href="{{ Route('e-shop.index') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0  md:p-0 ">Products</a>
          </li>
          <li>
            <div class="flex">
              <a href="{{ Route('mag.index') }}">Blog</a>
              <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto"> 
                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
              </button>
            </div>
              <!-- Dropdown menu -->
              <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-xl w-44 dark:bg-gray-700 dark:divide-gray-600">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                    @forelse ($blogCategorie as $categorie)
                    <li>
                      <a href="/blog/{{ $categorie->slug }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">{{ $categorie->name }}</a>
                    </li>
                    @empty
                      
                    @endforelse
                  </ul>
              </div>
          </li>
          <li>
            <a href="{{ Route('contact.index') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0  md:p-0 ">Contact</a>
          </li>
          <li>
            <a class="nav-link mx-2 md:my-0  md:text-left text-center search" href="#">
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
              </svg>
            </a>
            
          </li>

            <div x-data="{ open: false }" class="hidden  burger-menu" x-init="window.addEventListener('scroll', () => { open = false })">
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

        </ul>
      </div>
    </div>
  </nav>
  






  
</header>
