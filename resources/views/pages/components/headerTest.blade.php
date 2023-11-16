<header class=" shadow-md mb-2 z-[1000]">
    <div id="header-overlay" class="hidden fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-40 z-[100]"></div>
        <div class="fixed -right-96 top-0 h-screen w-96 bg-black z-[99999] social-media transition-all">
            <div class="logo p-10 flex flex-col items-center h-full justify-center space-y-10 relative">
    
                    <img src="{{ asset('images/logo.png') }}" class="h-16" alt="">
                    <p class="font-cormorant py-1 mt-1 text-[1rem]  max-w-md text-white text-center">
                        Gardenia Secret sélectionne soigneusement des produits de beauté pour vous faire découvrir de nouvelles marques et vous aider à vous sentir belle et confiante o tahte le texte dir les logo reseaux sociaux
                    </p>
                    <div class="flex items-center my-2 gap-2">
                    <a href="https://www.facebook.com/gardeniasecretb/" target="_blank" class=" bg-[#e9b5a8] px-3.5 py-2 border cursor-pointer  border-none rounded-full transition-all">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/gardenia.secret/" target="_blank" class="px-3 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/@Gardenia.Secret" target="_blank" class="px-2.5 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="https://www.tiktok.com/@gardenia.secret" target="_blank" class="px-3 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                    <a href="https://www.pinterest.fr/gardeniasecret/" target="_blank" class="px-3 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
                        <i class="fa-brands fa-pinterest"></i>
                    </a>
                    </div>
    
                <button class="absolute -top-7 left-5 close-social">
                    <i class="fa-solid fa-xmark text-white text-2xl"></i>
                </button>
            </div>
        </div>
  
        <nav class="bg-white border-gray-200 ">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" class="h-16 mr-3" alt="Gardenia secret Logo" />
                </a>
                <div class="flex items-center md:flex-none">
                    <a class="block md:hidden search-content nav-link mx-2 md:my-0  md:text-left text-center search" href="#">
                        <svg class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                        </svg>
                    </a>
                    <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-multi-level" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                        </svg>
                    </button>
                </div>
  
                <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
                <ul class="flex items-center flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
                    <li class="w-full text-center border-b border-gray-200 md:border-none md:text-left ">
                    <a href="/" class="block py-2 pl-3 pr-4  rounded md:bg-transparent  md:p-0  t" aria-current="page">Home</a>
                    </li>
                    <li class="w-full text-center border-b border-gray-200 md:border-none md:text-left">
                        <a href="{{ Route('boxPage.index') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0" style="white-space: nowrap;">
                            Box of the Month 
                        </a>
                    </li>
                    <li class="w-full text-center border-b border-gray-200 md:border-none md:text-left ">
                    <a  href="{{ Route('BoxMois.index') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0  md:p-0 ">Subscribe</a>
                    </li>
  
                    
                    <li class="w-full text-center border-b border-gray-200 md:border-none md:text-left py-2 md:py-0">
                    <div class="flex justify-center">
                        <a href="{{ Route('mag.index') }}" class="text-gray-900" style="white-space: nowrap;">The Mag</a>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex md:hidden items-center justify-between  py-2 pr-4  text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto"> 
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                        </button>
                    </div>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-xl w-44 ">
                            <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                            @forelse ($categories as $categorie)
                            <li>
                                <a href="/blog/{{ $categorie->slug }}" class="block px-4 py-2 hover:bg-gray-100  ">{{ $categorie->name }}</a>
                            </li>
                            @empty
                                
                            @endforelse
                            </ul>
                        </div>
                    </li>
                    <li class="w-full text-center md:text-left ">
                    <a href="{{ Route('contact.index') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0  md:p-0 ">Contact</a>
                    </li>
                    <li class="hidden md:block">
                    <a class="nav-link mx-2 md:my-0  md:text-left text-center search-content" href="#">
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
  
  
  
  
  
  
  