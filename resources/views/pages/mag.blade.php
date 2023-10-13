@extends('layouts.frontend')

@section('content')

@include('pages.components.header')
@if($bannerTop)
<div class="xl:container mx-auto px-3 sm:px-4 xl:px-2 flex justify-center py-6" id="hero-section">
    <form id="bannerClickForm-{{ $bannerTop->id }}" action="{{ route('banner.click', ['id' => $bannerTop->id]) }}" method="POST" target="_blank">
        @csrf
        <button type="submit" class=" bg-none border-none w-full">
            <img id="banner-{{ $bannerTop->id }}" src="http://localhost:8000{{ $bannerTop->image }}" data-banner-id="{{ $bannerTop->id }}" class="w-full md:h-[290px] object-fill" alt="">
        </button>
    </form>
</div>
@endif
{{-- @if($bannerTop)
<div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 pt-2">
  <form id="bannerClickForm-{{ $bannerTop->id }}" action="{{ route('banner.click', ['id' => $bannerTop->id]) }}" method="POST" target="_blank">
      @csrf
      <button type="submit" class=" bg-none border-none w-full">
          <img id="banner-{{ $bannerTop->id }}" src="http://localhost:8000{{ $bannerTop->image }}" data-banner-id="{{ $bannerTop->id }}" class="w-full md:h-[290px] object-fill" alt="">
      </button>
  </form>
</div>
@endif --}}
@php
  $categorie = App\Models\Categorie::find($first_article->categorie_id);
