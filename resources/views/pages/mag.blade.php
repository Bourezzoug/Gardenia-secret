@extends('layouts.frontend')

@section('content')

@include('pages.components.header')
<div id="hero-section">
    <div class="title" style="background-image: url('https://biagiotti.qodeinteractive.com/wp-content/uploads/2019/07/title-img-1.jpg')">
        <div class="h-56 relative">
            <div class="absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2">
                <h2 class="text-3xl font-Lato tracking-wider">BLOG</h2>
            </div>
        </div>
    </div>
</div>
<div class="max-w-screen-xl container p-6 mx-auto">

    <main class="mt-10">


    <div class="block lg:flex lg:space-x-2 px-2 lg:p-0 mt-10 mb-10">
        <!-- post cards -->
        <div class="w-full lg:w-[70%]">
            <div class="lg:grid grid-cols-2 gap-5">
                @forelse ($posts as $post)
                <div class="col-span-1">
                    <a class="mb-4 md:mb-0 w-full relative rounded inline-block" style="height: 24em;" href="/blog/{{ $post->slug }}">
                        <div class="absolute left-0 bottom-0 w-full h-full z-10"
                        style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                    <img src="{{ $post->image }}" class="absolute left-0 top-0 w-full h-full rounded z-0 object-cover" />
        
                    </a>
                </div>
                <div class="col-span-1">
                    <div class="flex flex-col items-start">

                            <a href="/blog/{{ $post->slug }}" class="text-2xl uppercase leading-tight font-Lato py-3">
                                <!-- GLOWING SKIN IS A RESULT OF PROPER SKINCARE -->
                                {{ $post->title }}
                            </a>
                            <span class=" text-gray-500 inline-flex items-center justify-center font-cormorant text-[17px] my-3">
                                {{ strftime('%A %e %B %Y', strtotime($post->created_at)) }}
                            </span>
                            <p class=" text-gray-500 font-cormorant text-[17px] my-3">
                                {!! Illuminate\Support\Str::limit(strip_tags($post->body), 250, '...') !!}
                            </p>
                            
                    </div>
                    <div class="flex items-center my-3 gap-2">
                        <a href="#" class="px-2.5 py-1 border cursor-pointer  border-rose-300 transition-all">
                            <i class="fa-brands fa-facebook-f text-rose-300"></i>
                        </a>
                        <a href="https://www.instagram.com/gardenia.secret/" target="_blank" class="px-2 py-1 border cursor-pointer  border-rose-300 transition-all">
                            <i class="fa-brands fa-instagram text-rose-300"></i>
                        </a>
                        <a href="#" class="px-1.5 py-1 border cursor-pointer  border-rose-300 transition-all">
                            <i class="fa-brands fa-youtube text-rose-300"></i>
                        </a>
                        <a href="#" class="px-2 py-1 border cursor-pointer  border-rose-300 transition-all">
                            <i class="fa-brands fa-tiktok text-rose-300"></i>
                        </a>
                    </div>

                </div>
                @empty
                    
                @endforelse

            </div>
            <div class="pb-10 w-4/5">
                {{-- Display the pagination links --}}
                {{ $posts->links() }} 
            </div>



            </div>
            {{-- <div class="mt-16">
                <a 
                class="mb-4 md:mb-0 w-full relative rounded inline-block" 
                style="height: 24em;"
                href="./blog.html">
                <div class="absolute left-0 bottom-0 w-full h-full z-10"
                style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                <img src="https://biagiotti.qodeinteractive.com/wp-content/uploads/2019/07/blog-gallery-type-3.jpg" class="absolute left-0 top-0 w-full h-full rounded z-0 object-cover" />
                <div class="p-4 z-20">

                <div class="flex mt-3">
                    <img src="https://randomuser.me/api/portraits/men/97.jpg"
                    class="h-10 w-10 rounded-full mr-2 object-cover" />
                    <div>
                    <p class="font-semibold text-gray-200 text-sm"> Mike Sullivan </p>
                    <p class="font-semibold text-gray-400 text-xs"> 14 Aug </p>
                    </div>
                </div>
                </div>
    
                </a>
            <div class="flex flex-col items-start">
                <span class="text-gray-500 inline-flex items-center justify-center font-cormorant text-[17px]">Jul 31 Foundation, Make Up By Janny Joe 
                    Foundation, Organic
                    </span>
                    <a href="#" class="text-2xl uppercase leading-tight font-Lato py-3">
                        Treat Your Makeup Like Jewelry For The Face
                    </a>
                    <p class="text-gray-500 font-cormorant text-[17px]">
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi ...
                    </p>
                </div>

                <div class="flex items-center mt-3 gap-2">
                    <a href="#" class="px-2.5 py-1 border cursor-pointer  border-[#838383] transition-all">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/gardenia.secret/" target="_blank" class="px-2 py-1 border cursor-pointer  border-[#838383] transition-all">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="px-1.5 py-1 border cursor-pointer  border-[#838383] transition-all">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="#" class="px-2 py-1 border cursor-pointer  border-[#838383] transition-all">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </div>


            </div> --}}


        <!-- right sidebar -->
        <div class="w-full lg:w-[30%] px-3">

            <div class="pt-2 xl:col-span-3 lg:col-span-4 ml-10">
                {{-- <div class="mb-4">
                    <form action="{{ route('mag.index') }}" class="relative" method="GET"> 
                        <div class="relative flex items-center">
                            <x-select name="categorie"  class="input-field mt-1">
                                <option value="" readonly="true" hidden="true" selected class="">{{ __('Filtrez par catégorie') }}</option>
                                <option value="Femme Inspirante" >Femme Inspirante</option>
                                <option value="Féminovation">Féminovation</option>
                                <option value="Style & Élégance">Style & Élégance</option>
                                <option value="Guide Shopping">Guide Shopping</option>
                                <option value="Décoration & Astuces">Décoration & Astuces</option>
                                <option value="Saveurs du Royaume">Saveurs du Royaume</option>
                                <option value="Bien-être">Bien-être</option>
                                <option value="Voyages & Découvertes au Royaume">Voyages & Découvertes au Royaume</option>
                            </x-select>
                            <button type="submit" class="absolute border-l mt-0.5 py-2 right-2 pl-2 bg-white top-1/2 -translate-y-1/2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div> --}}
            <div class="mt-5">
                <h4 class="font-Lato text-[17px] uppercase">CATEGORIES</h4>
                <div class="mt-3 flex flex-col">
                    <a href="?categorie=Femme Inspirante" class="font-cormorant text-[18px] py-1 text-gray-500 hover:text-gray-800 transition-colors">Femme Inspirante</a>
                    <a href="?categorie=Féminovation" class="font-cormorant text-[18px] py-1 text-gray-500 hover:text-gray-800 transition-colors">Féminovation</a>
                    <a href="?categorie=Style & Élégance" class="font-cormorant text-[18px] py-1 text-gray-500 hover:text-gray-800 transition-colors">Style & Élégance</a>
                    <a href="?categorie=Guide Shopping" class="font-cormorant text-[18px] py-1 text-gray-500 hover:text-gray-800 transition-colors">Guide Shopping</a>
                    <a href="?categorie=Décoration & Astuces" class="font-cormorant text-[18px] py-1 text-gray-500 hover:text-gray-800 transition-colors">Décoration & Astuces</a>
                    <a href="?categorie=Saveurs du Royaume" class="font-cormorant text-[18px] py-1 text-gray-500 hover:text-gray-800 transition-colors">Saveurs du Royaume</a>
                    <a href="?categorie=Bien-être" class="font-cormorant text-[18px] py-1 text-gray-500 hover:text-gray-800 transition-colors">Bien-être</a>
                    <a href="?categorie=Voyages & Découvertes au Royaume" class="font-cormorant text-[18px] py-1 text-gray-500 hover:text-gray-800 transition-colors">Voyages & Découvertes au Royaume</a>
                </div>
            </div>
            {{-- <div class="flex flex-col divide-y">


                @forelse ($mostViewdArticle as $mostViewdArticle)
                <div class="flex px-1 py-4">
                    <img alt="" class="flex-shrink-0 object-cover w-20 h-20 mr-4 " src="{{ $mostViewdArticle->image }}">
                    <div class="flex flex-col flex-grow">
                        <a rel="noopener noreferrer" href="#" class="font-Lato text-[17px] ">{{ $mostViewdArticle->title }}</a>
                        <p class="mt-auto text-xs font-Lato">{{ strftime('%A %e %B %Y', strtotime($mostViewdArticle->created_at)) }}
                        </p>
                    </div>
                </div>
                @empty
                    
                @endforelse
            </div> --}}
            </div>
            {{-- <div class="mt-5 ">
                <div>
                    <h4 class="pb-5 font-Lato text-[17px] uppercase" >Instagram</h4>
                    <div class="grid grid-cols-3 gap-5">
                        <div class="col-span-1 relative insta-card">

                            <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                                <div class="absolute left-0 bottom-0 w-full h-0 z-10 insta-overlay transition-all"
                                style="background-image: linear-gradient(180deg,transparent,rgba(255,255,255,.7));"></div>
                                <img src="{{ asset('images/gardenia_insta.jpeg') }}" class="w-full  h-32 object-cover" alt="">
                            </a>
                        </div>
                        <div class="col-span-1 relative insta-card">
                            <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                                <div class="absolute left-0 bottom-0 w-full h-0 z-10 insta-overlay transition-all"
                                style="background-image: linear-gradient(180deg,transparent,rgba(255,255,255,.7));"></div>
                                <img src="{{ asset('images/gardenia_insta_2.jpeg') }}" class="w-full  h-32 object-cover" alt="">
                            </a>
                        </div>
                        <div class="col-span-1 relative insta-card">
                            <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                                <div class="absolute left-0 bottom-0 w-full h-0 z-10 insta-overlay transition-all"
                                style="background-image: linear-gradient(180deg,transparent,rgba(255,255,255,.7));"></div>
                                <img src="{{ asset('images/gardenia_test_3.jpeg') }}" class="w-full  h-32 object-cover" alt="">
                            </a>
                        </div>
                        <div class="col-span-1 relative insta-card">
                            <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                                <div class="absolute left-0 bottom-0 w-full h-0 z-10 insta-overlay transition-all"
                                style="background-image: linear-gradient(180deg,transparent,rgba(255,255,255,.7));"></div>
                                <img src="{{ asset('images/gardenia_instagram_4.png') }}" class="w-full  h-32 object-cover" alt="">
                            </a>
                        </div>
                        <div class="col-span-1 relative insta-card">
                            <a href="https://www.instagram.com/gardenia.secret/" target="_blank">
                                <div class="absolute left-0 bottom-0 w-full h-0 z-10 insta-overlay transition-all"
                                style="background-image: linear-gradient(180deg,transparent,rgba(255,255,255,.7));"></div>
                                <img src="{{ asset('images/gardenia_instagram_5.png') }}" class="w-full  h-32 object-cover" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}


        </div>

    </div>
    </main>
    <!-- main ends here -->

</div>



@include('pages.components.popup')
@include('pages.components.top')

@include('pages.components.footer')
@include('pages.components.cart')
@include('pages.components.wishlist')

@endsection