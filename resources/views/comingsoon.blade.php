<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite(['resources/css/comingsoon.css'])
</head>
<body>
    <div class="md:grid grid-cols-2">
        <div class="col-span-1 bg-overlay" style="background-image: url('{{ asset('images/bg.jpeg') }}');background-position:top left;background-size:cover">
            <section class="h-full py-10 max-w-md mx-auto sm:max-w-xl sm:py-14 lg:flex flex-col lg:max-w-lg">
            <header class="px-6 sm:px-0 lg:py-4">
                <img class="w-32 lg:w-64 z-50 relative" src="{{ asset('images/logo.png') }}" alt="base apparel logo"  />
            </header>
        <div class="text-center px-6 mt-8 sm:px-0 sm:mt-12 sm:max-w-sm sm:mx-auto lg:mx-0 lg:max-w-xl lg:text-left lg:my-auto z-50" >
            <h1 class="text-4xl uppercase tracking-[0.25em] sm:text-5xl lg:text-6xl xl:text-7xl" >
                <span class="font-light text-pink-color">We're</span>
                <br />
                <span class="font-bold text-dark-grayish-red text-maron"
                    >coming<br />
                    soon</span
                >
            </h1>

            <form action="/" method="POST">
                @csrf
                <div class="flex items-center">
                                    <input type="text" name="email" class="w-8/12 border py-3 outline-none rounded-l-full my-20 px-5 " placeholder="Address email">
                                    <button class="bg-pink-color px-5 py-3 rounded-r-full " >
                                        <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill:#FFF" viewBox="0 0 24 24"><path fill="currentColor" d="M8.59 16.59L13.17 12L8.59 7.41L10 6l6 6l-6 6l-1.41-1.41z"/></svg>
                                    </button>
                </div>
            </form>
        </div>
        </section>
        </div>
<div class="col-span-1 h-screen">
  <video src="{{ asset('images/intro.mp4') }}" class="w-full h-full object-cover" autoplay muted loop></video>
</div>

    </div>
</body>
</html>