@extends('layouts.frontend')
@section('title','Gardenia Secret Homepage')
@section('meta_description','Gardenia Secret Homepage')
@section('content')
@include('pages.components.header')
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
                        <div class="md:grid grid-cols-4 gap-12">
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
                    <tr>
                        {{-- <th scope="row" colspan="3" class="hidden pt-4 pl-6 pr-3 text-sm font-normal text-right text-slate-700 sm:table-cell md:pl-0">
                        </th> --}}
                        <th scope="row" colspan="6" class="hidden pt-4 pl-6 pr-3 text-sm font-normal text-right text-slate-700 sm:table-cell md:pl-0">
                            <a href="{{ Route('order.invoice.print',['id' =>  $invoice->id]) }}" class="py-1 px-3 rounded bg-red-600 text-white">Download PDF</a>
                        </th>
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
{{-- @include('pages.components.popup') --}}
@include('pages.components.top')

@include('pages.components.footer')
{{-- @include('pages.components.cart')
@include('pages.components.wishlist') --}}

@endsection