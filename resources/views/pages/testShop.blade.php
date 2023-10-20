@extends('layouts.frontend')

@section('content')

@include('pages.components.header')

<div class="container mx-auto p-6">

<div class="bg-white">
    <div>

      <div class="relative lg:hidden z-[10000]" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-black bg-opacity-25 filter-overlay transform transition-transform"></div>
  
        <div class="fixed inset-0 z-40 flex filter-overlay-container transform transition-transform">

          <div class="filter-container transform transition-transform relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
            <div class="flex items-center justify-between px-4">
              <h2 class="text-lg font-medium text-gray-900">Filters</h2>
              <button type="button" class="close-filter-m transform transition-transform -mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
  
            <!-- Filters -->
            <form class="mt-4 border-t border-gray-200">

              <div class="border-b border-gray-200 py-6 px-5">
                <div class="flex items-center flex-wrap my-3">
                    <div class="relative w-full ">
                        <input type="text" id="search-input" class="w-full font-Roboto-condensed rounded py-3 border-gray-200 outline-none focus:outline-none focus:shadow-none active:outline-none active:shadow-none" style="box-shadow: none" placeholder="Product Name" name="search" />
                        <i class="fa-solid fa-magnifying-glass absolute top-1/2 -translate-y-1/2 right-4 text-gray-500"></i>
                    </div>
                </div>
              </div>
              <div class="border-t border-gray-200 px-4 py-6">
                <h3 class="-mx-2 -my-3 flow-root">
                  <!-- Expand/collapse section button -->
                  <button type="button" class="w-full flex items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-0" aria-expanded="false">
                    <span class="font-medium text-gray-900">Price</span>
                    <span class="ml-6 flex items-center">
                      <!-- Expand icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5 hidden close-price-m" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                      </svg>
                      <!-- Collapse icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5 open-price-m" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div class="pt-6 hidden" id="filter-section-mobile-0">
                  <div class="space-y-6">
                    <div class="flex items-center">
                      <input id="filter-price-0" name="price" value="0-50" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-price-0" class="ml-3 text-sm text-gray-600">Under 50$</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-price-1" name="price" value="50-100" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-price-1" class="ml-3 text-sm text-gray-600">50$ to 100$</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-price-2" name="price" value="100-150" type="radio"  class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-price-2" class="ml-3 text-sm text-gray-600">100$ to 150$</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-price-3" name="price" value="150-200" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-price-3" class="ml-3 text-sm text-gray-600">150$ to 200$</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-price-4" name="price" value="200-250" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-price-4" class="ml-3 text-sm text-gray-600">200$ to 250$</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-price-5" name="price" value="250-999999999" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-price-5" class="ml-3 text-sm text-gray-600">over 250$</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="border-t border-gray-200 px-4 py-6">
                <h3 class="-mx-2 -my-3 flow-root">
                  <!-- Expand/collapse section button -->
                  <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-1" aria-expanded="false">
                    <span class="font-medium text-gray-900">Category</span>
                    <span class="ml-6 flex items-center">
                      <!-- Expand icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5 hidden close-cat-m" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                      </svg>
                      <!-- Collapse icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5 open-cat-m" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div class="pt-6 hidden" id="filter-section-mobile-1">
                  <div class="space-y-6">
                    @forelse ($categorie as $cat)
                    <div class="flex items-center">
                      <input id="filter-category-0" name="categories[]" value="{{ $cat->id }}" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-category-0" class="ml-3 text-sm text-gray-600">{{ $cat->name }}</label>
                    </div>
                    @empty
                      
                    @endforelse
                  </div>
                </div>
              </div>
              <div class="border-t border-gray-200 px-4 py-6">
                <h3 class="-mx-2 -my-3 flow-root">
                  <!-- Expand/collapse section button -->
                  <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-2" aria-expanded="false">
                    <span class="font-medium text-gray-900">Brand</span>
                    <span class="ml-6 flex items-center">
                      <!-- Expand icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5 hidden close-brand-m" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                      </svg>
                      <!-- Collapse icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5 open-brand-m" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div class="pt-6 hidden" id="filter-section-mobile-2">
                  <div class="space-y-4">
                    <div class="flex items-center">
                      <input id="filter-brand-0" name="brand[]" value="2l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-brand-0" class="ml-3 text-sm text-gray-600">
                            Sephora Favorites
                      </label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-brand-1" name="brand[]" value="6l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-brand-1" class="ml-3 text-sm text-gray-600">
                            Sol de Janeiro
                      </label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-brand-2" name="brand[]" value="12l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-brand-2" class="ml-3 text-sm text-gray-600">
                        Carolina Herrera
                      </label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-brand-3" name="brand[]" value="18l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-brand-3" class="ml-3 text-sm text-gray-600">
                        Yves Saint Laurent
                      </label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-brand-4" name="brand[]" value="20l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-brand-4" class="ml-3 text-sm text-gray-600">
                        Valentino
                      </label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-brand-5" name="brand[]" value="40l" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-brand-5" class="ml-3 text-sm text-gray-600">
                        Versace
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  
      <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-10">
          <h1 class="text-4xl font-bold tracking-tight text-gray-900">New Arrivals</h1>
  
          <div class="flex items-center">
            <div class="relative inline-block text-left">
              <div>
                <button type="button" class="sort-btn group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900 " id="menu-button" aria-expanded="false" aria-haspopup="true">
                  Sort
                  <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
  
              <!--
                Dropdown menu, show/hide based on menu state.
  
                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div class="sort-values hidden absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                <div class="py-1" role="none">
                  <!--
                    Active: "bg-gray-100", Not Active: ""
  
                    Selected: "font-medium text-gray-900", Not Selected: "text-gray-500"
                  -->
                  <a href="#" class="font-medium text-gray-900 block px-4 py-2 text-sm sort-option" data-sort="popular">Most Popular</a>
                  <a href="#" class="text-gray-500 block px-4 py-2 text-sm sort-option" data-sort="rating">Best Rating</a>
                  <a href="#" class="text-gray-500 block px-4 py-2 text-sm sort-option" data-sort="newest">Newest</a>
                  <a href="#" class="text-gray-500 block px-4 py-2 text-sm sort-option" data-sort="lowToHigh">Price: Low to High</a>
                  <a href="#" class="text-gray-500 block px-4 py-2 text-sm sort-option" data-sort="highToLow">Price: High to Low</a>
                </div>
              </div>
            </div>
  

            <button type="button" class="open-filter-m -m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
              <span class="sr-only">Filters</span>
              <i class="fa-solid fa-ellipsis"></i>
            </button>
          </div>
        </div>
  
        <section aria-labelledby="products-heading" class="pb-24 pt-6">
          <h2 id="products-heading" class="sr-only">Products</h2>
  
          <div class="grid grid-cols-1 gap-x-16 gap-y-10 lg:grid-cols-12 ">
            <!-- Filters -->
            <form class="hidden lg:col-span-3 lg:block">

              <div class="border-b border-gray-200 py-6">
                <div class="flex justify-between items-center">
                    <h3 class="font-Roboto-condensed text-xl">Filters</h3>
                    <button class="font-Roboto-condensed text-xs text-gray-400">Clear All</button>
                </div>
                <div class="flex items-center flex-wrap my-3">
                    {{-- <div class="p-2 my-1 rounded text-xs bg-gray-100 flex space-x-2 mr-2 font-Roboto-condensed">
                        <span>Accessoires</span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="text-sm text-body ltr:ml-2 rtl:mr-2 flex-shrink-0 ltr:-mr-0.5 rtl:-ml-0.5 mt-0.5 transition duration-200 ease-in-out group-hover:text-heading" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M289.94 256l95-95A24 24 0 00351 127l-95 95-95-95a24 24 0 00-34 34l95 95-95 95a24 24 0 1034 34l95-95 95 95a24 24 0 0034-34z"></path></svg>
                    </div>
                    <div class="p-2 my-1 rounded text-xs bg-gray-100 flex space-x-2 mr-2 font-Roboto-condensed">
                        <span>Bracelets</span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="text-sm text-body ltr:ml-2 rtl:mr-2 flex-shrink-0 ltr:-mr-0.5 rtl:-ml-0.5 mt-0.5 transition duration-200 ease-in-out group-hover:text-heading" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M289.94 256l95-95A24 24 0 00351 127l-95 95-95-95a24 24 0 00-34 34l95 95-95 95a24 24 0 1034 34l95-95 95 95a24 24 0 0034-34z"></path></svg>
                    </div>
                    <div class="p-2 my-1 rounded text-xs bg-gray-100 flex space-x-2 mr-2 font-Roboto-condensed">
                        <span>Perfume</span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="text-sm text-body ltr:ml-2 rtl:mr-2 flex-shrink-0 ltr:-mr-0.5 rtl:-ml-0.5 mt-0.5 transition duration-200 ease-in-out group-hover:text-heading" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M289.94 256l95-95A24 24 0 00351 127l-95 95-95-95a24 24 0 00-34 34l95 95-95 95a24 24 0 1034 34l95-95 95 95a24 24 0 0034-34z"></path></svg>
                    </div> --}}
                    <div class="relative w-full">
                        <input type="text" id="search-input" class="w-full font-Roboto-condensed rounded py-3 border-gray-200 outline-none focus:outline-none focus:shadow-none active:outline-none active:shadow-none" style="box-shadow: none" placeholder="Product Name" name="search" />
                        <i class="fa-solid fa-magnifying-glass absolute top-1/2 -translate-y-1/2 right-4 text-gray-500"></i>
                    </div>
                </div>
              </div>
  
              <div class="border-b border-gray-200 py-6">
                <h3 class="-my-3 flow-root">
                  <!-- Expand/collapse section button -->
                  <button type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false">
                    <span class="font-medium text-gray-900">Price</span>
                    <span class="ml-6 flex items-center">
                      <!-- Expand icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5 hidden open-price" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                      </svg>
                      <!-- Collapse icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5 close-price" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div class="pt-6 transition ease-in-out duration-300 transform" id="filter-section-0">
                  <div class="space-y-4">
                    <div class="flex items-center">
                      <input id="filter-price-0" name="price" value="0-50" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-price-0" class="ml-3 text-sm text-gray-600">Under 50$</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-price-1" name="price" value="50-100" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-price-1" class="ml-3 text-sm text-gray-600">50$ to 100$</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-price-2" name="price" value="100-150" type="radio"  class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-price-2" class="ml-3 text-sm text-gray-600">100$ to 150$</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-price-3" name="price" value="150-200" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-price-3" class="ml-3 text-sm text-gray-600">150$ to 200$</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-price-4" name="price" value="200-250" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-price-4" class="ml-3 text-sm text-gray-600">200$ to 250$</label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-price-5" name="price" value="250-999999999" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-price-5" class="ml-3 text-sm text-gray-600">over 250$</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="border-b border-gray-200 py-6">
                <h3 class="-my-3 flow-root">
                  <!-- Expand/collapse section button -->
                  <button type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-1" aria-expanded="false">
                    <span class="font-medium text-gray-900">Category</span>
                    <span class="ml-6 flex items-center">
                      <!-- Expand icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5 open-cat hidden" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                      </svg>
                      <!-- Collapse icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5 close-cat" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div class="pt-6" id="filter-section-1">
                  <div class="space-y-4">

                    @forelse ($categorie as $categorie)
                    <div class="flex items-center">
                      <input id="filter-category-0" name="categories[]" value="{{ $categorie->id }}" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-category-0" class="ml-3 text-sm text-gray-600">{{ $categorie->name }}</label>
                    </div>
                    @empty
                      
                    @endforelse
                  </div>
                </div>
              </div>
              <div class="border-b border-gray-200 py-6">
                <h3 class="-my-3 flow-root">
                  <!-- Expand/collapse section button -->
                  <button type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-2" aria-expanded="false">
                    <span class="font-medium text-gray-900">Brand</span>
                    <span class="ml-6 flex items-center">
                      <!-- Expand icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5 hidden open-brand" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                      </svg>
                      <!-- Collapse icon, show/hide based on section open state. -->
                      <svg class="h-5 w-5 close-brand" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div class="pt-6" id="filter-section-2">
                  <div class="space-y-4">
                    <div class="flex items-center">
                      <input id="filter-size-0" name="size[]" value="2l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-size-0" class="ml-3 text-sm text-gray-600">
                            Sephora Favorites
                      </label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-size-1" name="size[]" value="6l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-size-1" class="ml-3 text-sm text-gray-600">
                            Sol de Janeiro
                      </label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-size-2" name="size[]" value="12l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-size-2" class="ml-3 text-sm text-gray-600">
                        Carolina Herrera
                      </label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-size-3" name="size[]" value="18l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-size-3" class="ml-3 text-sm text-gray-600">
                        Yves Saint Laurent
                      </label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-size-4" name="size[]" value="20l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-size-4" class="ml-3 text-sm text-gray-600">
                        Valentino
                      </label>
                    </div>
                    <div class="flex items-center">
                      <input id="filter-size-5" name="size[]" value="40l" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-size-5" class="ml-3 text-sm text-gray-600">
                        Versace
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </form>
  
            <!-- Product grid -->
            <div class="lg:col-span-9">


  

  <section id="products-container" class="w-fit mx-auto grid grid-cols-1 xl:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">
  
    @forelse ($products as $product)
    @php
      $categorie = App\Models\Categorie::find($product->category_id);
    @endphp
    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="{{ route('product.customer.index', ['categorie' => $categorie->slug, 'slug' => $product->slug, 'id' => $product->id]) }}">
            <img src="{{ $product->photo }}" alt="{{ $product->title }}" class="h-80 w-72 object-cover rounded-t-xl" />
        </a>    
        <div class="px-4 py-3 w-72">
          <span class="text-gray-400 mr-3 uppercase text-xs font-Roboto-condensed">Brand</span>
          <h2 class="text-lg font-bold text-black  block capitalize font-Roboto-condensed">
            <a href="{{ route('product.customer.index', ['categorie' => $categorie->slug, 'slug' => $product->slug, 'id' => $product->id]) }}">{{ $product->nom }}</a>
          </h2>
          <div class="flex items-center">
            <p class="text-lg font-semibold text-black cursor-auto my-3 font-Roboto">${{ $product->prix }}</p>
            <form action="{{ route('wishlist.store', ['id' => $product->id]) }}" method="POST" class="wishlist-form-product w-full flex" data-product-id="{{ $product->id }}">
                @csrf
