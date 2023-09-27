<div >
    @if($showItemModel)
        <x-dialog-modal wire:model="showItemModel" maxWidth='7xl'>
        <x-slot name="title">
            {{ __('Informations d\'article') }} 
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-10 gap-8 justify-between">

                
                <div class="col-span-1 md:col-span-2 lg:col-span-4">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Image du produit') }}</div>
                        <img 
                        class="h-80 inline-block w-full  object-cover justify-center"
                        src="{{ asset($item->photo) }}" 
                        alt="">
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                            <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Gallery du produit') }}</div>
                            <img 
                            class="h-56 inline-block w-full  object-top justify-center"
                            src="{{ asset(explode(',', $item->gallery)[0]) }}"
                            alt="">
                        </div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                            <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Gallery du produit') }}</div>
                            <img 
                            class="h-56 inline-block w-full  object-top justify-center"
                            src="{{ asset(explode(',', $item->gallery)[1]) }}"
                            alt="">
                        </div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                            <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Gallery du produit') }}</div>
                            <img 
                            class="h-56 inline-block w-full  object-top justify-center"
                            src="{{ asset(explode(',', $item->gallery)[2]) }}"
                            alt="">
                        </div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-5">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Nom du produit') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->nom }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-5">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Prix du produit') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->prix }}<sup>DHS</sup></div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-5">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Quantité du produit') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->quantite }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-5">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('created_at') }}</div>
                        <div class=" text-sm font-bold z-10 text-indigo-600">{{ date('D jS M Y',strtotime($item->created_at)) }} </div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 lg:col-span-10">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Description du produit') }}</div>
                        <div class=" text-sm font-bold z-10 ">{!! $item->description !!}</div>
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
