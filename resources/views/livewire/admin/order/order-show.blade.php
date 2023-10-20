<div>
    @if($showItemModel)
        <x-dialog-modal wire:model="showItemModel" maxWidth='7xl'>
        <x-slot name="title">
            {{ __('Informations d\'utilisateur') }} 
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">



                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-gray-100 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Nom Complet') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $order->first_name . " " . $order->family_name }}</div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-gray-100 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Email') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $order->email }}</div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-gray-100 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Phone number') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $order->phone_number }}</div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-gray-100 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Country') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $order->country }}</div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-gray-100 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('City') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $order->city }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-gray-100 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('State / Province') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $order->state_province }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-gray-100 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Postal code') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $order->postal_code }}</div>
                    </div>
                </div>
                @if($order->cartInfo)
                <div class="col-span-1 md:col-span-4 ">
                    <div class="relative p-3 bg-gray-100 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Products') }}</div>
                        <div class=" text-sm font-bold z-10">

                            @foreach(json_decode($order->cartInfo) as $item)
                            @php
                                $product_name = App\Models\Product::find($item->product_id);
                            @endphp
                                <p class="my-2 flex justify-between">
                                <span>
                                    <span class="bg-gray-200 text-gray-600 p-1 rounded">Product Name:</span>
                                    {{ $product_name->nom }}
                                </span>
                                <span>
                                    <span class="bg-gray-200 ml-10 text-gray-800 p-1 rounded">Price:</span>
                                    ${{ $product_name->prix }}
                                    <span class="bg-gray-200 ml-10 text-gray-800 p-1 rounded">Quantity:</span>
                                    {{ $item->quantity }}
                                </span>
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-gray-100 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Status') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $order->status }}</div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 ">
                    <div class="relative p-3 bg-gray-100  text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('created_at') }}</div>
                        <div class=" text-sm font-bold z-10">{{ date('D jS M Y',strtotime($order->created_at)) }} </div>
                    </div>
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeItemModel" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

        </x-slot>

    </x-dialog-modal>
    @endif

</div>