@endphp
<div class="bg-white pb-6">
    <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
      <!-- big grid 1 -->
      <div class="flex flex-row flex-wrap">
        <!--Start left cover-->
        <div class="flex-shrink max-w-full w-full lg:w-1/2 pb-1 lg:pb-0 lg:pr-1">
          <div class="relative hover-img max-h-98 xl:h-[508px] mt-1 overflow-hidden ">
            <a href="/blog/{{ $categorie->name }}/{{ $first_article->slug }}">
              <img class="max-w-full w-full mx-auto h-full object-cover" src="{{ $first_article->image }}" alt="Image description">
            </a>
            <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full  h-full  bg-black bg-opacity-70 flex justify-end flex-col">
              <a href="/blog/{{ $categorie->name }}/{{ $first_article->slug }}">
                <h2 class="text-3xl font-bold capitalize text-white mb-3 font-Roboto-condensed">{{ $first_article->title }}</h2>
              </a>
              <p class="text-gray-100 hidden sm:inline-block font-Roboto-condensed">{!! Illuminate\Support\Str::limit(strip_tags($first_article->body), 150, '[...]') !!}</p>
              <div class="pt-1">
                <div class="text-gray-100">
                    <a href="{{ $categorie->name }}"  class="text-sm px-2 py-1 rounded mr-2 font-Roboto-condensed" style="background-color:{{ $categorie->color }}">{{ $categorie->name }}</a>
                    <span class="text-xs">- {{ \Carbon\Carbon::parse($first_article->created_at)->format('F j, Y') }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--Start box news-->
        <div class="flex-shrink max-w-full w-full  lg:w-1/2">
          <div class="grid grid-cols-6">
            @foreach($articles as $key => $article)
            @php
              $categorie_article = App\Models\Categorie::find($article->categorie_id);
            @endphp
            @if($key == 0)
            <article class="col-span-6 p-1">
              <div class="relative hover-img  h-[250px] overflow-hidden">
                <a href="/blog/{{ $categorie_article->name }}/{{ $article->slug }}">
                  <img class="max-w-full w-full mx-auto h-full object-cover" src="{{ $article->image }}" alt="Image description">
                </a>
                <div class="absolute px-4 pt-7 pb-4 bottom-0 h-full w-full bg-black bg-opacity-70 flex justify-end flex-col">
                  <a href="/blog/{{ $categorie_article->name }}/{{ $article->slug }}">
                    <h2 class="text-lg font-bold capitalize leading-tight font-Roboto-condensed text-white mb-1">{{ $article->title }}</h2>
                  </a>
                  <div class="pt-1">
                    <div class="text-gray-100">
                        <a href="{{ $categorie_article->name }}"  class="text-sm px-2 py-1 rounded mr-2 font-Roboto-condensed" style="background-color: {{ $categorie_article->color }}">{{ $categorie_article->name }}</a>
                        <span class="text-xs">- {{ \Carbon\Carbon::parse($article->created_at)->format('F j, Y') }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </article>
            @else
            <article class="col-span-3 p-1">
              <div class="relative hover-img h-[250px] overflow-hidden">
                <a href="/blog/{{ $categorie_article->name }}/{{ $article->slug }}">
                  <img class="max-w-full w-full mx-auto h-full object-cover" src="{{ $article->image }}" alt="Image description">
                </a>
                <div class="absolute px-4 pt-7 pb-4 bottom-0 h-full w-full bg-black bg-opacity-70 flex justify-end flex-col">
                  <a href="/blog/{{ $categorie_article->name }}/{{ $article->slug }}">
                    <h2 class="text-lg font-bold capitalize leading-tight font-Roboto-condensed text-white mb-1">{{ $article->title }}</h2>
                  </a>
                  <div class="pt-1">
                    <div class="text-gray-100">
                        <a href="{{ $categorie_article->name }}" class="text-sm px-2 py-1 rounded mr-2 font-Roboto-condensed" style="background-color:{{ $categorie_article->color }}">{{ $categorie_article->name }}</a>
                        <span class="text-xs">- {{ \Carbon\Carbon::parse($article->created_at)->format('F j, Y') }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </article>
            @endif
            @endforeach

          </div>
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
                    <a class="mb-4 md:mb-0 w-full relative rounded inline-block" style="height: 280px;" href="/blog/{{ $post->slug }}">
                        <div class="absolute left-0 bottom-0 w-full h-full z-10"
                        style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                        <img src="{{ $post->image }}" class="absolute left-0 top-0 w-full h-full rounded z-0 object-cover" />
                    </a>
                </div>
                <div class="col-span-1">
                  <div class="text-gray-100 pb-2">
                    @php
                        $category = App\Models\Categorie::find($post->categorie_id);
                    @endphp
                
                    @if($category)
                        <a href="/blog/{{ $category->name }}" class="text-sm px-2 py-1 rounded mr-2 font-Roboto-condensed" style="background-color:{{ $category->color }}">{{ $category->name }}</a>
                    @else
                        <span class="bg-red-600 text-sm px-2 py-1 rounded mr-2">No Category</span>
                    @endif
                </div>
                
                    <div class="flex flex-col items-start">
                            <a href="/blog/{{ $category->name }}/{{ $post->slug }}" class="text-[22px] leading-tight font-Roboto-condensed font-bold py-2">
                                {{ $post->title }}
                            </a>
                            <span class=" text-gray-500 inline-flex items-center justify-center font-Roboto-condensed text-[17px] my-2">
                                {{ strftime('%A %e %B %Y', strtotime($post->created_at)) }}
                            </span>
                            <p class=" text-gray-500 font-Roboto-condensed text-[16px] my-3">
                                {!! Illuminate\Support\Str::limit(strip_tags($post->body), 110, ' [...]') !!}
                            </p>
                    </div>
                    <div class="flex items-center my-2 gap-2">
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



        <!-- right sidebar -->
        <div class="w-full lg:w-[30%] px-3">

            <div class="pt-2 xl:col-span-3 lg:col-span-4 ml-10">
                <div class="mt-5 bg-[#e9ecfe] p-5 flex flex-col items-center">
                    <img src="{{ asset('images/newsletter.png') }}" class="w-[150px] h-[150px]" alt="">
                    <h5 class="text-black text-lg font-medium">Daily Newsletter</h5>
                    <p class="py-3 text-center text-sm text-[#444c6c]">Apply Your Email and Get all the Top Stories of fbtemplates</p>
                    <input type="text" class="w-full border-none rounded" placeholder="Enter your Email">
                    <button class="bg-[#99abd3] w-full my-5 p-2 text-white">Subscribe</button>
                    <label for="" class="flex items-center text-sm">
                        <input type="checkbox" class="border-none mr-1" name="" id="">
                        I agree to the terms & conditions
                    </label>
                </div>
                <div class="mt-5">
                  <div class="my-2 flex items-center justify-between space-x-1">
                      <h4 class="capitalize rounded mb-2 font-Roboto-condensed text-[18px] bg-second-color font-bold" style="padding:0 10px 1px">Categories</h4>
                      <div class="flex-1 border-t-[1.5px] border-gray-200"></div>
                  </div>
                  <div class="mt-3 flex flex-col">
                      @forelse ($categories as $categorie)
                          <a href="/blog/{{ $categorie->name }}" class="font-Roboto text-[16px] py-1 text-gray-500 hover:text-gray-800 transition-colors">{{ $categorie->name }}</a>
                      @empty
                      
                      @endforelse
                  </div>
              </div> 
                @if($bannerBigRight)
                    <div class="mt-5" id="hero-section">
                        <form id="bannerClickForm-{{ $bannerBigRight->id }}" action="{{ route('banner.click', ['id' => $bannerBigRight->id]) }}" method="POST" target="_blank">
                            @csrf
                            <button type="submit" class=" bg-none border-none w-full">
                                <img id="banner-{{ $bannerBigRight->id }}" src="http://localhost:8000{{ $bannerBigRight->image }}" data-banner-id="{{ $bannerBigRight->id }}" style="height:600px;width:300px"  alt="">
                            </button>
                        </form>
                    </div>
                @endif
                <div class="mt-5 flex flex-col space-y-5">
                    <h4 class="font-Lato text-[17px] uppercase">Social Media</h4>
                    <a href="#" class="w-full bg-[#506fbf] rounded-full flex justify-between items-center">
                        <span class="text-sm text-white ml-5">Facebook</span>
                        <div class="bg-[#445fa2] rounded-full px-4 py-3">
                            <i class="fa-brands fa-facebook text-white"></i>
                        </div>
                    </a>
                    <a href="#" class="w-full bg-black bg-opacity-80 rounded-full flex justify-between items-center">
                        <span class="text-sm text-white ml-5">Twitter</span>
                        <div class="bg-black rounded-full px-4 py-3">
                            <i class="fa-brands fa-x-twitter text-white"></i>
                        </div>
                    </a>

                    <a href="#" class="w-full bg-red-400 rounded-full flex justify-between items-center">
                        <span class="text-sm text-white ml-5">Youtube</span>
                        <div class="bg-red-600 rounded-full px-4 py-3">
                            <i class="fa-brands fa-youtube text-white"></i>
                        </div>
                    </a>
                    <a href="#" class="w-full rounded-full flex justify-between items-center" style="background: radial-gradient(circle at 33% 100%,#fed373 4%,#f15245 30%,#d92e7f 62%,#9b36b7 85%,#515ecf)">
                        <span class="text-sm text-white ml-5">Instagram</span>
                        <div class="bg-[#9b36b7] rounded-full px-4 py-3">
                            <i class="fa-brands fa-instagram text-white"></i>
                        </div>
                    </a>
                </div>
                @if($bannerSmallRight)
                    <div class="mt-5" id="hero-section">
                        <form id="bannerClickForm-{{ $bannerSmallRight->id }}" action="{{ route('banner.click', ['id' => $bannerSmallRight->id]) }}" method="POST" target="_blank">
                            @csrf
                            <button type="submit" class=" bg-none border-none w-full">
                                <img id="banner-{{ $bannerSmallRight->id }}" src="http://localhost:8000{{ $bannerSmallRight->image }}" data-banner-id="{{ $bannerSmallRight->id }}" style="height:250px;width:300px" alt="">
                            </button>
                        </form>
                    </div>
                @endif
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