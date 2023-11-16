<header class=" shadow-md mb-2 z-[1000]">
    <div id="header-overlay" class="hidden fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-40 z-[100]"></div>
        <div class="fixed -right-96 top-0 h-screen w-96 bg-black z-[999] social-media transition-all">
            <div class="logo p-10 flex flex-col items-center h-full space-y-10 relative">
    
                    <img src="{{ asset('images/logo.png') }}" class="h-16" style="margin-top:80px" alt="">
                    <p class="font-cormorant py-1 mt-1 text-[1rem]  max-w-md text-white text-center">
                        Gardenia Secret sélectionne soigneusement des produits de beauté pour vous faire découvrir de nouvelles marques et vous aider à vous sentir belle et confiante o tahte le texte dir les logo reseaux sociaux
                    </p>
                    <div class="flex items-center my-2 gap-2">
                    <a href="https://www.facebook.com/gardeniasecretb/" class=" bg-[#e9b5a8] px-3.5 py-2 border cursor-pointer  border-none rounded-full transition-all">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/gardenia.secret/" target="_blank" class="px-3 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/@Gardenia.Secret" class="px-2.5 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="https://www.tiktok.com/@gardenia.secret" class="px-3 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                    <a href="https://www.pinterest.fr/gardeniasecret/" class="px-3 py-2 border cursor-pointer  bg-[#e9b5a8] border-none rounded-full transition-all">
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
                <ul class="flex items-center flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-5 md:mt-0 md:border-0 md:bg-white">
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

                    
                    <li class="w-full text-center border-b border-gray-200 text-gray-900 md:border-none md:text-left py-2 md:py-0">
                    <div class="flex justify-center">
                        <a href="{{ Route('mag.index') }}" class="text-gray-900" style="white-space: nowrap">The Mag</a>
                        <button id="multiLevelDropdownButton" data-dropdown-toggle="multi-dropdown" class="  font-medium rounded-lg text-sm  text-center inline-flex items-center md:hidden" type="button"> 
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                    </div>

                        <div id="multi-dropdown" class="z-[1000000] hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                            <ul class="py-2 text-sm text-gray-700 " aria-labelledby="multiLevelDropdownButton">
                                @forelse ($categories as $categorie)
                                <li>
                                    <a href="/blog/{{ $categorie->slug }}" class="block px-4 py-2 hover:bg-gray-100">{{ $categorie->name }}</a>
                                </li>

                                @if($sous_categories[$categorie->id] ?? false)
                                    <button id="doubleDropdownButton-{{ $categorie->id }}" data-dropdown-toggle="doubleDropdown-{{ $categorie->id }}" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 ">
                                        {{ $categorie->name }}
                                        <svg class="w-2.5 h-2.5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                        </svg>
                                    </button>

                                    <li>
                                        <div id="doubleDropdown-{{ $categorie->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                                            <ul class="py-2 text-sm text-gray-700 " aria-labelledby="doubleDropdownButton-{{ $categorie->id }}">
                                                @forelse ($sous_categories[$categorie->id] as $sous_categorie)
                                                    <li>
                                                        <a href="/blog/{{ $sous_categorie->slug }}" class="block px-4 py-2 hover:bg-gray-100">{{ $sous_categorie->name }}</a>
                                                    </li>
                                                @empty
                                                @endforelse
                                            </ul>
                                        </div>
                                    </li>
                                @endif

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
        <nav class="border-t border-gray-200 hidden md:block">
            <div class="container mx-auto p-6 flex items-center  lg:justify-between flex-wrap">
                @forelse ($categories as $categorie)
                <div class="py-2 relative">
                    <div class="mr-12 lg:mr-0"> 
                        <a href="/blog/{{ $categorie->slug }}" class="hover:bg-gray-100  text-base font-Roboto-condensed dropdown-link">
                            {{ $categorie->name }}
                        </a>
                            @if($sous_categories[$categorie->id] ?? false)
                                <!-- Add an SVG icon for the dropdown with a click event handler -->
                                <svg class="w-4 h-4 inline-block ml-1 cursor-pointer toggle-sous-categories" data-category-id="{{ $categorie->id }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            @endif
                    </div>

                    @if($sous_categories[$categorie->id] ?? false)
                    <div class="hidden absolute top-16  w-40 -left-4 bg-white flex flex-col rounded z-10" id="sous-categories-{{ $categorie->id }}" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        @forelse ($sous_categories[$categorie->id] as $sous_categorie)

                            <a href="/blog/{{ $sous_categorie->slug }}" class="hover:bg-main-color px-4 text-base font-Roboto-condensed py-2">{{ $sous_categorie->name }}</a>

                        @empty

                        @endforelse
                    </div>
                    @endif

                </div>
            @empty
                <!-- No categories -->
            @endforelse
            
            </div>
        </nav>

    
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleIcons = document.querySelectorAll('.toggle-sous-categories');

        toggleIcons.forEach(icon => {
            icon.addEventListener('click', (event) => {
                const categoryId = icon.getAttribute('data-category-id');
                const sousCategories = document.getElementById(`sous-categories-${categoryId}`);

                // Hide all other dropdowns
                toggleIcons.forEach(otherIcon => {
                    const otherCategoryId = otherIcon.getAttribute('data-category-id');
                    if (otherCategoryId !== categoryId) {
                        const otherSousCategories = document.getElementById(`sous-categories-${otherCategoryId}`);
                        if (otherSousCategories) {
                            otherSousCategories.classList.add('hidden');
                        }
                    }
                });

                if (sousCategories) {
                    sousCategories.classList.toggle('hidden');
                }

                // Prevent the click event from propagating to the document
                event.stopPropagation();
            });
        });

        document.addEventListener('click', (event) => {
            // Hide all dropdowns when clicking anywhere else on the document
            toggleIcons.forEach(icon => {
                const categoryId = icon.getAttribute('data-category-id');
                const sousCategories = document.getElementById(`sous-categories-${categoryId}`);

                if (sousCategories && !event.target.closest(`#sous-categories-${categoryId}`) && event.target !== icon) {
                    sousCategories.classList.add('hidden');
                }
            });
        });

        window.addEventListener('scroll', () => {
            // Hide all dropdowns when scrolling the window
            toggleIcons.forEach(icon => {
                const categoryId = icon.getAttribute('data-category-id');
                const sousCategories = document.getElementById(`sous-categories-${categoryId}`);

                if (sousCategories) {
                    sousCategories.classList.add('hidden');
                }
            });
        });
    });
</script>





