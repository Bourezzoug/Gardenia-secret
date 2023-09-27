@extends('layouts.frontend')
@section('title', 'Gardenia Secret - ' . ($post->seo_title ?? $post->title))
@section('meta_description', $post->meta_description )
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
        <div class="w-full lg:w-2/3">

            <div>
                <a 
                class="mb-4 md:mb-0 w-full relative rounded inline-block" 
                style="height: 30em;"
                href="./blog.html">
                <div class="absolute left-0 bottom-0 w-full h-full z-10"
                style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                <img src="{{ $post->image }}" class="absolute left-0 top-0 w-full h-full rounded z-0 object-cover" />
                <div class="p-4 z-20">


                </div>
    
            </a>
            <div class="flex flex-col items-start">
                <span class=" text-gray-500 inline-flex items-center justify-center font-cormorant text-[17px] ">
                    {{ strftime('%A %e %B %Y', strtotime($post->created_at)) }}
                </span>
                    <a href="#" class="text-2xl uppercase leading-tight font-Lato py-3">
                        <!-- GLOWING SKIN IS A RESULT OF PROPER SKINCARE -->
                        {{ $post->title }}
                    </a>
                    <div class=" text-gray-600 font-cormorant text-xl leading-loose">
                        {!! $post->body !!}
                    </div>
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

            {{-- Comment Section --}}

            {{-- <section class="bg-white pt-8">
                <div class="max-w-2xl ">
                    <div class="flex justify-between items-center mb-6">
                      <h2 class="text-lg lg:text-2xl font-Lato uppercase text-gray-900">Discussion (2)</h2>
                  </div>
                  <form class="mb-6">
                      <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
                          <label for="comment" class="sr-only">Your comment</label>
                          <textarea id="comment" rows="6"
                              class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none"
                              placeholder="Write a comment..." required></textarea>
                      </div>
                      <button type="submit"
                          class="inline-flex items-center py-4 px-4 text-xs font-medium text-center text-black bg-pink-color rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                          Post comment
                      </button>
                  </form>
                  <article class="p-6 mb-6 text-base bg-white rounded-lg">
                      <footer class="flex justify-between items-center mb-2">
                          <div class="flex items-center">
                              <p class="inline-flex items-center mr-3 text-sm text-gray-900"><img
                                      class="mr-2 w-10 h-10 rounded-full font-Lato"
                                      src="https://biagiotti.qodeinteractive.com/wp-content/uploads/2019/08/admin-new-img.jpg"
                                      alt="JANNY JOE">JANNY JOE</p>
                              <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-08"
                                      title="February 8th, 2022">Feb. 8, 2022</time></p>
                          </div>
                      </footer>
                      <p class="text-gray-500 font-cormorant">Vim porro alterum at, labores noluisse ullam corper at me has. Lorem ipsum dolor sit amet, an rebum aeque tractatos has, te solet doctus ocurreret sit. Nam falli fabulas repudiandae. </p>
                      <div class="flex items-center mt-4 space-x-4">
                          <button type="button"
                              class="flex items-center text-sm text-gray-500 hover:underline">
                              <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                              Reply
                          </button>
                      </div>
                  </article>
                  <article class="p-6 mb-6 ml-6 lg:ml-12 text-base bg-white rounded-lg">
                      <footer class="flex justify-between items-center mb-2">
                          <div class="flex items-center">
                              <p class="inline-flex items-center mr-3 text-sm text-gray-900"><img
                                      class="mr-2 w-10 h-10 rounded-full"
                                      src="https://biagiotti.qodeinteractive.com/wp-content/uploads/2019/07/user-img-2-100x100.jpg"
                                      alt="Jese Leos">Jese Leos</p>
                              <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-12"
                                      title="February 12th, 2022">Feb. 12, 2022</time></p>
                          </div>
                      </footer>
                      <p class="text-gray-500">Much appreciated! Glad you liked it ☺️</p>
                      <div class="flex items-center mt-4 space-x-4">
                          <button type="button"
                              class="flex items-center text-sm text-gray-500 hover:underline">
                              <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                              Reply
                          </button>
                      </div>
                  </article>

                </div>
            </section> --}}

        </div>

        <!-- right sidebar -->
        <div class="w-full lg:w-1/3 px-3">
            <div class="hidden py-2 xl:col-span-3 lg:col-span-4 md:hidden lg:block">
            <div class=" space-x-5">
                <h4 class="font-Lato text-[17px] uppercase">RECENT POSTS</h4>
            </div>
            <div class="flex flex-col divide-y">
                @forelse ($recentArticle as $recentArticle)
                <div class="flex px-1 py-4">
                    <a href="/blog/{{ $recentArticle->slug }}">
                        <img alt=""  class="flex-shrink-0 object-cover w-20 h-20 mr-4 " src="{{ $recentArticle->image }}">
                    </a>
                    <div class="flex flex-col flex-grow">
                        <a rel="noopener noreferrer" href="/blog/{{ $recentArticle->slug }}"class="  font-Lato text-[17px]">{{ $recentArticle->title }}</a>
                        <p class="mt-auto text-xs font-Lato">{{ strftime('%A %e %B %Y', strtotime($post->created_at)) }}
                        </p>
                    </div>
                </div>
                @empty
                    
                @endforelse

                {{-- <div class="flex px-1 py-4">
                    <img alt="" class="flex-shrink-0 object-cover w-20 h-20 mr-4 " src="https://biagiotti.qodeinteractive.com/wp-content/uploads/2019/04/blog-img-3-150x150.jpg">
                    <div class="flex flex-col flex-grow">
                        <a rel="noopener noreferrer" href="#" class="font-Lato text-[17px] ">Vitae semper augue purus tincidunt libero.</a>
                        <p class="mt-auto text-xs font-Lato">Wed 24 May
                        </p>
                    </div>
                </div>
                <div class="flex px-1 py-4">
                    <img alt="" class="flex-shrink-0 object-cover w-20 h-20 mr-4 " src="https://scontent-atl3-1.cdninstagram.com/v/t51.29350-15/129760562_1041919162990597_7230388868721029527_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=8ae9d6&_nc_ohc=wQzfD4X0zrQAX9sLsUT&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=ANo9K5cEAAAA&oh=00_AfCnPjqIA4HNIdyslebSWYUN2S4JkCCgkXZJy5B1uKdAaA&oe=6471D2FA">
                    <div class="flex flex-col flex-grow">
                        <a rel="noopener noreferrer" href="#" class="font-Lato text-[17px] ">Vitae semper augue purus tincidunt libero.</a>
                        <p class="mt-auto text-xs font-Lato">Wed 24 May
                        </p>
                    </div>
                </div>
                <div class="flex px-1 py-4">
                    <img alt="" class="flex-shrink-0 object-cover w-20 h-20 mr-4 " src="https://biagiotti.qodeinteractive.com/wp-content/uploads/2019/04/blog-img-3-150x150.jpg">
                    <div class="flex flex-col flex-grow">
                        <a rel="noopener noreferrer" href="#" class="font-Lato text-[17px] ">Vitae semper augue purus tincidunt libero.</a>
                        <p class="mt-auto text-xs font-Lato">Wed 24 May
                        </p>
                    </div>
                </div> --}}
            </div>
            </div>
            <div class="mt-10 ">
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
            </div>


        </div>

    </div>
    </main>
    <!-- main ends here -->

</div>



@include('pages.components.popup')
@include('pages.components.top')

@include('pages.components.footer')

@endsection