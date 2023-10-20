@extends('layouts.frontend')

@section('content')

@include('pages.components.header')

{{-- <section class="bg-gray-50">
     <aside id="separator-sidebar" class="z-40 w-64 overflow-y-auto transition-transform -translate-x-full sm:translate-x-0 border-r border-gray-200" style="height: 550px" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
           <ul class="space-y-2 font-medium">
              <li>
                 <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                       <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                       <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                 </a>
              </li>

              <li>
                    <a href="{{ Route('profile.show') }}" class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700  group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                    </svg>
                    <span class="ml-4">Profile</span>
                    </a>
             </li>
           </ul>
           <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
              <li>
                 <a href="#" class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700  group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                    </svg>
                    <span class="ml-4">Orders</span>
                 </a>
              </li>


           </ul>
        </div>
    </aside> 
    @include('client.components.sidebar')
    


</section> --}}

<div class="flex bg-white overflow-y-auto" style="height: 600px">
    @include('client.components.sidebar')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full p-5">
        <div class="py-5 text-lg font-semibold text-left text-gray-900 bg-white  dark:bg-gray-800">
            Your Orders
            <p class="mt-1 text-sm font-normal text-gray-500 ">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
        </div>
        <div class="flex items-center justify-between pb-4">
            <div>
                <button id="dropdownRadioButton-2" data-dropdown-toggle="dropdownRadio-2" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800   dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                    <svg class="w-3 h-3 text-gray-500  mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                        </svg>
                    Last 30 days
                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownRadio-2" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton-2">
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input id="filter-radio-example-1" type="radio" value="last_day" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500    focus:ring-2 ">
                                <label for="filter-radio-example-1" class="w-full ml-2 text-sm font-medium text-gray-900 rounded ">Last day</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input checked="" id="filter-radio-example-2" type="radio" value="last_7_days" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500    focus:ring-2 ">
                                <label for="filter-radio-example-2" class="w-full ml-2 text-sm font-medium text-gray-900 rounded ">Last 7 days</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input id="filter-radio-example-3" type="radio" value="last_30_days" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500    focus:ring-2 ">
                                <label for="filter-radio-example-3" class="w-full ml-2 text-sm font-medium text-gray-900 rounded ">Last 30 days</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input id="filter-radio-example-4" type="radio" value="last_month" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500    focus:ring-2 ">
                                <label for="filter-radio-example-4" class="w-full ml-2 text-sm font-medium text-gray-900 rounded ">Last month</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input id="filter-radio-example-5" type="radio" value="last_year" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500    focus:ring-2 ">
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
                <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500    " placeholder="Search for items">
            </div>
        </div>
        <div id="table-container">
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
                @forelse ($orders as $order)
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
    
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("table-search");
    const tableContainer = document.getElementById("table-container");
    const radioButtons = document.querySelectorAll('input[name="filter-radio"]');

    searchInput.addEventListener("input", function() {
        const searchTerm = this.value.toLowerCase();

        fetch(`/search-orders?searchTerm=${searchTerm}`)
            .then(response => response.text())
            .then(data => {
                tableContainer.innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    });

    radioButtons.forEach((radio) => {
        radio.addEventListener('change', function() {
            const selectedValue = this.value;

            fetch(`/search-orders?timePeriod=${selectedValue}`)
                .then(response => response.text())
                .then(data => {
                    tableContainer.innerHTML = data;
                    // console.log(data);
                })
                .catch(error => console.error('Error:', error));
        });
    });
});

</script>
    
{{-- @include('pages.components.popup') --}}
@include('pages.components.top')

@include('pages.components.footer')
{{-- @include('pages.components.cart')
@include('pages.components.wishlist') --}}

@endsection