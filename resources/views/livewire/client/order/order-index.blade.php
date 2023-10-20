@extends('layouts.client')

@section('content')

@include('pages.components.header')



<div class="flex bg-white overflow-y-auto" style="height: 600px">
    @include('client.components.sidebar')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full p-5">
        <div class="py-5 text-lg font-semibold text-left text-gray-900 bg-white  dark:bg-gray-800">
            Your Orders
            <p class="mt-1 text-sm font-normal text-gray-500 ">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
        </div>
        <div class="flex items-center justify-between pb-4">
            <div>
                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800   dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                    <svg class="w-3 h-3 text-gray-500  mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                        </svg>
                    Last 30 days
                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input id="filter-radio-example-1" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500    focus:ring-2 ">
                                <label for="filter-radio-example-1" class="w-full ml-2 text-sm font-medium text-gray-900 rounded ">Last day</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input checked="" id="filter-radio-example-2" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500    focus:ring-2 ">
                                <label for="filter-radio-example-2" class="w-full ml-2 text-sm font-medium text-gray-900 rounded ">Last 7 days</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input id="filter-radio-example-3" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500    focus:ring-2 ">
                                <label for="filter-radio-example-3" class="w-full ml-2 text-sm font-medium text-gray-900 rounded ">Last 30 days</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input id="filter-radio-example-4" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500    focus:ring-2 ">
                                <label for="filter-radio-example-4" class="w-full ml-2 text-sm font-medium text-gray-900 rounded ">Last month</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input id="filter-radio-example-5" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500    focus:ring-2 ">
                                <label for="filter-radio-example-5" class="w-full ml-2 text-sm font-medium text-gray-900 rounded ">Last year</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" wire:keydown.enter="search" placeholder="Search for items">
            </div>
            
        </div>
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Order Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orderTable as $order)
                <tr class="bg-white border-b hover:bg-gray-50 ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        @foreach(json_decode($order->cartInfo, true) as $item)
                            @php
                                $product = \App\Models\Product::find($item['product_id']);
                                $box = \App\Models\Box::find($item['box_id']);
                            @endphp
                    
                            @if($box)
                                <div>
                                    {{ $box->cheap_libelle }}
                                </div>
                            @endif
                            @if($product)
                                <div>{{ $product->nom }}</div>
                            @endif
                        @endforeach
                    </th>
                    
                    <td class="px-6 py-4">
                        @foreach(json_decode($order->cartInfo, true) as $item)
                            @php
                                $product = \App\Models\Product::find($item['product_id']);
                                $box = \App\Models\Box::find($item['box_id']);
                            @endphp
                            @if($box)
                                <div>
                                @if($item['box_option'] == 'cheap')
                                    ${{ $box->cheap_price }}
                                @elseif ($item['box_option'] == 'mid')
                                    ${{ $box->med_price }}
                                @elseif ($item['box_option'] == 'expensive')
                                    ${{ $box->exp_price }}
                                @endif
                                </div>
                            @endif
                            @if($product)
                                <div>${{ $product->prix }}</div>
                            @endif
                        @endforeach

                    </td>
                    <!-- Add the rest of the columns as needed -->
                    <td class="px-6 py-4">
                        @foreach(json_decode($order->cartInfo, true) as $item)
                            {{ $item['quantity'] }}<br />
                        @endforeach
                    </td>
                    <!-- Add other columns as needed -->
                    <td class="px-6 py-4">
                        @foreach(json_decode($order->cartInfo, true) as $item)
                            @php
                                $product = \App\Models\Product::find($item['product_id']);
                                $category = $product ? \App\Models\Categorie::find($product->category_id) : null;
                            @endphp
                            @if($product && $category)
                                <div>{{ $category->name }}</div>
                            @else
                                <div>Boxe du Mois</div>
                            @endif
                        @endforeach
                    </td>
                    
                    <!-- Add other columns as needed -->
                    <td class="px-6 py-4">
                        ${{ $order->total_price }}
                    </td>
                    <td class="w-32 p-4">
                        <div class="flex gap-2">
                            <span
                            class="inline-flex items-center gap-1 rounded-full bg-gray-50 px-2 py-1 w-32 text-xs font-semibold text-gray-600"
                            >
                            {{ date('D jS M Y',strtotime($order->created_at)) }} 
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                    </td>
                    <!-- Add other columns as needed -->
                </tr>
            @empty
            
            @endforelse
            
            </tbody>
        </table>
    </div>
    
</div>

{{-- @include('pages.components.popup') --}}
@include('pages.components.top')

@include('pages.components.footer')
{{-- @include('pages.components.cart')
@include('pages.components.wishlist') --}}

@endsection