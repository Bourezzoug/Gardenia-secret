@extends('layouts.frontend')
@section('title', 'Gardenia Secret - ' . ($post->seo_title ?? $post->title))
@section('meta_description', $post->meta_description )
@section('content')

@include('pages.components.header')
<div class="xl:container mx-auto px-3 sm:px-4 xl:px-2 flex justify-center pt-6" id="hero-section">
    {{-- <div class="title" style="background-image: url('https://admanager.linformation.ma/storage/banniers/September2023/q62Ug4A7SUCsGieMG3My.jpg')">
        <div class="h-56 relative">
            <div class="absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2">
                <h2 class="text-3xl font-Lato tracking-wider">BLOG</h2>
            </div>
        </div>
    </div> --}}
    <img src="{{ asset('images/banner.jpeg') }}" alt="">
</div>
<div class="max-w-screen-xl container p-6 mx-auto">

    <main class="mt-10">
        @php
        $category = App\Models\Categorie::find($post->categorie_id);
        @endphp
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3  ">
              <li class="inline-flex items-center">
                <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-main-color  ">
                  <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                </a>
              </li>

              <li aria-current="page">
                <div class="flex items-center">
                  <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                  <span class="ml-1 text-sm font-medium text-gray-800 md:ml-2 "><a href="/{{ $category->name  }}">{{ $category->name }}</a></span>
                </div>
              </li>
              <li aria-current="page">
                <div class="flex items-center">
                  <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                  <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 ">{{ $post->title }}</span>
                </div>
              </li>
            </ol>
        </nav>
        <h1 href="/blog/{{ $post->slug }}" class="text-[48px] leading-tight font-Roboto-condensed font-bold py-2 max-w-4xl">
                {{ $post->title }}
        </h1>
        <div class="my-4 flex items-center justify-between space-x-1">
            {{-- <h5 class="font-semibold text-lg capitalize p-2 rounded text-white mb-2 mr-2 font-Lato" style="background-color:#000">Football</h5> --}}
            <div class="text-[14px] font-Roboto flex items-center">
                <img src="{{ asset('images/logo-gs.jpeg') }}" class="w-[40px] h-[40px] rounded-full " alt="">
                <p class="text-[#444c6c]">
                    <span class="text-[#F67280] mx-1">By</span> GS <span class="text-[#F67280] mx-1">Published</span> {{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}
                </p>
            </div>
        </div>

    <div class="block lg:flex lg:space-x-2 px-2 lg:p-0 mt-10 mb-10">
        <!-- post cards -->
        <div class="w-full lg:w-[70%]">
            <div class=" gap-5">
                <div class="h-[550px] relative">
                    <div class="absolute left-0 bottom-0 w-full h-full z-10"
                    style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.2));"></div>
                    <img src="{{ $post->image }}" class="w-full h-full object-cover" alt="">
                </div>
                <div class="my-5 font-Roboto leading-7 text-[16px] text-[#444c6c]">
                    {!! $post->body !!}
                </div>
                <div class="flex-1 border-t-[1.5px] border-gray-200"></div>
                <div class="flex justify-between items-center">
                    <div class="my-8">
                            <span class="text-[13px] font-Roboto">Tags : </span>
                            <span class="font-bold uppercase rounded bg-[#f6f6f6] text-[10px] font-Roboto" style="padding:4px 10px 3px"># Style</span>
                            <span class="font-bold uppercase rounded bg-[#fff7f3] text-[10px] font-Roboto" style="padding:4px 10px 3px"># Féminovation</span>
                            <span class="font-bold uppercase rounded bg-[#f6f6f6] text-[10px] font-Roboto" style="padding:4px 10px 3px"># Élegance</span>
                    </div>
                    <div class="flex space-x-1">
                        <a href="#" class="w-[38px] h-[38px] rounded-full bg-[#516eab] flex items-center justify-center">
                            <i class="fa-brands fa-facebook-f  text-lg text-white"></i>
                        </a>
                        <a href="#" class="w-[38px] h-[38px] rounded-full bg-[#29c5f6] flex items-center justify-center">
                            <i class="fa-brands fa-x-twitter text-lg text-white"></i>
                        </a>
                        <a href="#" class="w-[38px] h-[38px] rounded-full bg-[#0077b5] flex items-center justify-center">
                            <i class="fa-brands fa-linkedin text-lg text-white"></i>
                        </a>
                        <a href="#" class="w-[38px] h-[38px] rounded-full bg-[#ca212a] flex items-center justify-center">
                            <i class="fa-brands fa-pinterest-p text-lg text-white"></i>
                        </a>
                        <a href="#" class="w-[38px] h-[38px] rounded-full bg-[#25d366] flex items-center justify-center">
                            <i class="fa-brands fa-whatsapp text-lg text-white"></i>
                        </a>
                        <a href="#" class="w-[38px] h-[38px] rounded-full bg-[#676869] flex items-center justify-center">
                            <i class="fa-regular fa-envelope text-lg text-white"></i>
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-4">
                    @if($prevPost)
                    @php
                    $category_prev = App\Models\Categorie::find($prevPost->categorie_id);
                    @endphp
                    <div class="bg-[#f6f6f6] col-span-2 p-[20px] flex space-x-2">
                        <img src="{{ $prevPost->image }}" class="h-[90px] w-[90px] " alt="">
                        <div class="flex flex-col ">
                            <a href="/blog/{{ $category_prev->slug }}/{{ $prevPost->slug }}" class="text-[#444c6c] text-[13px] font-Roboto mt-2">
                                <i class="fa-solid fa-angle-left"></i>
                                Previous 
                            </a>
                            <h2 class="text-[16px] font-Roboto-condensed font-bold mt-2"><a href="/blog/{{ $category_prev->slug }}/{{ $prevPost->slug }}">{{ $prevPost->title }}</a></h2>
                        </div>
                    </div>
                    @endif
                    @if ($nextPost)
                    @php
                    $category_next = App\Models\Categorie::find($nextPost->categorie_id);
                    @endphp
                    <div class="bg-[#fff7f3] col-span-2 p-[20px] flex flex-row-reverse ">
                        <img src="{{ $nextPost->image }}" class="h-[90px] w-[90px] mx-2" alt="">
                        <div class="flex flex-col text-right">
                            <a href="/blog/{{ $category_next->slug }}/{{ $nextPost->slug }}" class="text-[#444c6c] text-[13px] font-Roboto mt-2">
                                Next 
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                            <h2 class="text-[16px] font-Roboto-condensed font-bold mt-2"><a href="/blog/{{ $category_next->slug }}/{{ $nextPost->slug }}">{{ $nextPost->title }}</a></h2>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            


            </div>



        <!-- right sidebar -->
        <div class="w-full lg:w-[30%] px-3">

            <div class="pt-2 xl:col-span-3 lg:col-span-4 ml-10">
                <div>
                    <div class="my-2 flex items-center justify-between space-x-1">
                        <h4 class="capitalize rounded mb-2 font-Roboto-condensed text-[18px] bg-second-color font-bold" style="padding:0 10px 1px">Categories</h4>
                        <div class="flex-1 border-t-[1.5px] border-gray-200"></div>
                    </div>
                    <div class="mt-3 flex flex-col">
                        @forelse ($categories as $categorie)
                            <a href="/blog/{{ $categorie->slug }}" class="font-Roboto text-[16px] py-1 text-gray-500 hover:text-gray-800 transition-colors">{{ $categorie->name }}</a>
                        @empty
                        
                        @endforelse
                    </div>
                </div> 
                <div class="my-7">
                    <div class="my-2 flex items-center justify-between space-x-1">
                        <h4 class="capitalize rounded mb-2 font-Roboto-condensed text-[18px]" style="background-color:#E9ECFF;padding:0 10px 1px"><span class="font-bold">Popular</span> Posts</h4>
                        <div class="flex-1 border-t-[1.5px] border-gray-200"></div>
                    </div>
                    <div class="article-top relative h-[250px] w-full">
                        <div class="absolute left-0 bottom-0 w-full h-full z-10"
                        style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.2));"></div>
                        <img src="{{ $famousArticle->image }}" class="w-full h-full object-cover" alt="">
                        <span class="absolute top-[15px] right-[15px] w-[42px] h-[42px] flex items-center justify-center text-[18px] rounded-full" style="background: rgba(255,255,255,.85">
                            <i class="fa-solid fa-quote-right"></i>
                        </span>
                    </div>
                    @php
                        $categorie_fam = App\Models\Categorie::find($famousArticle->categorie_id);
                    @endphp
                    <div class="article-body p-[15px]">
                        <h3><a href="/blog/{{ $categorie_fam->slug }}/{{ $famousArticle->slug }}" class="font-Roboto-condensed text-[18px] font-bold">{{ $famousArticle->title }}</a></h3>
                        <span class="text-Roboto text-[#444C6C] my-2 text-[12px]">- {{ \Carbon\Carbon::parse($famousArticle->created_at)->format('F j, Y') }}</span>
                    </div>
                </div>
                <div class="my-7 flex flex-col space-y-5">
                    {{-- <h4 class="font-Roboto text-[17px] uppercase">Social Media</h4> --}}
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
                {{-- <div class="mt-5">
                    <a href="#">
                        <img src="{{ asset('images/mcdo.jpeg') }}" style="height:600px;width:300px" alt="">
                    </a>
                </div> --}}
                <div>
                    <a href="#">
                        <img src="{{ asset('images/coffe.jpeg') }}" style="height:250px;width:300px" alt="">
                    </a>
                </div>
            </div>



        </div>

    </div>
    </main>

    <!-- main ends here -->

