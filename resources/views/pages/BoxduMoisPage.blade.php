@extends('layouts.frontend')
{{-- @section('title', 'Gardenia Secret - ' . $category->name)
@section('meta_description',  $category->name) --}}
@section('content')

@include('pages.components.headerTest')

<section id="box" class="py-10">

    <div class="container mx-auto px-4">
      <div class="flex items-center justify-center flex-col concept">
        <h2 class="text-2xl sm:text-3xl md:text-header my-8 font-Lato uppercase relative z-10">Box Of The Month</h2>
      </div>
  
      <div class=" lg:col-gap-12 xl:col-gap-16 mt-8  grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-6">
        <div class="lg:col-span-3 lg:row-end-1 lg:ml-20">
          <div class="lg:flex lg:items-start">
            <div class="lg:order-2">
              <div class="max-w-lg overflow-hidden rounded-lg relative">
                <img id="mainBoxImage" class="w-[350px] h-[350px] md:h-[400px] md:w-[500px] object-cover main-box-img" src="{{ $boxMonth->image }}" alt="" />
                @if($boxMonth->stock == 0)
                    <span class="absolute top-1/2 left-0  w-full bg-black bg-opacity-80 text-white p-1  rounded-br text-center text-2xl uppercase font-Roboto-condensed">
                        out of stock
                    </span>
                @endif
              </div>
            </div>

            <div class="mt-2 w-full lg:order-1 lg:w-32 lg:flex-shrink-0">
              <div class="flex flex-row items-start lg:flex-col">
                <button  type="button" class="btn-gallery flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-gray-900 text-center" onclick="changeMainImage(this, '{{ $boxMonth->image }}')">
                  <img class="h-full w-full object-cover" src="{{ $boxMonth->image }}" alt="" />
                </button>
                @forelse (explode(',',$boxMonth->gallery) as $image)
                <button  type="button" class="btn-gallery flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg text-center" onclick="changeMainImage(this, '{{ $image }}')">
                    <img class="h-full w-full object-cover" src="{{ $image }}"  alt="" />
                </button>
                @empty
                    
                @endforelse
              </div>
            </div>
          </div>
        </div>
  
        <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
          <h1 id="boxTitle" class="sm: text-2xl font-bold text-gray-900 sm:text-3xl">{{ $boxMonth->box_name }}</h1>
  


        <div class="grid grid-flow-col gap-5 text-center auto-cols-max justify-between pt-12 w-9/12">
            <div class="flex flex-col">
                <span class="countdown font-mono text-4xl countdown-days"></span>
                Jours
            </div> 
            <div class="flex flex-col">
                <span class="countdown font-mono text-4xl countdown-hours"></span>
                Heures
            </div> 
            <div class="flex flex-col">
                <span class="countdown font-mono text-4xl countdown-minutes"></span>
                Minutes
            </div> 
            <div class="flex flex-col">
                <span class="countdown font-mono text-4xl countdown-seconds"></span>
                Seconds
            </div>
        </div>
        <div id="boxDescription" class="text-justify mt-5 border-t flex flex-col items-center justify-between space-y-4  py-4 sm:flex-row sm:space-y-0">
            {{ $boxMonth->description }}
        </div>


        <div class="flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0">
            {{-- <div class="flex gap-5"> --}}
                {{-- <h1 class="text-xl font-semibold line-through">
                        <span class="text-base font-bold">$400.00</span>
                </h1>
                <h1 class="text-xl font-semibold" >
                    <span class="text-3xl font-extrabold" >$<span id="boxPrice">{{ $boxMonth->cheap_price }}</span></span>
                </h1> --}}
            {{-- </div> --}}
            <a href="/box-subscription" type="button" class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-[#e9b5a8] bg-none py-2 text-center text-base font-bold text-white transition-all duration-200 w-full ease-in-out focus:shadow ">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg> --}}
                What we offer
            </a>
        </div>

        {{-- <div class=" flex item-center gap-5 mt-8">

            <button type="button" class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-[#e9b5a8] bg-none py-2 text-center text-base font-bold text-white transition-all duration-200 w-full ease-in-out focus:shadow ">
                <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                Add to cart
            </button>


        </div> --}}

    </div>
    </div>
</section>
<script>
    function changeMainImage(button, newSrc) {
        // Remove border from all buttons
        var buttons = document.querySelectorAll('.btn-gallery');
        buttons.forEach(function(btn) {
            btn.classList.remove('border-2', 'border-gray-900');
        });

        // Add border to the clicked button
        button.classList.add('border-2', 'border-gray-900');

        // Change the main image source
        document.getElementById('mainBoxImage').src = newSrc;
    }



        // select the elements to update
        const daysElement = document.querySelector('.countdown-days');
        const hoursElement = document.querySelector('.countdown-hours');
        const minutesElement = document.querySelector('.countdown-minutes');
        const secondsElement = document.querySelector('.countdown-seconds');

        // set the initial countdown time (in seconds)
        let countdownTime = 15 * 24 * 60 * 60; // 15 days

        // update the countdown every second
        setInterval(() => {
        // calculate the remaining time
        const days = Math.floor(countdownTime / (24 * 60 * 60));
        const hours = Math.floor((countdownTime % (24 * 60 * 60)) / (60 * 60));
        const minutes = Math.floor((countdownTime % (60 * 60)) / 60);
        const seconds = Math.floor(countdownTime % 60);

        // update the elements
        daysElement.textContent = days;
        hoursElement.textContent = hours;
        minutesElement.textContent = minutes;
        secondsElement.textContent = seconds;

        // decrease the countdown time by one second
        countdownTime--;
        }, 1000);
</script>

@include('pages.components.popup')
@include('pages.components.top')

@include('pages.components.footer')

@endsection