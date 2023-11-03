<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="description" content= "@yield('meta_description')">
        <title>@yield('title')</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="overflow-x-hidden">

<section class="py-2 bg-[fafbf6]">
        <div class="max-w-5xl mx-auto py-16 bg-white">
        <article class="overflow-hidden">
            <div class="bg-[white] rounded-b-md">
                <div class="p-9">
                    <div class="space-y-6 text-slate-700">
            
                    <p class="text-xl font-extrabold tracking-tight uppercase font-body">
                        GardeniaSecret Invoice
                    </p>
                    </div>
                </div>
                <div class="p-9">
                    <div class="flex w-full">
                        <div class="grid grid-cols-4 gap-12">
                            <div class="text-sm font-light text-slate-500">
                                <p class="text-sm font-normal text-slate-700">
                                    Gs Detail:
                                </p>
                                <p>Gardenia Secret</p>
                                <p>1, Angle rue Socrate et Abou Taour 1er étage. Maarif Ext</p>
                                <p>Casablanca, Morocco</p>
                            </div>
                            <div class="text-sm font-light text-slate-500">
                                <p class="mt-2 text-sm font-normal text-slate-700">
                                    Shipping Information :
                                </p>
                                <p>Country : {{ $invoice->country }}</p>
                                <p>City : {{ $invoice->city }}</p>
                                <p>Address : {{ $invoice->address }}</p>
                                <p>State : {{ $invoice->state_province }}</p>
                                <p>Postal Code : {{ $invoice->postal_code }}</p>
                            </div>
                            <div class="text-sm font-light text-slate-500">
                                <p class="text-sm font-normal text-slate-700">Invoice Detail :</p>
                                <p>{{ $invoice->first_name }} {{ $invoice->family_name }}</p>
                                <p>{{ $invoice->email }}</p>
                                <p>{{ $invoice->phone_number }}</p>
                            </div>

                            <div class="text-sm font-light text-slate-500">
                                <p class="mt-2 text-sm font-normal text-slate-700">
                                    Date of the order
                                </p>
                                <p>{{ date('j-m-Y',strtotime($invoice->created_at)) }} </p>
                            </div>

                        </div>
                    </div>
                </div>
            
                <div class="p-9">
                    <div class="flex flex-col mx-0 md:mt-8">
                    <table class="min-w-full divide-y divide-slate-500">
                        <thead>
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-normal text-slate-700 sm:pl-6 md:pl-0">
                                Description
                                </th>
                                <th scope="col" class="hidden py-3.5 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell">
                                Quantity
                                </th>
                                <th scope="col" class="hidden py-3.5 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell">
                                Price
                                </th>
                                <th scope="col" class="py-3.5 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0">
                                Total
                                </th>
                            </tr>
                        </thead>
                    <tbody>


                        @foreach(json_decode($invoice->cartInfo, true) as $item)
                        @php
                            $product = \App\Models\Product::find($item['product_id']);
                            $box = \App\Models\Box::find($item['box_id']);
                        @endphp
                        {{-- @if($box)
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
                        @endif --}}


                        <tr class="border-b border-slate-200">
                            <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
                                @if($box)
                                <div class="font-medium text-slate-700">{{ $box->box_name }}</div>
                                @else
                                <div class="font-medium text-slate-700">{{ $product->nom }}</div>
                                @endif
                                <div class="mt-0.5 text-slate-500 sm:hidden">
                                1 unit at $0.00
                                </div>
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-right text-slate-500 sm:table-cell">
                                {{ $item['quantity'] }}
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-right text-slate-500 sm:table-cell">
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
                            </td>
                            @if($box)
                            <td class="py-4 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                                @if($item['box_option'] == 'cheap')
                                    ${{ $box->cheap_price }}
                                @elseif ($item['box_option'] == 'mid')
                                    ${{ $box->med_price }}
                                @elseif ($item['box_option'] == 'expensive')
                                    ${{ $box->exp_price }}
                                @endif
                            </td>
                            @else
                            <td class="py-4 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                                ${{ $product->prix * $item['quantity'] }}
                            </td>
                            @endif
                        </tr>
                    @endforeach
            
                    <!-- Here you can write more products/tasks that you want to charge for-->
                    </tbody>
                    <tfoot>
                    <tr>
                        <th scope="row" colspan="3" class="hidden pt-6 pl-6 pr-3 text-sm font-light text-right text-slate-500 sm:table-cell md:pl-0">
                            Subtotal
                        </th>
                        <th scope="row" class="pt-6 pl-4 pr-3 text-sm font-light text-left text-slate-500 sm:hidden">
                            Subtotal
                        </th>
                        <td class="pt-6 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                            ${{ $invoice->total_price }}
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="3" class="hidden pt-6 pl-6 pr-3 text-sm font-light text-right text-slate-500 sm:table-cell md:pl-0">
                            Shipping Fee
                        </th>
                        <th scope="row" class="pt-6 pl-4 pr-3 text-sm font-light text-left text-slate-500 sm:hidden">
                            Shipping Fee
                        </th>
                        <td class="pt-6 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                            $2.00
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="3" class="hidden pt-4 pl-6 pr-3 text-sm font-normal text-right text-slate-700 sm:table-cell md:pl-0">
                        Total
                        </th>
                        <th scope="row" class="pt-4 pl-4 pr-3 text-sm font-normal text-left text-slate-700 sm:hidden">
                        Total
                        </th>
                        <td class="pt-4 pl-3 pr-4 text-sm font-normal text-right text-slate-700 sm:pr-6 md:pr-0">
                            ${{ number_format($invoice->total_price + 2, 2) }}
                        </td>
                    </tr>
                    </tfoot>
                    </table>
                    </div>
                </div>
            
                <div class="mt-10 p-9">
                    <div class="border-t pt-9 border-slate-200">
                    <div class="text-sm font-light text-slate-700">
                    <p>
                        We want to extend our heartfelt gratitude for choosing to shop with us. Your support allows us to continue providing high-quality products, and we are truly thankful for the trust you've placed in us. We hope that your recent purchase exceeds your expectations, and brings you both satisfaction and joy. Should you need any further assistance or have any questions, please don't hesitate to reach out. We look forward to the opportunity to serve you again in the future.
                    </p>
                    </div>
                    </div>
                </div>
            </div>
        </article>
        </div>
</section>
    </body>
</html>