</div>
<div class="related-post p-[50px] bg-[#f9f9f9]">
    <div class="max-w-screen-xl container p-6 mx-auto">
            <h4 class="text-[24px] font-Roboto-condensed mb-[20px] font-bold">Related Articles</h4>
            <div class="grid grid-cols-12">
                @forelse ($relatedArticles as $relatedArticle)
                @php
                $categorie = App\Models\Categorie::find($relatedArticle->categorie_id);
                @endphp
                    <div class="col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3 ">
                        <div class="article-top md:w-[250px] md:h-[250px] lg:w-[268px] lg:h-[268px] relative">
                            <div class="absolute left-0 bottom-0 w-full h-full z-10"
                            style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.3));"></div>
                            <img src="{{ $relatedArticle->image }}" class="w-full h-full object-cover" alt="">
                            <a href="/blog/{{ $categorie->slug }}" class="absolute top-3 right-3 bg-red-500 rounded font-Roboto text-[11px] z-50 text-white" style="padding:4px 10px 3px;background-color: {{ $categorie->color }}">{{ $categorie->name }}</a>
                        </div>
                        <div class="article-body p-[15px] lg:w-[268px] md:w-[200px] ">
                            <h3><a href="/blog/{{ $categorie->slug }}/{{ $relatedArticle->slug }}" class="font-Roboto-condensed text-[18px] font-bold">{{ $relatedArticle->title }}</a></h3>
                            <span class="text-Roboto text-[#444C6C] my-2 text-[12px]">- {{ \Carbon\Carbon::parse($relatedArticle->created_at)->format('F j, Y') }}</span>
                        </div>
                    </div>
                @empty
                    
                @endforelse
            </div>
    </div>
</div>



@include('pages.components.popup')
@include('pages.components.top')

@include('pages.components.footer')

@endsection