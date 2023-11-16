@extends('layouts.frontend')
@section('title', 'Gardenia Secret - ' . $category->name)
@section('meta_description',  $category->name)
@section('content')

@include('pages.components.BlogHeader')
<div class="container mx-auto p-6">
    <img src="{{ asset('images/banner-top.jpeg') }}" class="mx-auto" alt="">
  </div>
<div class="max-w-screen-xl container p-6 mx-auto">

    <main class="mt-10">


    <div class="block lg:flex lg:space-x-2 px-2 lg:p-0 mt-10 mb-10">
        <!-- post cards -->
        <div class="w-full lg:w-[70%]">
            <div class="lg:grid grid-cols-2 gap-5">
                @forelse ($posts as $post)
                @php
                    $category = App\Models\Categorie::find($post->categorie_id);
                @endphp
                <div class="col-span-1">
                    <a class="mb-4 md:mb-0 w-full relative rounded inline-block" style="height: 280px;" href="/blog/{{ $category->slug }}/{{ $post->slug }}">
                        <div class="absolute left-0 bottom-0 w-full h-full z-10"
                        style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                        <img src="{{ $post->image }}" class="absolute left-0 top-0 w-full h-full rounded z-0 object-cover" />
                    </a>
                </div>
                <div class="col-span-1">


                
                    <div class="flex flex-col items-start">
                            <a href="/blog/{{ $category->slug }}/{{ $post->slug }}" class="text-[22px] leading-tight font-Roboto-condensed font-bold py-2">
                                {{ $post->title }}
                            </a>
                            <span class=" text-gray-500 inline-flex items-center justify-center font-Roboto-condensed text-[17px] my-2">
                                {{ strftime('%A %e %B %Y', strtotime($post->created_at)) }}
                            </span>
                            <p class=" text-gray-500 font-Roboto-condensed text-[16px] my-3">
                                {!! Illuminate\Support\Str::limit(strip_tags($post->body), 110, '...') !!}
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
                {{ $posts->links() }} 
            </div>



            </div>



        <!-- right sidebar -->
        <div class="w-full lg:w-[30%] px-3">

            <div class="pt-2 xl:col-span-3 lg:col-span-4 ml-10">
                <div>
                    <img src="{{ asset('images/banner-right.jpeg') }}" alt="">
                </div>
                <form class="mt-5 bg-red-50 p-5 flex flex-col items-center" action="{{ Route('email.store') }}" method="POST" id="newsletter">
                    @csrf
                    <img src="{{ asset('images/newsletter.png') }}" class="w-[150px] h-[150px]" alt="">
                    <h5 class="text-black text-lg font-medium">Daily Newsletter</h5>
                    <p class="py-3 text-center text-sm text-[#444c6c]">Apply Your Email and Get all the Top Stories of fbtemplates</p>
                    <input type="text" name="email" class="w-full border-none rounded" placeholder="Enter your Email" required>
                    <button type="submit" class="bg-second-color w-full my-5 p-2 text-black">Subscribe</button>
                    <label for="" class="flex items-center text-sm">
                        <input type="checkbox" class="border-none mr-1" name="" id="" required>
                        I agree to the terms & conditions
                    </label>
                </form>

                <div class="mt-5">
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


                <div class="mt-5 flex flex-col space-y-5">
                    <div class="my-2 flex items-center justify-between space-x-1">
                        <h4 class="capitalize rounded mb-2 font-Roboto-condensed text-[18px] bg-second-color font-bold" style="padding:0 10px 1px">Social Media</h4>
                        <div class="flex-1 border-t-[1.5px] border-gray-200"></div>
                    </div>
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
                </div>
                <div class="mt-5">
                    <img src="{{ asset('images/banner-right-s.jpeg') }}" alt="">
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

<script>
    var newsLetterFormShop = document.getElementById('newsletter');
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    newsLetterFormShop.addEventListener('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(newsLetterFormShop);

        var xhr = new XMLHttpRequest();
        xhr.open(newsLetterFormShop.method, newsLetterFormShop.action);
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 422) { 
        var errorObj = JSON.parse(xhr.responseText);
        var errors = errorObj.errors || {};
        for (var field in errors) {
            var inputField = document.querySelector('[name="' + field + '"]');
            inputField.classList.add('is-invalid');
            var errorElement = inputField.nextElementSibling;
            errorElement.innerHTML = errors[field][0];
            errorElement.style.display = 'block';
        }

        var message = errorObj.message || "Error";
        if(message.includes('The email has already been taken.')) {
            Toastify({
                text: 'Email déjà utilisée',
                duration: 3000, 
                gravity: 'top', 
                position: 'center', 
                backgroundColor: '#ef4444', 
                stopOnFocus: true, 
                }).showToast();
        }
        }
    else if (xhr.status === 200) {
        // if (this.responseText == 'exists') {

                Toastify({
                text: 'Merci pour votre inscription',
                duration: 3000, 
                gravity: 'top', 
                position: 'center', 
                backgroundColor: '#af8d6a', 
                stopOnFocus: true, 
                }).showToast();
            } else {
                handleSuccess();
            // }
            }
        }
        };
        xhr.send(formData);
    });

</script>

@endsection