<button type="submit" class="ml-auto add-products-to-wishlist" 
    data-product-id="{{ $product->id }}" 
    data-in-wishlist="{{ $isInWishlist[$product->id] ? 'true' : 'false' }}">
    <div class="HeartAnimation"></div>
</button>

            </form>
          </div>
        </div>
    </div>
    @empty

    @endforelse

  
  </section>
  
  <div class="pb-10 w-4/5">
    {{-- Display the pagination links --}}
    {{ $products->links() }} 
  </div>

            </div>
          </div>
        </section>
      </main>
    </div>
  </div>
  
</div>

{{-- Script to filter and sort products--}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('click', function(event) {
    const sortOptions = document.querySelectorAll('.sort-option');
    const priceFilters = document.querySelectorAll('[name="price"');
    const categoryFilters = document.querySelectorAll('[name="categories[]"]');
    const searchInput = document.getElementById('search-input');

    function updateProducts(sortType, selectedPrices, selectedCategories, searchTerm) {
        const pricesQueryParam = selectedPrices.length > 0 ? `&prices=${selectedPrices.join(',')}` : '';
        const categoriesQueryParam = selectedCategories.length > 0 ? `&categories=${selectedCategories.join(',')}` : '';
        const searchQueryParam = searchTerm ? `&search=${searchTerm}` : '';

        fetch(`/products?sort=${sortType}${pricesQueryParam}${categoriesQueryParam}${searchQueryParam}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            const productsContainer = document.getElementById('products-container');
            productsContainer.innerHTML = ''; // Clear existing products

            data.products.data.forEach(productData => {
                // Create product container
                const productHTML = `
                <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                    <a href="#">
                        <img src="${productData.photo}" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                    </a>
                    <div class="px-4 py-3 w-72">
                    <span class="text-gray-400 mr-3 uppercase text-xs font-Roboto-condensed">Brand</span>
                    <h2 class="text-lg font-bold text-black  block capitalize font-Roboto-condensed">
                        <a href="">${productData.nom}</a>
                    </h2>
                    <div class="flex items-center">
                        <p class="text-lg font-semibold text-black cursor-auto my-3 font-Roboto">$${productData.prix}</p>
                        <form action="{{ route('wishlist.store', ['id' => $product->id]) }}" method="POST" class="wishlist-form-product w-full flex" data-product-id="{{ $product->id }}">
                            @csrf
                            <button type="submit" class="ml-auto add-products-to-wishlist">
                                <div class="HeartAnimation"></div>
                            </button>
                        </form>
                    </div>
                    </div>
                </div>
                `;

                // Append the product HTML to the products container
                productsContainer.innerHTML += productHTML;
            });
        })
        .catch(error => console.error('Error:', error));
    }

    sortOptions.forEach(option => {
        option.addEventListener('click', function(event) {
            event.preventDefault();
            const sortType = this.dataset.sort;
            const selectedPrices = Array.from(priceFilters)
                .filter(filter => filter.checked)
                .map(filter => filter.value);
            const selectedCategories = Array.from(categoryFilters)
                .filter(filter => filter.checked)
                .map(filter => filter.value);
            const searchTerm = searchInput.value.trim();

            updateProducts(sortType, selectedPrices, selectedCategories, searchTerm);
        });
    });

    priceFilters.forEach(filter => {
    filter.addEventListener('change', function() {
        const selectedPrice = document.querySelector('input[name="price"]:checked').value;
        const selectedCategories = Array.from(categoryFilters)
            .filter(filter => filter.checked)
            .map(filter => filter.value);
        const sortOption = document.querySelector('.sort-option:checked');
        const sortType = sortOption ? sortOption.dataset.sort : '';
        const searchTerm = searchInput.value.trim();
        updateProducts(sortType, [selectedPrice], selectedCategories, searchTerm);
    });
  });


    categoryFilters.forEach(filter => {
    filter.addEventListener('change', function() {
        const selectedPrices = Array.from(priceFilters)
            .filter(filter => filter.checked)
            .map(filter => filter.value);
        const selectedCategories = Array.from(categoryFilters)
            .filter(filter => filter.checked)
            .map(filter => filter.value);
        const sortOption = document.querySelector('.sort-option:checked');
        const sortType = sortOption ? sortOption.dataset.sort : '';
        const searchTerm = searchInput.value.trim();
        updateProducts(sortType, selectedPrices, selectedCategories, searchTerm);
    });
  });

    searchInput.addEventListener('input', function() {
        const selectedPrices = Array.from(priceFilters)
            .filter(filter => filter.checked)
            .map(filter => filter.value);
        const selectedCategories = Array.from(categoryFilters)
            .filter(filter => filter.checked)
            .map(filter => filter.value);
        const sortOption = document.querySelector('.sort-option:checked');
        const sortType = sortOption ? sortOption.dataset.sort : '';
        const searchTerm = this.value.trim();

        updateProducts(sortType, selectedPrices, selectedCategories, searchTerm);
    });
  });})

</script>

{{-- <script>
  document.addEventListener('DOMContentLoaded', function() {

  function updateWishlistUI(wishlists) {
    const wishList = document.getElementById('wishlistList');
    wishList.innerHTML = ''; // Clear the existing content

    wishlists.forEach(item => {
            const newItem = document.createElement('li');
            newItem.className = 'flex py-6';
            const id = `${item.id}`;
            const csrf = document.head.querySelector("[name=csrf-token]").content;
            newItem.innerHTML = `
                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                    <img src="${item.product.photo}" alt="Product Image" class="h-full w-full object-cover object-center">
                </div>
                <div class="ml-4 flex flex-1 flex-col">
                    <div>
                        <div class="flex justify-between text-base font-medium text-gray-900">
                            <h3>
                                <a href="#">${item.product.nom}</a>
                            </h3>
                            <form id="wishlist-id-${item.id}" data-wishlist-id="${item.id}" action="/wishlist/${item.id}" method="POST" class="flex wishlist-remove-form">
                                @csrf
                                <button type="submit" class="font-medium text-second-color remove-wishlist">Remove</button>
                            </form>
                        </div>
                        
                    </div>
                    <form id="wishlistForm" action="/product_wishlist_to_cart/${item.product.id}/${item.id}" method="POST" class="cartForm flex flex-1 justify-between text-sm items-center">
                    <input type="hidden" name="_token"  value="${csrf}" >
                        <input type="hidden" name="wishlist_id" value="${item.id}">
                        <div class="my-10 flex items-center" x-data="{ productQuantity: 1, Quantity: ${item.product.quantite} }">
                            <input type="hidden" name="product_id" value="${item.product.id}">
                            <label for="Quantity" class="text-gray-500"> Qty </label>
                            <div class="flex items-center gap-1">
                                <button
                                    type="button"
                                    x-on:click="productQuantity--"
                                    :disabled="productQuantity === 0"
                                    class="w-6 h-6 text-gray-600 transition hover:opacity-75"
                                >
                                    &minus;
                                </button>
                                <input
                                    type="number"
                                    id="Quantity"
                                    name="quantity"
                                    x-model="productQuantity"
                                    class="h-8 w-8 p-0 rounded border border-gray-200 text-center [-moz-appearance:_textfield] sm:text-sm [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none"
                                    max="${item.quantity}"
                                />
                                <button
                                    type="button"
                                    x-on:click="productQuantity < Quantity ? productQuantity++ : null"
                                    class="w-6 h-6 text-gray-600 transition hover:opacity-75"
                                >
                                    &plus;
                                </button>
                            </div>
                        </div>
                        <div>
  
                            <button type="submit" class="font-medium text-second-color text-[14px] add-wishlist-to-cart">Ajouter à la carte</button>
                        </div>
                    </form>
                </div>
            `;
  
            wishList.appendChild(newItem);
        });
  }

  function handleWishlistButtonClick(event) {
    event.preventDefault();
    const add_products_to_wishlist = event.target.closest('.add-products-to-wishlist');

    if (add_products_to_wishlist) {
        const form = add_products_to_wishlist.closest('form');
        const formData = new FormData(form);
        const url = form.getAttribute('action');

        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector("[name=csrf-token]").content,
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Product added to wishlist successfully');
                updateWishlistUI(data.wishlists);
            } else {
                console.error('Failed to add product to wishlist');
            }
        })
        .catch(error => {
            console.error('An error occurred:', error);
        });
    }
  }

  function updateProducts(sortType, selectedPrices, selectedCategories, searchTerm) {
          const pricesQueryParam = selectedPrices.length > 0 ? `&prices=${selectedPrices.join(',')}` : '';
          const categoriesQueryParam = selectedCategories.length > 0 ? `&categories=${selectedCategories.join(',')}` : '';
          const searchQueryParam = searchTerm ? `&search=${searchTerm}` : '';
  
          fetch(`/products?sort=${sortType}${pricesQueryParam}${categoriesQueryParam}${searchQueryParam}`, {
              method: 'GET',
              headers: {
                  'Content-Type': 'application/json',
                  'X-Requested-With': 'XMLHttpRequest'
              }
          })
          .then(response => response.json())
          .then(data => {
              const productsContainer = document.getElementById('products-container');
              productsContainer.innerHTML = ''; // Clear existing products
  
              data.products.data.forEach(productData => {
                  // Create product container
                  const productHTML = `
                  <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                      <a href="#">
                          <img src="${productData.photo}" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                      </a>
                      <div class="px-4 py-3 w-72">
                      <span class="text-gray-400 mr-3 uppercase text-xs font-Roboto-condensed">Brand</span>
                      <h2 class="text-lg font-bold text-black  block capitalize font-Roboto-condensed">
                          <a href="">${productData.nom}</a>
                      </h2>
                      <div class="flex items-center">
                          <p class="text-lg font-semibold text-black cursor-auto my-3 font-Roboto">$${productData.prix}</p>
                          <form action="{{ route('wishlist.store', ['id' => $product->id]) }}" method="POST" class="wishlist-form-product w-full flex" data-product-id="{{ $product->id }}">
                              @csrf
                              <button type="submit" class="ml-auto add-products-to-wishlist">
                                  <div class="HeartAnimation"></div>
                              </button>
                          </form>
                      </div>
                      </div>
                  </div>
                  `;
  
                  // Append the product HTML to the products container
                  productsContainer.innerHTML += productHTML;
              });
          })
          .catch(error => console.error('Error:', error));
      }

  function handleSortOptionClick(event) {
    event.preventDefault();
    const sortType = event.target.dataset.sort;
    const selectedPrices = Array.from(document.querySelectorAll('[name="price"]:checked'))
        .map(filter => filter.value);
    const selectedCategories = Array.from(document.querySelectorAll('[name="categories[]"]:checked'))
        .map(filter => filter.value);
    const searchTerm = document.getElementById('search-input').value.trim();

    updateProducts(sortType, selectedPrices, selectedCategories, searchTerm);
  }

  function handlePriceFilterChange() {
    const selectedPrice = document.querySelector('input[name="price"]:checked').value;
    const selectedCategories = Array.from(document.querySelectorAll('[name="categories[]"]:checked'))
        .map(filter => filter.value);
    const sortOption = document.querySelector('.sort-option:checked');
    const sortType = sortOption ? sortOption.dataset.sort : '';
    const searchTerm = document.getElementById('search-input').value.trim();

    updateProducts(sortType, [selectedPrice], selectedCategories, searchTerm);
  }

  function handleCategoryFilterChange() {
    const selectedPrices = Array.from(document.querySelectorAll('[name="price"]:checked'))
        .map(filter => filter.value);
    const selectedCategories = Array.from(document.querySelectorAll('[name="categories[]"]:checked'))
        .map(filter => filter.value);
    const sortOption = document.querySelector('.sort-option:checked');
    const sortType = sortOption ? sortOption.dataset.sort : '';
    const searchTerm = document.getElementById('search-input').value.trim();

    updateProducts(sortType, selectedPrices, selectedCategories, searchTerm);
  }

  function handleSearchInputChange() {
    const selectedPrices = Array.from(document.querySelectorAll('[name="price"]:checked'))
        .map(filter => filter.value);
    const selectedCategories = Array.from(document.querySelectorAll('[name="categories[]"]:checked'))
        .map(filter => filter.value);
    const sortOption = document.querySelector('.sort-option:checked');
    const sortType = sortOption ? sortOption.dataset.sort : '';
    const searchTerm = this.value.trim();

    updateProducts(sortType, selectedPrices, selectedCategories, searchTerm);
  }

  document.addEventListener('click', function(event) {
        handleWishlistButtonClick(event);

        const sortOption = event.target.closest('.sort-option');
        if (sortOption) {
            handleSortOptionClick(event);
        }

        // Handle other events if needed
        const priceFilter = event.target.closest('[name="price"]');
        if (priceFilter) {
            handlePriceFilterChange();
        }

        const categoryFilter = event.target.closest('[name="categories[]"]');
        if (categoryFilter) {
            handleCategoryFilterChange();
        }
    });


  const priceFilters = document.querySelectorAll('[name="price"]');
  priceFilters.forEach(filter => {
    filter.addEventListener('change', handlePriceFilterChange);
  });

  const categoryFilters = document.querySelectorAll('[name="categories[]"]');
  categoryFilters.forEach(filter => {
    filter.addEventListener('change', handleCategoryFilterChange);
  });

  const searchInput = document.getElementById('search-input');
  searchInput.addEventListener('input', handleSearchInputChange);

  const sortOptions = document.querySelectorAll('.sort-option');
  sortOptions.forEach(option => {
    option.addEventListener('click', handleSortOptionClick);
  });
  });

</script> --}}


<script>
    let closePrice = document.querySelector('.close-price');
    let openPrice = document.querySelector('.open-price');
    let closePriceM = document.querySelector('.close-price-m');
    let openPriceM = document.querySelector('.open-price-m');


    closePrice.addEventListener('click',function() {
        document.getElementById('filter-section-0').classList.add('hidden')
        // document.getElementById('filter-section-mobile-0').classList.add('hidden')
        this.classList.add('hidden')
        openPrice.classList.remove('hidden')
    })
    openPrice.addEventListener('click',function() {
        document.getElementById('filter-section-0').classList.remove('hidden')
        // document.getElementById('filter-section-mobile-0').classList.remove('hidden')
        this.classList.add('hidden')
        closePrice.classList.remove('hidden')
    })

    closePriceM.addEventListener('click',function() {
        // document.getElementById('filter-section-0').classList.add('hidden')
        document.getElementById('filter-section-mobile-0').classList.add('hidden')
        this.classList.add('hidden')
        openPriceM.classList.remove('hidden')
    })
    openPriceM.addEventListener('click',function() {
        // document.getElementById('filter-section-0').classList.remove('hidden')
        document.getElementById('filter-section-mobile-0').classList.remove('hidden')
        this.classList.add('hidden')
        closePriceM.classList.remove('hidden')
    })




    let closeCat = document.querySelector('.close-cat');
    let openCat = document.querySelector('.open-cat');
    let closeCatM = document.querySelector('.close-cat-m');
    let openCatM = document.querySelector('.open-cat-m');

    closeCat.addEventListener('click',function() {
        document.getElementById('filter-section-1').classList.add('hidden')
        // document.getElementById('filter-section-mobile-1').classList.add('hidden')
        this.classList.add('hidden')
        openCat.classList.remove('hidden')
    })
    openCat.addEventListener('click',function() {
        document.getElementById('filter-section-1').classList.remove('hidden')
        // document.getElementById('filter-section-mobile-1').classList.remove('hidden')
        this.classList.add('hidden')
        closeCat.classList.remove('hidden')
    })
    closeCatM.addEventListener('click',function() {
        // document.getElementById('filter-section-1').classList.add('hidden')
        document.getElementById('filter-section-mobile-1').classList.add('hidden')
        this.classList.add('hidden')
        openCatM.classList.remove('hidden')
    })
    openCatM.addEventListener('click',function() {
        // document.getElementById('filter-section-1').classList.remove('hidden')
        document.getElementById('filter-section-mobile-1').classList.remove('hidden')
        this.classList.add('hidden')
        closeCatM.classList.remove('hidden')
    })

    let openBrand = document.querySelector('.open-brand');
    let closeBrand = document.querySelector('.close-brand');
    let openBrandM = document.querySelector('.open-brand-m');
    let closeBrandM = document.querySelector('.close-brand-m');

    closeBrand.addEventListener('click',function() {
        document.getElementById('filter-section-2').classList.add('hidden')
        // document.getElementById('filter-section-mobile-2').classList.add('hidden')

        
        this.classList.add('hidden')
        openBrand.classList.remove('hidden')
    })
    openBrand.addEventListener('click',function() {
        document.getElementById('filter-section-2').classList.remove('hidden')
        // document.getElementById('filter-section-mobile-2').classList.remove('hidden')

        this.classList.add('hidden')
        closeBrand.classList.remove('hidden')
    })
    closeBrandM.addEventListener('click',function() {
        // document.getElementById('filter-section-2').classList.add('hidden')
        document.getElementById('filter-section-mobile-2').classList.add('hidden')
        this.classList.add('hidden')
        openBrandM.classList.remove('hidden')
    })
    openBrandM.addEventListener('click',function() {
        // document.getElementById('filter-section-2').classList.remove('hidden')
        document.getElementById('filter-section-mobile-2').classList.remove('hidden')
        this.classList.add('hidden')
        closeBrandM.classList.remove('hidden')
    })


    let openSort = document.querySelector('.sort-btn');

    openSort.addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent the event from propagating to the document
        document.querySelector('.sort-values').classList.toggle('hidden');
    });

    document.addEventListener('click', function() {
        let sortValues = document.querySelector('.sort-values');
        if (!sortValues.classList.contains('hidden')) {
            sortValues.classList.add('hidden');
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        document.addEventListener("click", function(event) {
            if (event.target.classList.contains("HeartAnimation")) {
            event.target.classList.toggle("animate");
            }
        });
    });

    let close_filter = document.querySelector('.close-filter-m');
    let open_filter = document.querySelector('.open-filter-m');



    close_filter.addEventListener('click',function() {
      document.querySelector('.filter-container').classList.add('translate-x-full');
      setTimeout(() => {
        document.querySelector('.filter-overlay').classList.add('hidden');
        document.querySelector('.filter-overlay-container').classList.add('hidden');
      }, 50);
    })
    open_filter.addEventListener('click',function() {
      document.querySelector('.filter-container').classList.remove('translate-x-full');
      setTimeout(() => {
        document.querySelector('.filter-overlay').classList.remove('hidden');
        document.querySelector('.filter-overlay-container').classList.remove('hidden');
      }, 50);
    })

</script>
    

{{-- <script>
    document.querySelectorAll('.wishlist-form-product').forEach(function(form) {
    form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
    
    const formData = new FormData(event.target); // Get form data
    const url = event.target.getAttribute('action'); // Get the form action URL

    
    // Perform Ajax request
    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector("[name=csrf-token]").content, // Add CSRF token
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {

            console.log('Product added to wishlist successfully');
            // Update the wishlist content using the received data
            updateWishlistUI(data.wishlists);


        } else {
            console.error('Failed to add product to wishlist');
            // Display an error message or take appropriate action
        }
    })
    .catch(error => {
        console.error('An error occurred:', error);
        // Handle errors, display error message, etc.
        });
    })
    ;})

    function updateWishlistUI(wishlists) {
    const wishList = document.getElementById('wishlistList');
    wishList.innerHTML = ''; // Clear the existing content
    wishlists.forEach(item => {
        const newItem = document.createElement('li');
        newItem.className = 'flex py-6';
        const id = `${item.id}`;
        const csrf = document.head.querySelector("[name=csrf-token]").content;
        newItem.innerHTML = `
            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                <img src="${item.product.photo}" alt="Product Image" class="h-full w-full object-cover object-center">
            </div>
            <div class="ml-4 flex flex-1 flex-col">
                <div>
                    <div class="flex justify-between text-base font-medium text-gray-900">
                        <h3>
                            <a href="#">${item.product.nom}</a>
                        </h3>
                        <form id="wishlist-id-${item.id}" data-wishlist-id="${item.id}" action="/wishlist/${item.id}" method="POST" class="flex wishlist-remove-form">
                            @csrf
                            <button type="submit" class="font-medium text-second-color remove-wishlist">Remove</button>
                        </form>
                    </div>
                    
                </div>
                <form id="wishlistForm" action="/product_wishlist_to_cart/${item.product.id}/${item.id}" method="POST" class="cartForm flex flex-1 justify-between text-sm items-center">
                <input type="hidden" name="_token"  value="${csrf}" >
                    <input type="hidden" name="wishlist_id" value="${item.id}">
                    <div class="my-10 flex items-center" x-data="{ productQuantity: 1, Quantity: ${item.product.quantite} }">
                        <input type="hidden" name="product_id" value="${item.product.id}">
                        <label for="Quantity" class="text-gray-500"> Qty </label>
                        <div class="flex items-center gap-1">
                            <button
                                type="button"
                                x-on:click="productQuantity--"
                                :disabled="productQuantity === 0"
                                class="w-6 h-6 text-gray-600 transition hover:opacity-75"
                            >
                                &minus;
                            </button>
                            <input
                                type="number"
                                id="Quantity"
                                name="quantity"
                                x-model="productQuantity"
                                class="h-8 w-8 p-0 rounded border border-gray-200 text-center [-moz-appearance:_textfield] sm:text-sm [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none"
                                max="${item.quantity}"
                            />
                            <button
                                type="button"
                                x-on:click="productQuantity < Quantity ? productQuantity++ : null"
                                class="w-6 h-6 text-gray-600 transition hover:opacity-75"
                            >
                                &plus;
                            </button>
                        </div>
                    </div>
                    <div>

                        <button type="submit" class="font-medium text-second-color text-[14px] add-wishlist-to-cart">Ajouter à la carte</button>
                    </div>
                </form>
            </div>
        `;

        wishList.appendChild(newItem);
    });
    }
</script> --}}


{{-- <script>
  document.addEventListener('DOMContentLoaded', function() {
    const wishlistButtons = document.querySelectorAll('.add-products-to-wishlist');

    wishlistButtons.forEach(button => {
        const productId = button.getAttribute('data-product-id');
        const isInWishlist = button.getAttribute('data-in-wishlist') === 'true';

        if (isInWishlist) {
            button.classList.add('active');
        }

        button.addEventListener('click', async function(event) {
            event.preventDefault();
            const form = this.closest('form');
            const formData = new FormData(form);
            const url = form.getAttribute('action');

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.head.querySelector("[name=csrf-token]").content,
                    },
                });

                const data = await response.json();

                if (data.success) {
                    console.log('Product added to wishlist successfully');
                    this.classList.add('active');
                } else {
                    console.error('Failed to add product to wishlist');
                    // Display an error message or take appropriate action
                }
            } catch (error) {
                console.error('An error occurred:', error);
                // Handle errors, display error message, etc.
            }
        });
    });
});

</script> --}}

@if (Session::has('already_in'))
    <script>
        console.log('already-in-cart session variable is set');
    </script>
@endif








@include('pages.components.footer')
@include('pages.components.top')
@include('pages.components.popup')

@include('pages.components.cart')
@include('pages.components.wishlist')


@endsection
