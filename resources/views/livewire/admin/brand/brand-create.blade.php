<div>
    <x-dialog-modal wire:model="showCreateModel">
        <x-slot name="title">
            {{ __('Nouvelle Brand') }} 
        </x-slot>

        <form wire:submit.prevent="create" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">


                    <div class="col-span-2 md:col-span-4 lg:col-span-2  order-last lg:order-none">
                        <div class="flex flex-row items-center justify-center">
                        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                            <!-- Profile Photo File Input -->
                            <input type="file" class="hidden"
                                        wire:model="image"
                                        x-ref="image"
                                        x-on:change="
                                                photoName = $refs.image.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.image.files[0]);
                                        " />
                            <div class="w-24 h-24 bg-gray-200 rounded-full" x-show="! photoPreview">
                                @if(!empty($image))
                                <img src="{{ $image }}" alt="{{ $image }}" class="h-full w-full object-cover">
                            @endif
                            </div>
                            <div class="w-24 h-24 bg-gray-200 rounded-full" x-show="photoPreview" style="display: none;">
                                <span class="block w-full h-full bg-cover bg-no-repeat bg-center rounded-full"
                                      x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>
                            <button class="-mt-10 mr-2 p-3 rounded-full bg-indigo-500" type="button" x-on:click.prevent="$refs.image.click()">
                                <svg wire:target="image" wire:loading.class="animate-bounce" class="w-4 h-4 text-white " xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                </svg>
                            </button>
            
                            <x-input-error for="image" class="mt-2" />
                        </div>
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-label for="name" value="{{ __('Name') }}"/>
                        <x-input wire:model.defer="name" type="text" class="mt-1 block w-full"/>
                        <x-input-error for="name" class="mt-2"/>
                    </div>

                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="closeCreateModel" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-button type="submit" wire:click="create" wire:loading.attr="disabled" class="ml-3 bg-gray-600 hover:bg-gray-800">
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        </form>

    </x-dialog-modal>
</div>